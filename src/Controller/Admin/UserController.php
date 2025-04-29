<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Service\PdfService;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/admin')]
#[IsGranted('ROLE_ADMIN')]
// Contrôleur d'administration pour la gestion des utilisateurs
class UserController extends AbstractController
{
    // Affiche la liste des utilisateurs et le formulaire de création
    #[Route('/users', name: 'admin_users')]
    public function index(Request $request, UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        $user = new User();
        $form = $this->createForm(UserType::class, $user, [
            'action' => $this->generateUrl('admin_user_new'),
            'method' => 'POST',
        ]);

        // Si le formulaire est soumis dans cette route (ce qui ne devrait pas arriver)
        $form->handleRequest($request);

        return $this->render('admin/users.html.twig', [
            'users' => $users,
            'userForm' => $form->createView(), // Changement du nom de la variable
        ]);
    }

    // Traite la création d'un nouvel utilisateur via le formulaire
    #[Route('/user/new', name: 'admin_user_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher, LoggerInterface $logger): Response
    {
        // Vérifier le token CSRF
        if (!$this->isCsrfTokenValid('new', $request->request->get('_token'))) {
            $this->addFlash('error', 'Token CSRF invalide.');
            $logger->error('Token CSRF invalide lors de la création d\'un utilisateur');
            return $this->redirectToRoute('admin_users');
        }

        $logger->info('Données du formulaire reçues', ['data' => $request->request->all()]);

        // Validation manuelle des champs du formulaire
        $errors = [];
        
        // Vérification des champs requis
        $requiredFields = ['nom', 'prenom', 'email', 'password', 'type_utilisateur'];
        foreach ($requiredFields as $field) {
            if (empty($request->request->get($field))) {
                $errors[] = 'Le champ ' . $field . ' est requis.';
            }
        }

        // Validation du format de l'email
        $email = $request->request->get('email');
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'L\'adresse email n\'est pas valide.';
        }

        // Vérification de l'unicité de l'email
        if (!empty($email)) {
            $existingUser = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
            if ($existingUser) {
                $errors[] = 'Cet email est déjà utilisé.';
            }
        }

        // Si aucune erreur, création de l'utilisateur
        if (empty($errors)) {
            try {
                $user = new User();
                $user->setNom($request->request->get('nom'));
                $user->setPrenom($request->request->get('prenom'));
                $user->setEmail($request->request->get('email'));
                $user->setTypeUtilisateur($request->request->get('type_utilisateur'));
                if ($request->request->has('telephone')) {
                    $user->setTelephone($request->request->get('telephone'));
                }

                // Encodage du mot de passe avant sauvegarde
                $user->setMotDePasse(
                    $userPasswordHasher->hashPassword(
                        $user,
                        $request->request->get('password')
                    )
                );

                // Définition de la date d'inscription
                $user->setDateInscription(new \DateTimeImmutable());

                $entityManager->persist($user);
                $entityManager->flush();

                $this->addFlash('success', 'Utilisateur créé avec succès.');
                return $this->redirectToRoute('admin_users');
            } catch (\Exception $e) {
                $logger->error('Erreur lors de la création d\'un utilisateur', [
                    'error' => $e->getMessage(),
                    'data' => $request->request->all()
                ]);
                $this->addFlash('error', 'Erreur lors de la création de l\'utilisateur : ' . $e->getMessage());
            }
        } else {
            foreach ($errors as $error) {
                $this->addFlash('error', $error);
            }
        }

        return $this->redirectToRoute('admin_users');
    }

    #[Route('/user/{id}/edit', name: 'admin_user_edit', methods: ['POST'])]
    public function edit(
        Request $request,
        User $user,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $userPasswordHasher,
        LoggerInterface $logger
    ): Response {
        // Si c'est une requête AJAX, rediriger vers l'API
        if ($request->isXmlHttpRequest()) {
            return $this->forward('App\Controller\Admin\UserController::apiEditUser', [
                'id' => $user->getId(),
                'request' => $request
            ]);
        }
        
        // Sinon, traiter comme une soumission de formulaire normale
        try {
            // Journaliser toutes les données de la requête pour le débogage
            $logger->info('Données reçues dans la requête edit', [
                'request' => $request->request->all(),
                'userId' => $user->getId()
            ]);
            
            // Vérifier le token CSRF
            if (!$this->isCsrfTokenValid('edit'.$user->getId(), $request->request->get('_token'))) {
                $this->addFlash('error', 'Token CSRF invalide.');
                return $this->redirectToRoute('admin_users');
            }

            // Récupérer les données
            $nom = $request->request->get('nom');
            $prenom = $request->request->get('prenom');
            $email = $request->request->get('email');
            $typeUtilisateur = $request->request->get('type_utilisateur');
            $telephone = $request->request->get('telephone');
            $password = $request->request->get('password');

            // Vérifier les champs obligatoires
            if (!$nom || !$prenom || !$email || !$typeUtilisateur) {
                throw new \Exception('Tous les champs obligatoires doivent être remplis.');
            }

            // Vérifier l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new \Exception('Format d\'email invalide.');
            }

            // Mettre à jour l'utilisateur
            $user->setNom($nom)
                 ->setPrenom($prenom)
                 ->setEmail($email)
                 ->setTypeUtilisateur($typeUtilisateur)
                 ->setTelephone($telephone);

            // Mettre à jour le mot de passe si fourni
            if ($password) {
                $user->setMotDePasse($userPasswordHasher->hashPassword($user, $password));
            }

            // Sauvegarder les modifications
            $entityManager->flush();

            // Ajouter un message flash de succès
            $this->addFlash('success', 'Utilisateur modifié avec succès.');
            
            // Rediriger vers la liste des utilisateurs
            return $this->redirectToRoute('admin_users');

        } catch (\Exception $e) {
            $logger->error('Erreur lors de la modification', [
                'error' => $e->getMessage(),
                'userId' => $user->getId(),
                'request' => $request->request->all()
            ]);

            // Ajouter un message flash d'erreur
            $this->addFlash('error', 'Erreur lors de la modification de l\'utilisateur : ' . $e->getMessage());
            
            // Rediriger vers la liste des utilisateurs
            return $this->redirectToRoute('admin_users');
        }
    }

    // API pour la modification d'un utilisateur via requête AJAX
    #[Route('/api/user/{id}/edit', name: 'api_user_edit', methods: ['POST'])]
    public function apiEditUser(
        Request $request,
        User $user,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $userPasswordHasher,
        LoggerInterface $logger
    ): JsonResponse {
        try {
            // Vérifier le token CSRF
            if (!$this->isCsrfTokenValid('edit'.$user->getId(), $request->request->get('_token'))) {
                throw new \Exception('Token CSRF invalide.');
            }

            // Récupérer les données
            $nom = $request->request->get('nom');
            $prenom = $request->request->get('prenom');
            $email = $request->request->get('email');
            $typeUtilisateur = $request->request->get('type_utilisateur');
            $telephone = $request->request->get('telephone');
            $password = $request->request->get('password');

            // Vérifier les champs obligatoires
            if (!$nom || !$prenom || !$email) {
                throw new \Exception('Tous les champs obligatoires doivent être remplis.');
            }

            // Vérifier l'email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new \Exception('Format d\'email invalide.');
            }

            // Mettre à jour l'utilisateur
            $user->setNom($nom)
                 ->setPrenom($prenom)
                 ->setEmail($email)
                 ->setTypeUtilisateur($typeUtilisateur)
                 ->setTelephone($telephone);

            // Mettre à jour le mot de passe si fourni
            if ($password) {
                $user->setMotDePasse($userPasswordHasher->hashPassword($user, $password));
            }

            // Sauvegarder les modifications
            $entityManager->flush();

            // Préparer les données de réponse
            $responseData = [
                'success' => true,
                'message' => 'Utilisateur modifié avec succès.',
                'user' => [
                    'id' => $user->getId(),
                    'nom' => $user->getNom(),
                    'prenom' => $user->getPrenom(),
                    'email' => $user->getEmail(),
                    'telephone' => $user->getTelephone(),
                    'typeUtilisateur' => $user->getTypeUtilisateur()
                ]
            ];
            
            return new JsonResponse($responseData);

        } catch (\Exception $e) {
            $logger->error('API - Erreur lors de la modification', [
                'error' => $e->getMessage(),
                'userId' => $user->getId(),
                'request' => $request->request->all()
            ]);

            return new JsonResponse([
                'success' => false,
                'message' => $e->getMessage()
            ], JsonResponse::HTTP_BAD_REQUEST);
        }
    }

    // Génère un PDF pour tous les utilisateurs
    #[Route('/users/pdf', name: 'admin_users_pdf', methods: ['GET'])]
    public function generateUsersPdf(UserRepository $userRepository, PdfService $pdfService): Response
    {
        // Récupérer tous les utilisateurs
        $users = $userRepository->findAll();
        
        // Générer le HTML avec le template Twig
        $html = $this->renderView('admin/pdf/users_list.html.twig', [
            'users' => $users
        ]);
        
        // Générer et retourner le PDF
        return $pdfService->generatePdfResponse($html, 'liste_utilisateurs.pdf');
    }
    
    // Génère un PDF pour un utilisateur spécifique
    #[Route('/user/{id}/pdf', name: 'admin_user_pdf', methods: ['GET'])]
    public function generateUserPdf(User $user, PdfService $pdfService): Response
    {
        // Générer le HTML avec le template Twig
        $html = $this->renderView('admin/pdf/user_details.html.twig', [
            'user' => $user
        ]);
        
        // Générer et retourner le PDF avec un nom de fichier personnalisé
        $filename = 'utilisateur_' . $user->getNom() . '_' . $user->getPrenom() . '.pdf';
        
        return $pdfService->generatePdfResponse($html, $filename);
    }

    // Suppression d'un utilisateur
    #[Route('/user/{id}/delete', name: 'admin_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            try {
                $entityManager->remove($user);
                $entityManager->flush();
                $this->addFlash('success', 'Utilisateur supprimé avec succès.');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Impossible de supprimer cet utilisateur.');
            }
        }

        return $this->redirectToRoute('admin_users');
    }
}

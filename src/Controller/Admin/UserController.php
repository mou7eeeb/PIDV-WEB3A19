<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/admin')]
#[IsGranted('ROLE_ADMIN')]
class UserController extends AbstractController
{
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

        // Validation manuelle
        $errors = [];
        
        // Champs requis
        $requiredFields = ['nom', 'prenom', 'email', 'password', 'type_utilisateur'];
        foreach ($requiredFields as $field) {
            if (empty($request->request->get($field))) {
                $errors[] = 'Le champ ' . $field . ' est requis.';
            }
        }

        // Validation de l'email
        $email = $request->request->get('email');
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'L\'adresse email n\'est pas valide.';
        }

        // Vérifier si l'email existe déjà
        if (!empty($email)) {
            $existingUser = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
            if ($existingUser) {
                $errors[] = 'Cet email est déjà utilisé.';
            }
        }

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

                // Encode le mot de passe
                $user->setMotDePasse(
                    $userPasswordHasher->hashPassword(
                        $user,
                        $request->request->get('password')
                    )
                );

                // Définir la date d'inscription
                $user->setDateInscription(new \DateTimeImmutable());

                // Définir les rôles
                $roles = ['ROLE_USER'];
                if ($user->getTypeUtilisateur() === 'admin') {
                    $roles[] = 'ROLE_ADMIN';
                }
                $user->setRoles($roles);

                // Activer le compte par défaut
                $user->setIsActive(true);

                // Persister l'utilisateur
                $entityManager->persist($user);
                $entityManager->flush();

                $logger->info('Utilisateur créé avec succès', ['id' => $user->getId()]);
                $this->addFlash('success', 'Utilisateur créé avec succès.');

            } catch (\Exception $e) {
                $logger->error('Erreur lors de la création de l\'utilisateur', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
                $this->addFlash('error', 'Une erreur est survenue lors de la création de l\'utilisateur.');
            }
        } else {
            // Afficher les erreurs
            foreach ($errors as $error) {
                $this->addFlash('error', $error);
                $logger->error('Erreur de validation', ['error' => $error]);
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
        ValidatorInterface $validator,
        LoggerInterface $logger
    ): JsonResponse {
        try {
            // Vérifier si c'est une requête AJAX
            if (!$request->isXmlHttpRequest()) {
                throw new \Exception('Seules les requêtes AJAX sont autorisées.');
            }

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
            if (!$nom || !$prenom || !$email || !$typeUtilisateur) {
                throw new \Exception('Tous les champs obligatoires doivent être remplis.');
            }

            // Vérifier le type d'utilisateur
            if (!in_array($typeUtilisateur, ['admin', 'freelance', 'client'])) {
                throw new \Exception('Type d\'utilisateur invalide.');
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

            // Valider l'entité
            $errors = $validator->validate($user);
            if (count($errors) > 0) {
                $messages = [];
                foreach ($errors as $error) {
                    $messages[] = $error->getMessage();
                }
                throw new \Exception(implode(', ', $messages));
            }

            // Sauvegarder les modifications
            $entityManager->flush();

            // Retourner la réponse
            return $this->json([
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
            ]);

        } catch (\Exception $e) {
            $logger->error('Erreur lors de la modification', [
                'error' => $e->getMessage(),
                'userId' => $user->getId(),
                'request' => $request->request->all()
            ]);

            return $this->json([
                'success' => false,
                'message' => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

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

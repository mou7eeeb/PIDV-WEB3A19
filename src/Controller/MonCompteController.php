<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/**
 * Contrôleur dédié à la gestion du compte utilisateur
 */
#[Route('/compte')]
#[IsGranted('ROLE_USER')]
class MonCompteController extends AbstractController
{
    /**
     * Affiche le profil de l'utilisateur connecté
     */
    #[Route('', name: 'mon_compte', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        // Récupération de l'utilisateur connecté
        $user = $this->getUser();
        if (!$user instanceof User) {
            throw new AccessDeniedException('Vous devez être connecté pour accéder à cette page.');
        }
        
        // Récupération de l'utilisateur depuis la base de données pour avoir toutes les données à jour
        $user = $userRepository->find($user->getId());
        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }
        
        return $this->render('user/profile.html.twig', [
            'user' => $user
        ]);
    }
    
    /**
     * Traite la mise à jour des informations du profil utilisateur
     */
    #[Route('/update', name: 'mon_compte_update', methods: ['POST'])]
    public function updateProfile(
        Request $request, 
        EntityManagerInterface $entityManager,
        UserRepository $userRepository
    ): Response {
        // Récupération de l'utilisateur connecté
        $user = $this->getUser();
        if (!$user instanceof User) {
            throw new AccessDeniedException('Vous devez être connecté pour effectuer cette action.');
        }
        
        // Récupération de l'utilisateur depuis la base de données
        $user = $userRepository->find($user->getId());
        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }
        
        // Récupération des données du formulaire
        $nom = $request->request->get('nom');
        $prenom = $request->request->get('prenom');
        $email = $request->request->get('email');
        $telephone = $request->request->get('telephone');
        
        // Validation des données
        $errors = [];
        
        if (empty($nom)) {
            $errors[] = 'Le nom est obligatoire';
        }
        
        if (empty($prenom)) {
            $errors[] = 'Le prénom est obligatoire';
        }
        
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'L\'email est invalide';
        }
        
        if (empty($telephone) || !preg_match('/^[0-9]{8}$/', $telephone)) {
            $errors[] = 'Le numéro de téléphone doit contenir 8 chiffres';
        }
        
        // Vérification si l'email existe déjà pour un autre utilisateur
        $existingUser = $userRepository->findOneBy(['email' => $email]);
        if ($existingUser && $existingUser->getId() !== $user->getId()) {
            $errors[] = 'Cet email est déjà utilisé par un autre compte';
        }
        
        // S'il y a des erreurs, on les affiche
        if (!empty($errors)) {
            foreach ($errors as $error) {
                $this->addFlash('error', $error);
            }
            return $this->redirectToRoute('mon_compte');
        }
        
        // Mise à jour des données de l'utilisateur
        $user->setNom($nom);
        $user->setPrenom($prenom);
        $user->setEmail($email);
        $user->setTelephone($telephone);
        
        // Sauvegarde des modifications
        $entityManager->flush();
        
        // Message de succès
        $this->addFlash('success', 'Vos informations ont été mises à jour avec succès');
        
        // Redirection vers la page de profil
        return $this->redirectToRoute('mon_compte');
    }
    
    /**
     * Affiche et traite le formulaire de changement de mot de passe
     */
    #[Route('/securite', name: 'mon_compte_securite', methods: ['GET', 'POST'])]
    public function securite(
        Request $request, 
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager,
        UserRepository $userRepository
    ): Response {
        // Récupération de l'utilisateur connecté
        $user = $this->getUser();
        if (!$user instanceof User) {
            throw new AccessDeniedException('Vous devez être connecté pour accéder à cette page.');
        }
        
        // Récupération de l'utilisateur depuis la base de données
        $user = $userRepository->find($user->getId());
        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }
        
        $error = null;
        $success = null;
        
        // Traitement du formulaire si soumis
        if ($request->isMethod('POST')) {
            $currentPassword = $request->request->get('current_password');
            $newPassword = $request->request->get('new_password');
            $confirmPassword = $request->request->get('confirm_password');
            
            // Vérification du mot de passe actuel
            if (!$passwordHasher->isPasswordValid($user, $currentPassword)) {
                $error = 'Le mot de passe actuel est incorrect';
            } 
            // Vérification que le nouveau mot de passe est différent de l'ancien
            elseif ($currentPassword === $newPassword) {
                $error = 'Le nouveau mot de passe doit être différent de l\'ancien';
            }
            // Vérification que les deux nouveaux mots de passe correspondent
            elseif ($newPassword !== $confirmPassword) {
                $error = 'Les deux nouveaux mots de passe ne correspondent pas';
            }
            // Vérification de la longueur du mot de passe (minimum 8 caractères)
            elseif (strlen($newPassword) < 8) {
                $error = 'Le mot de passe doit contenir au moins 8 caractères';
            }
            // Tout est OK, on met à jour le mot de passe
            else {
                // Hashage et mise à jour du mot de passe
                $hashedPassword = $passwordHasher->hashPassword($user, $newPassword);
                $user->setPassword($hashedPassword);
                
                $entityManager->flush();
                
                $success = 'Votre mot de passe a été mis à jour avec succès';
            }
        }
        
        return $this->render('user/security.html.twig', [
            'user' => $user,
            'error' => $error,
            'success' => $success
        ]);
    }
}

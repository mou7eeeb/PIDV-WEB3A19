<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/mon-profil')]
#[IsGranted('ROLE_USER')]
class UserProfileController extends AbstractController
{
    // Affichage du profil utilisateur
    #[Route('', name: 'user_profile')]
    public function profile(UserRepository $userRepository): Response
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

    // Suppression du compte utilisateur
    #[Route('/delete-account', name: 'user_delete_account', methods: ['POST'])]
    public function deleteAccount(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager,
        UserRepository $userRepository,
        LoggerInterface $logger
    ): Response {
        // Récupération de l'utilisateur connecté
        $user = $this->getUser();
        if (!$user instanceof User) {
            throw new AccessDeniedException('Vous devez être connecté pour effectuer cette action.');
        }

        // Récupération de l'utilisateur depuis la base de données pour avoir toutes les données à jour
        $user = $userRepository->find($user->getId());
        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        // Vérification du token CSRF
        $submittedToken = $request->request->get('_token');
        if (!$this->isCsrfTokenValid('delete_account', $submittedToken)) {
            $this->addFlash('error', 'Token CSRF invalide.');
            return $this->redirectToRoute('user_profile');
        }

        // Vérification du mot de passe
        $password = $request->request->get('password');
        if (!$passwordHasher->isPasswordValid($user, $password)) {
            $this->addFlash('error', 'Mot de passe incorrect.');
            return $this->redirectToRoute('user_profile');
        }

        try {
            // Suppression de l'utilisateur
            $userId = $user->getId();
            $userEmail = $user->getEmail();
            
            $entityManager->remove($user);
            $entityManager->flush();
            
            // Déconnexion de l'utilisateur
            $request->getSession()->invalidate();
            $this->container->get('security.token_storage')->setToken(null);
            
            // Log de l'action
            $logger->info("L'utilisateur {$userId} ({$userEmail}) a supprimé son compte.");
            
            // Message de confirmation
            $this->addFlash('success', 'Votre compte a été supprimé avec succès.');
            
            // Redirection vers la page d'accueil
            return $this->redirectToRoute('app_home');
        } catch (\Exception $e) {
            $logger->error("Erreur lors de la suppression du compte utilisateur {$user->getId()}: " . $e->getMessage());
            $this->addFlash('error', 'Une erreur est survenue lors de la suppression de votre compte.');
            return $this->redirectToRoute('user_profile');
        }
    }
}

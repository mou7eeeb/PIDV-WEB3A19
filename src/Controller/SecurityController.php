<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // Debug 1: Check if getUser() works
        $user = $this->getUser();
        
        if ($user instanceof User) {
            // Debug 2: Check user type and roles
            $userType = $user->getTypeUtilisateur();
            $userRoles = $user->getRoles();
            
            // Debug 3: Determine redirect based on type and roles
            if ($userType === 'admin' && in_array('ROLE_ADMIN', $userRoles)) {
                // Admin user goes to admin dashboard
                return $this->redirectToRoute('app_admin_dashboard');
            } else if (in_array($userType, [User::USER_TYPE_FREELANCE, User::USER_TYPE_EMPLOYEUR, User::USER_TYPE_FORMATEUR])) {
                // Regular users go to home page
                return $this->redirectToRoute('app_home');
            }
        }
    
        // If not logged in, show login form
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
    
        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}

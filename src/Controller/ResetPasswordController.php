<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\TwilioService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

#[Route('/reset-password')]
class ResetPasswordController extends AbstractController
{
    /**
     * Affiche le formulaire pour demander un code de réinitialisation par SMS
     */
    #[Route('/request', name: 'app_forgot_password_request')]
    public function request(
        Request $request, 
        UserRepository $userRepository, 
        SessionInterface $session,
        TwilioService $twilioService
    ): Response {
        $error = null;
        $success = null;
        
        if ($request->isMethod('POST')) {
            $telephone = $request->request->get('telephone');
            
            // Vérification que le numéro de téléphone est valide
            if (empty($telephone) || !preg_match('/^[0-9]{8}$/', $telephone)) {
                $error = 'Le numéro de téléphone doit contenir 8 chiffres';
            } else {
                // Recherche de l'utilisateur par numéro de téléphone
                $user = $userRepository->findOneBy(['telephone' => $telephone]);
                
                if (!$user) {
                    $error = 'Aucun compte n\'est associé à ce numéro de téléphone';
                } else {
                    // Stockage de l'ID utilisateur en session
                    $session->set('reset_user_id', $user->getId());
                    $session->set('reset_telephone', $telephone);
                    $session->set('reset_code_expiry', time() + 15 * 60); // Expire dans 15 minutes
                    
                    // Envoi du code de vérification via Twilio Verify
                    $result = $twilioService->sendVerificationCode($telephone);
                    
                    if ($result['success']) {
                        // En mode développement, on peut afficher le code dans un message flash
                        if ($this->getParameter('twilio.dev_mode') && isset($result['code'])) {
                            $this->addFlash('info', 'Pour la démonstration, voici le code de réinitialisation : ' . $result['code']);
                        }
                        
                        $success = 'Un code de réinitialisation a été envoyé au ' . $telephone;
                        
                        // Redirection vers la page de vérification du code
                        return $this->redirectToRoute('app_check_reset_code');
                    } else {
                        $error = 'Une erreur est survenue lors de l\'envoi du code. Veuillez réessayer.';
                        // Afficher les détails de l'erreur en mode développement
                        if ($this->getParameter('twilio.dev_mode')) {
                            $this->addFlash('danger', 'Détails de l\'erreur : ' . $result['message']);
                        }
                    }
                }
            }
        }
        
        return $this->render('user/reset_password.html.twig', [
            'error' => $error,
            'success' => $success,
            'step' => 'request'
        ]);
    }
    
    /**
     * Vérifie le code de réinitialisation envoyé par SMS
     */
    #[Route('/check-code', name: 'app_check_reset_code')]
    public function checkCode(Request $request, SessionInterface $session, TwilioService $twilioService): Response
    {
        // Vérification que l'utilisateur a bien demandé un code
        $userId = $session->get('reset_user_id');
        $telephone = $session->get('reset_telephone');
        $expiry = $session->get('reset_code_expiry');
        
        if (!$userId || !$telephone || !$expiry) {
            $this->addFlash('danger', 'Vous devez d\'abord demander un code de réinitialisation');
            return $this->redirectToRoute('app_forgot_password_request');
        }
        
        // Vérification que le code n'a pas expiré
        if (time() > $expiry) {
            $session->remove('reset_user_id');
            $session->remove('reset_telephone');
            $session->remove('reset_code_expiry');
            
            $this->addFlash('danger', 'Le code de réinitialisation a expiré. Veuillez demander un nouveau code.');
            return $this->redirectToRoute('app_forgot_password_request');
        }
        
        $error = null;
        
        if ($request->isMethod('POST')) {
            $code = $request->request->get('verification_code');
            
            if (empty($code) || !preg_match('/^\d{6}$/', $code)) {
                $error = 'Le code doit contenir 6 chiffres';
            } else {
                // Vérification du code via Twilio Verify
                $result = $twilioService->checkVerificationCode($telephone, $code);
                
                if ($result['success'] && $result['valid']) {
                    // Code valide, on peut passer à la réinitialisation du mot de passe
                    $session->set('reset_code_verified', true);
                    
                    return $this->redirectToRoute('app_reset_password');
                } else {
                    $error = 'Le code saisi est invalide. Veuillez réessayer.';
                    // Afficher les détails de l'erreur en mode développement
                    if ($this->getParameter('twilio.dev_mode') && !$result['success']) {
                        $this->addFlash('danger', 'Détails de l\'erreur : ' . $result['message']);
                    }
                }
            }
        }
        
        return $this->render('user/reset_password.html.twig', [
            'error' => $error,
            'telephone' => $telephone,
            'step' => 'check_code'
        ]);
    }
    
    /**
     * Définition du nouveau mot de passe après vérification du code
     */
    #[Route('/reset', name: 'app_reset_password')]
    public function resetPassword(
        Request $request, 
        SessionInterface $session,
        UserRepository $userRepository,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager
    ): Response {
        // Vérification que les données de réinitialisation sont en session
        if (!$session->has('reset_user_id') || !$session->has('reset_code_expiry') || !$session->has('reset_code_verified')) {
            $this->addFlash('error', 'Votre session a expiré. Veuillez recommencer le processus de réinitialisation.');
            return $this->redirectToRoute('app_forgot_password_request');
        }
        
        // Vérification que le code n'a pas expiré
        if (time() > $session->get('reset_code_expiry')) {
            $session->remove('reset_code');
            $session->remove('reset_user_id');
            $session->remove('reset_code_expiry');
            $session->remove('reset_telephone');
            $session->remove('reset_code_verified');
            
            $this->addFlash('error', 'Votre session a expiré. Veuillez recommencer.');
            return $this->redirectToRoute('app_forgot_password_request');
        }
        
        // Récupération de l'utilisateur
        $user = $userRepository->find($session->get('reset_user_id'));
        if (!$user) {
            $this->addFlash('error', 'Utilisateur non trouvé');
            return $this->redirectToRoute('app_forgot_password_request');
        }
        
        $error = null;
        
        if ($request->isMethod('POST')) {
            $newPassword = $request->request->get('new_password');
            $confirmPassword = $request->request->get('confirm_password');
            
            // Vérification que les deux mots de passe correspondent
            if ($newPassword !== $confirmPassword) {
                $error = 'Les deux mots de passe ne correspondent pas';
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
                
                // Nettoyage de la session
                $session->remove('reset_code');
                $session->remove('reset_user_id');
                $session->remove('reset_code_expiry');
                $session->remove('reset_telephone');
                $session->remove('reset_code_verified');
                
                $this->addFlash('success', 'Votre mot de passe a été réinitialisé avec succès');
                
                // Redirection vers la page de connexion
                return $this->redirectToRoute('app_login');
            }
        }
        
        return $this->render('user/reset_password.html.twig', [
            'error' => $error,
            'step' => 'reset'
        ]);
    }
}

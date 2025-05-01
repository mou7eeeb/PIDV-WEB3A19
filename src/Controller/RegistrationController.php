<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Service\EmailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request, 
        UserPasswordHasherInterface $userPasswordHasher, 
        EntityManagerInterface $entityManager, 
        EmailService $emailService,
        SluggerInterface $slugger = null
    ): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            // Vérifier manuellement les champs
            $isValid = true;
            $errors = [];
            
            // Vérifier le prénom
            if (!$user->getPrenom()) {
                $isValid = false;
                $errors[] = 'Le prénom est obligatoire';
            }
            
            // Vérifier le nom
            if (!$user->getNom()) {
                $isValid = false;
                $errors[] = 'Le nom est obligatoire';
            }
            
            // Vérifier l'email
            if (!$user->getEmail()) {
                $isValid = false;
                $errors[] = 'L\'email est obligatoire';
            }
            
            // Vérifier le téléphone
            if (!$user->getTelephone()) {
                $isValid = false;
                $errors[] = 'Le numéro de téléphone est obligatoire';
            }
            
            // Vérifier le mot de passe
            $plainPassword = $form->get('plainPassword')->getData();
            if (!$plainPassword) {
                $isValid = false;
                $errors[] = 'Le mot de passe est obligatoire';
            } elseif (strlen($plainPassword) < 6) {
                $isValid = false;
                $errors[] = 'Le mot de passe doit contenir au moins 6 caractères';
            } elseif (!preg_match('/^(?=.*[A-Za-z])(?=.*\d).{6,}$/', $plainPassword)) {
                $isValid = false;
                $errors[] = 'Le mot de passe doit contenir au moins une lettre et un chiffre';
            }
            
            // Vérifier les conditions d'utilisation
            if (!$form->get('agreeTerms')->getData()) {
                $isValid = false;
                $errors[] = 'Vous devez accepter les conditions d\'utilisation';
            }
            
            if ($isValid) {
                try {
                    // Afficher les données pour déboguer
                    error_log('Données utilisateur: ' . print_r([                        
                        'prenom' => $user->getPrenom(),
                        'nom' => $user->getNom(),
                        'email' => $user->getEmail(),
                        'telephone' => $user->getTelephone(),
                        'type_utilisateur' => $user->getTypeUtilisateur()
                    ], true));
                    
                    // Hash du mot de passe
                    $hashedPassword = $userPasswordHasher->hashPassword(
                        $user,
                        $plainPassword
                    );
                    
                    // Définir le mot de passe à la fois avec setMotDePasse et setPassword
                    // pour garantir la compatibilité avec le système d'authentification
                    $user->setMotDePasse($hashedPassword);
                    $user->setPassword($hashedPassword);
                    
                    error_log('Mot de passe hashé: ' . $hashedPassword);

                    // Définir la date d'inscription
                    $user->setDateInscription(new \DateTime());

                    // Définir le rôle en fonction du type d'utilisateur
                    if ($user->getTypeUtilisateur() === 'admin') {
                        $user->setRoles(['ROLE_ADMIN']);
                    } else {
                        $user->setRoles(['ROLE_USER']);
                    }

                    // Persister l'utilisateur
                    $entityManager->persist($user);
                    
                    try {
                        $entityManager->flush();
                        error_log('Utilisateur persisté avec succès. ID: ' . $user->getId());
                        
                        // Envoi de l'email de confirmation d'inscription
                        try {
                            $fullName = $user->getPrenom() . ' ' . $user->getNom();
                            $emailService->sendRegistrationConfirmationEmail($user->getEmail(), $fullName);
                            error_log('Email de confirmation envoyé à: ' . $user->getEmail());
                        } catch (\Exception $emailException) {
                            error_log('Erreur lors de l\'envoi de l\'email de confirmation: ' . $emailException->getMessage());
                            // Ne pas bloquer l'inscription si l'envoi d'email échoue
                        }
                        
                        $this->addFlash('success', 'Votre compte a été créé avec succès. Un email de confirmation vous a été envoyé. Vous pouvez maintenant vous connecter.');
                        return $this->redirectToRoute('app_login');
                    } catch (\Exception $flushException) {
                        error_log('Erreur lors du flush: ' . $flushException->getMessage());
                        throw $flushException;
                    }
                } catch (\Exception $e) {
                    error_log('Exception lors de la création du compte: ' . $e->getMessage());
                    $this->addFlash('danger', 'Une erreur est survenue lors de la création de votre compte: ' . $e->getMessage());
                }
            } else {
                // Afficher les erreurs personnalisées
                foreach ($errors as $error) {
                    $this->addFlash('danger', $error);
                }
            }
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}

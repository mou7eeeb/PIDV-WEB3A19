<?php

namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class LoginAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    public function __construct(
        private UrlGeneratorInterface $urlGenerator,
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $passwordHasher
    ) {
    }

    public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('email', '');
        $password = $request->request->get('password', '');
        
        // Log authentication attempt for debugging
        error_log('Authentication attempt for email: ' . $email);
        error_log('Password provided: ' . ($password ? 'Yes (length: ' . strlen($password) . ')' : 'No'));

        $request->getSession()->set(Security::LAST_USERNAME, $email);

        // Vérifier manuellement si l'utilisateur existe avant de créer le Passport
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
        if ($user) {
            error_log('User found in database: ID=' . $user->getId() . ', Type=' . $user->getTypeUtilisateur());
            error_log('Stored password hash: ' . $user->getPassword());
            error_log('User roles: ' . implode(', ', $user->getRoles()));
            
            // Vérification manuelle du mot de passe pour le débogage
            $isPasswordValid = $this->passwordHasher->isPasswordValid($user, $password);
            error_log('Password verification result: ' . ($isPasswordValid ? 'Valid' : 'Invalid'));
            
            if (!$isPasswordValid) {
                error_log('Invalid password for user: ' . $email);
            }
        } else {
            error_log('No user found with email: ' . $email);
        }

        return new Passport(
            new UserBadge($email, function($userIdentifier) {
                // Log user lookup
                error_log('Looking up user with identifier: ' . $userIdentifier);
                
                $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $userIdentifier]);
                
                if (!$user) {
                    error_log('User not found with email: ' . $userIdentifier);
                    throw new UserNotFoundException();
                }
                
                // Vérifier si l'utilisateur est banni (compte inactif)
                if (!$user->isActive()) {
                    error_log('Banned user attempted to login: ' . $userIdentifier);
                    throw new CustomUserMessageAuthenticationException('Votre compte a été désactivé. Veuillez contacter l\'administrateur pour plus d\'informations.');
                }
                
                error_log('User found: ID=' . $user->getId() . ', Type=' . $user->getTypeUtilisateur());
                return $user;
            }),
            new PasswordCredentials($password),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        $user = $token->getUser();
        
        // Redirection en fonction du type d'utilisateur et du rôle
        if ($user instanceof User) {
            // Si l'utilisateur est de type "admin", rediriger vers le tableau de bord admin
            if ($user->getTypeUtilisateur() === 'admin' && in_array('ROLE_ADMIN', $user->getRoles())) {
                return new RedirectResponse($this->urlGenerator->generate('app_admin_dashboard'));
            }
            
            // Pour les autres types d'utilisateurs (freelance, employeur, formateur), rediriger vers la page d'accueil
            if (in_array($user->getTypeUtilisateur(), [User::USER_TYPE_FREELANCE, User::USER_TYPE_EMPLOYEUR, User::USER_TYPE_FORMATEUR])) {
                return new RedirectResponse($this->urlGenerator->generate('app_home'));
            }
        }

        // Redirection par défaut
        return new RedirectResponse($this->urlGenerator->generate('app_home'));
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}

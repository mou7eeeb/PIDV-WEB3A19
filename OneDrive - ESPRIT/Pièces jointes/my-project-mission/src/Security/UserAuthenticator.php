// src/Security/UserAuthenticator.php
public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
{
    /** @var User $user */
    $user = $token->getUser();
    
    if ($user->isEmployeur()) {
        return new RedirectResponse($this->urlGenerator->generate('employeur_missions'));
    }
    
    if ($user->isFreelancer()) {
        return new RedirectResponse($this->urlGenerator->generate('freelancer_missions'));
    }
    
    // Pour les admins
    return new RedirectResponse($this->urlGenerator->generate('admin_dashboard'));
}
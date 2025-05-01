<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;
use Twig\Environment;

class EmailService
{
    private $mailer;
    private $twig;
    private $sender;

    public function __construct(MailerInterface $mailer, Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
        // Utiliser l'adresse Gmail configurée dans .env comme expéditeur
        $this->sender = 'mohamed24025287@gmail.com';
    }

    /**
     * Envoie un email de confirmation d'inscription à l'utilisateur
     * 
     * @param string $recipientEmail L'adresse email du destinataire
     * @param string $recipientName Le nom complet du destinataire
     * @return void
     */
    public function sendRegistrationConfirmationEmail(string $recipientEmail, string $recipientName): void
    {
        try {
            $email = (new Email())
                ->from(new Address($this->sender, 'PI Freelance'))
                ->to(new Address($recipientEmail, $recipientName))
                ->subject('Bienvenue sur PI Freelance - Confirmation d\'inscription')
                ->html(
                    $this->twig->render('emails/registration_confirmation.html.twig', [
                        'name' => $recipientName
                    ])
                )
                ->text(
                    $this->twig->render('emails/registration_confirmation.txt.twig', [
                        'name' => $recipientName
                    ])
                );

            $this->mailer->send($email);
            
            // Log de succès
            error_log('Email de confirmation envoyé avec succès à ' . $recipientEmail);
        } catch (\Exception $e) {
            // Log d'erreur détaillé
            error_log('ERREUR ENVOI EMAIL: ' . $e->getMessage());
            // Propager l'exception pour que le contrôleur puisse la gérer
            throw $e;
        }
    }
}

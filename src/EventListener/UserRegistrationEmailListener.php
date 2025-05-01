<?php

namespace App\EventListener;

use App\Entity\User;
use App\Service\EmailService;
use Doctrine\ORM\Event\PostPersistEventArgs;
use Doctrine\ORM\Events;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Psr\Log\LoggerInterface;

#[AsDoctrineListener(event: Events::postPersist)]
class UserRegistrationEmailListener
{
    private $emailService;
    private $logger;

    public function __construct(EmailService $emailService, LoggerInterface $logger)
    {
        $this->emailService = $emailService;
        $this->logger = $logger;
    }

    public function postPersist(PostPersistEventArgs $args): void
    {
        $entity = $args->getObject();

        // Vérifier si l'entité est un utilisateur
        if (!$entity instanceof User) {
            return;
        }

        // Vérifier si l'utilisateur a un email
        $email = $entity->getEmail();
        if (empty($email)) {
            $this->logger->warning('Tentative d\'envoi d\'email de bienvenue à un utilisateur sans email');
            return;
        }

        // Obtenir le nom de l'utilisateur pour personnaliser l'email
        $userName = $entity->getPrenom() ?: 'Utilisateur';

        try {
            // Envoyer l'email de bienvenue
            $this->emailService->sendRegistrationConfirmationEmail($email, $userName);
            $this->logger->info('Email de bienvenue envoyé avec succès à ' . $email);
        } catch (\Exception $e) {
            $this->logger->error('Erreur lors de l\'envoi de l\'email de bienvenue: ' . $e->getMessage());
        }
    }
}

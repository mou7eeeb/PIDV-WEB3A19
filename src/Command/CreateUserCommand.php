<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-test-user',
    description: 'Crée un utilisateur de test avec un mot de passe simple',
)]
class CreateUserCommand extends Command
{
    private EntityManagerInterface $entityManager;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        
        // Créer un utilisateur de test
        $user = new User();
        $user->setEmail('test@example.com');
        $user->setNom('Test');
        $user->setPrenom('User');
        $user->setTypeUtilisateur('freelance');
        $user->setRoles(['ROLE_USER']);
        $user->setDateInscription(new \DateTime());
        $user->setTelephone('0123456789');
        
        // Mot de passe simple pour les tests
        $plainPassword = 'password123';
        
        // Hasher le mot de passe
        $hashedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);
        $user->setMotDePasse($hashedPassword);
        
        // Afficher le mot de passe hashé pour débogage
        $io->info('Mot de passe hashé: ' . $hashedPassword);
        
        // Vérifier si l'utilisateur existe déjà
        $existingUser = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $user->getEmail()]);
        if ($existingUser) {
            $io->warning('Un utilisateur avec cet email existe déjà. Mise à jour du mot de passe.');
            $existingUser->setMotDePasse($hashedPassword);
            $this->entityManager->flush();
            $io->success('Mot de passe mis à jour pour l\'utilisateur existant.');
        } else {
            // Persister le nouvel utilisateur
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            $io->success('Utilisateur de test créé avec succès.');
        }
        
        $io->info('Email: test@example.com');
        $io->info('Mot de passe: password123');
        
        return Command::SUCCESS;
    }
}

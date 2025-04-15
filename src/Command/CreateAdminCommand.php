<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-admin',
    description: 'Crée un utilisateur administrateur ou réinitialise le mot de passe d\'un utilisateur existant',
)]
class CreateAdminCommand extends Command
{
    private EntityManagerInterface $entityManager;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'Email de l\'administrateur')
            ->addArgument('password', InputArgument::REQUIRED, 'Mot de passe de l\'administrateur')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $email = $input->getArgument('email');
        $plainPassword = $input->getArgument('password');

        // Vérifier si l'utilisateur existe déjà
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
        
        if (!$user) {
            // Créer un nouvel utilisateur
            $user = new User();
            $user->setEmail($email);
            $user->setTypeUtilisateur('admin');
            $user->setRoles(['ROLE_ADMIN']);
            $user->setDateInscription(new \DateTime());
            $user->setNom('Admin');
            $user->setPrenom('System');
            $user->setTelephone('0123456789');
            
            $io->success('Nouvel utilisateur administrateur créé');
        } else {
            $io->note('L\'utilisateur existe déjà, mise à jour du mot de passe');
        }

        // Hasher et définir le mot de passe
        $hashedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);
        $user->setMotDePasse($hashedPassword);
        
        // Debug: Afficher le mot de passe hashé
        $io->info('Mot de passe hashé: ' . $hashedPassword);
        
        // Persister les changements
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $io->success('L\'utilisateur administrateur a été créé/mis à jour avec succès.');
        $io->info('Email: ' . $email);
        $io->info('Mot de passe: ' . $plainPassword . ' (ne sera plus affiché)');
        $io->info('Type: admin');
        $io->info('Rôles: ' . implode(', ', $user->getRoles()));

        return Command::SUCCESS;
    }
}

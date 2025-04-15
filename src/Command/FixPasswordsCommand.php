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
    name: 'app:fix-passwords',
    description: 'Réinitialise tous les mots de passe utilisateurs avec un mot de passe par défaut',
)]
class FixPasswordsCommand extends Command
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
        
        // Récupérer tous les utilisateurs
        $users = $this->entityManager->getRepository(User::class)->findAll();
        
        if (empty($users)) {
            $io->warning('Aucun utilisateur trouvé dans la base de données.');
            return Command::FAILURE;
        }
        
        $count = 0;
        $fixedCount = 0;
        
        foreach ($users as $user) {
            $count++;
            
            // Vérifier si l'utilisateur a déjà un mot de passe
            $motDePasse = $user->getMotDePasse();
            
            if ($motDePasse) {
                // Assurer la cohérence entre les deux méthodes de stockage du mot de passe
                // sans changer le mot de passe original
                $user->setPassword($motDePasse);
                $fixedCount++;
                $io->note("Utilisateur {$user->getEmail()} : mot de passe préservé et format corrigé.");
            }
        }
        
        // Persister les changements
        $this->entityManager->flush();
        
        $io->success("Les mots de passe de {$fixedCount} utilisateurs sur {$count} ont été corrigés avec succès.");
        $io->info("Les mots de passe originaux ont été préservés.");
        
        return Command::SUCCESS;
    }
}

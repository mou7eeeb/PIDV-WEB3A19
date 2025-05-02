<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250502040231 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajoute les colonnes nom et description à la table formation';
    }

    public function up(Schema $schema): void
    {
        // Ajoute les colonnes nom et description à la table formation
        $this->addSql('ALTER TABLE formation ADD COLUMN nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE formation ADD COLUMN description TEXT DEFAULT NULL');
        
        // Mise à jour des données existantes pour définir un nom par défaut basé sur publication_id
        $this->addSql('UPDATE formation SET nom = publication_id WHERE nom IS NULL');
    }

    public function down(Schema $schema): void
    {
        // Supprime les colonnes nom et description de la table formation
        $this->addSql('ALTER TABLE formation DROP COLUMN nom');
        $this->addSql('ALTER TABLE formation DROP COLUMN description');
    }
}

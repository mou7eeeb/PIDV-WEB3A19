<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250416032222 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE user ADD is_active TINYINT(1) NOT NULL, ADD last_login DATETIME DEFAULT NULL, CHANGE nom nom VARCHAR(100) DEFAULT NULL, CHANGE prenom prenom VARCHAR(100) DEFAULT NULL, CHANGE mot_de_passe mot_de_passe VARCHAR(255) DEFAULT NULL, CHANGE type_utilisateur type_utilisateur VARCHAR(50) DEFAULT NULL, CHANGE roles roles JSON NOT NULL, CHANGE telephone telephone VARCHAR(15) DEFAULT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE `user` DROP is_active, DROP last_login, CHANGE nom nom VARCHAR(100) DEFAULT 'NULL', CHANGE prenom prenom VARCHAR(100) DEFAULT 'NULL', CHANGE mot_de_passe mot_de_passe VARCHAR(255) DEFAULT 'NULL', CHANGE type_utilisateur type_utilisateur VARCHAR(50) DEFAULT 'NULL', CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`, CHANGE telephone telephone VARCHAR(15) DEFAULT 'NULL'
        SQL);
    }
}

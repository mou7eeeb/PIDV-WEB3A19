<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250424132118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE metier (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', updated_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE user_metier (user_id INT NOT NULL, metier_id INT NOT NULL, INDEX IDX_34F216B1A76ED395 (user_id), INDEX IDX_34F216B1ED16FA20 (metier_id), PRIMARY KEY(user_id, metier_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_metier ADD CONSTRAINT FK_34F216B1A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_metier ADD CONSTRAINT FK_34F216B1ED16FA20 FOREIGN KEY (metier_id) REFERENCES metier (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user CHANGE nom nom VARCHAR(100) DEFAULT NULL, CHANGE prenom prenom VARCHAR(100) DEFAULT NULL, CHANGE mot_de_passe mot_de_passe VARCHAR(255) DEFAULT NULL, CHANGE type_utilisateur type_utilisateur VARCHAR(50) DEFAULT NULL, CHANGE roles roles JSON NOT NULL, CHANGE telephone telephone VARCHAR(15) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE user_metier DROP FOREIGN KEY FK_34F216B1A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user_metier DROP FOREIGN KEY FK_34F216B1ED16FA20
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE metier
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE user_metier
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `user` CHANGE nom nom VARCHAR(100) DEFAULT 'NULL', CHANGE prenom prenom VARCHAR(100) DEFAULT 'NULL', CHANGE mot_de_passe mot_de_passe VARCHAR(255) DEFAULT 'NULL', CHANGE type_utilisateur type_utilisateur VARCHAR(50) DEFAULT 'NULL', CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`, CHANGE telephone telephone VARCHAR(15) DEFAULT 'NULL', CHANGE last_login last_login DATETIME DEFAULT 'NULL'
        SQL);
    }
}

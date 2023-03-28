<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230326180134 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, day DATE NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, sexe TINYINT(1) NOT NULL, epreuve_choisie VARCHAR(100) NOT NULL, parcours INT NOT NULL, taille_maillot VARCHAR(100) NOT NULL, numero_dossard INT NOT NULL, categorie_age VARCHAR(100) NOT NULL, type_epreuve VARCHAR(100) NOT NULL, birth DATE NOT NULL, date_epreuve DATE NOT NULL, ip VARCHAR(100) NOT NULL, valide TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
    }
}

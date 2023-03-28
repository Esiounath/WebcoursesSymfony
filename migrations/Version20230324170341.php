<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230324170341 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE epreuve DROP FOREIGN KEY epreuve_ibfk_1');
        $this->addSql('ALTER TABLE epreuve DROP FOREIGN KEY epreuve_ibfk_2');
        $this->addSql('ALTER TABLE epreuve DROP FOREIGN KEY epreuve_ibfk_3');
        $this->addSql('ALTER TABLE reglement DROP FOREIGN KEY reglement_ibfk_1');
        $this->addSql('ALTER TABLE manifestation DROP FOREIGN KEY manifestation_ibfk_1');
        $this->addSql('ALTER TABLE adherer DROP FOREIGN KEY adherer_ibfk_1');
        $this->addSql('ALTER TABLE adherer DROP FOREIGN KEY adherer_ibfk_2');
        $this->addSql('DROP TABLE type_reglement');
        $this->addSql('DROP TABLE type_epreuve');
        $this->addSql('DROP TABLE coureur');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE epreuve');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE reglement');
        $this->addSql('DROP TABLE championnat');
        $this->addSql('DROP TABLE parcours');
        $this->addSql('DROP TABLE manifestation');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE adherer');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE type_reglement (typreg_code INT NOT NULL, typreg_nom VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, PRIMARY KEY(typreg_code)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE type_epreuve (typep_id INT NOT NULL, typep_nom VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, PRIMARY KEY(typep_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE coureur (co_id INT NOT NULL, co_nom VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, co_prenom VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, co_adresse VARCHAR(100) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, co_datenais DATE DEFAULT NULL, co_nationalite VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, co_sexe INT DEFAULT NULL, co_numtel INT DEFAULT NULL, co_email VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, co_statut VARCHAR(1) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, PRIMARY KEY(co_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, roles JSON NOT NULL, password VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, day DATE NOT NULL, nom VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, prenom VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, sexe TINYINT(1) NOT NULL, epreuve_choisie VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, parcours INT NOT NULL, taille_maillot VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, numero_dossard INT NOT NULL, categorie_age VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, type_epreuve VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, birth DATE NOT NULL, date_epreuve DATE NOT NULL, ip VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, valide TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE epreuve (ep_id INT NOT NULL, pa_id INT NOT NULL, typep_id INT NOT NULL, ma_id INT NOT NULL, ep_nom VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, ep_lieu VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, ep_datedeb DATE DEFAULT NULL, ep_datefin DATE DEFAULT NULL, INDEX typep_id (typep_id), INDEX pa_id (pa_id), INDEX ma_id (ma_id), PRIMARY KEY(ep_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE club (cl_id INT NOT NULL, cl_nom VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, cl_adresse VARCHAR(100) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, cl_numtel INT DEFAULT NULL, cl_email VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, PRIMARY KEY(cl_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reglement (reg_id INT NOT NULL, typreg_code INT NOT NULL, reg_date_reglement DATE DEFAULT NULL, reg_montant_du NUMERIC(10, 0) DEFAULT NULL, INDEX typreg_code (typreg_code), PRIMARY KEY(reg_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE championnat (ch_id INT NOT NULL, ch_nom VARCHAR(50) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, ch_année DATE DEFAULT NULL, PRIMARY KEY(ch_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE parcours (pa_id INT NOT NULL, pa_nom_parcours VARCHAR(30) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, pa_distance INT DEFAULT NULL, pa_point_depart VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, pa_point_arrivee VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, PRIMARY KEY(pa_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE manifestation (ma_id INT NOT NULL, ch_id INT NOT NULL, ma_nom VARCHAR(50) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, ma_lieu VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, ma_datedeb DATE DEFAULT NULL, ma_datefin DATE DEFAULT NULL, INDEX ch_id (ch_id), PRIMARY KEY(ma_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE categorie (cat_id INT NOT NULL, cat_nom VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, cat_age_tranche_deb VARCHAR(10) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, cat_age_tranche_fin VARCHAR(10) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, PRIMARY KEY(cat_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE adherer (co_id INT NOT NULL, cl_id INT NOT NULL, ad_mtadhesion NUMERIC(6, 2) DEFAULT NULL, ad_dateadhesion DATE DEFAULT NULL, INDEX cl_id (cl_id), INDEX IDX_7786DD12E2F501F7 (co_id), PRIMARY KEY(co_id, cl_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE epreuve ADD CONSTRAINT epreuve_ibfk_1 FOREIGN KEY (pa_id) REFERENCES parcours (pa_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE epreuve ADD CONSTRAINT epreuve_ibfk_2 FOREIGN KEY (typep_id) REFERENCES type_epreuve (typep_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE epreuve ADD CONSTRAINT epreuve_ibfk_3 FOREIGN KEY (ma_id) REFERENCES manifestation (ma_id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reglement ADD CONSTRAINT reglement_ibfk_1 FOREIGN KEY (typreg_code) REFERENCES type_reglement (typreg_code) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE manifestation ADD CONSTRAINT manifestation_ibfk_1 FOREIGN KEY (ch_id) REFERENCES championnat (ch_id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adherer ADD CONSTRAINT adherer_ibfk_1 FOREIGN KEY (co_id) REFERENCES coureur (co_id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE adherer ADD CONSTRAINT adherer_ibfk_2 FOREIGN KEY (cl_id) REFERENCES club (cl_id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}

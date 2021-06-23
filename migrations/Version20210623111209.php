<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210623111209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aide (id INT AUTO_INCREMENT NOT NULL, evenement_id INT DEFAULT NULL, membre_id INT DEFAULT NULL, montant INT NOT NULL, UNIQUE INDEX UNIQ_D99184A1FD02F13 (evenement_id), INDEX IDX_D99184A16A99F74A (membre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, retraite INT NOT NULL, cdi INT NOT NULL, cdd INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cotisation (id INT AUTO_INCREMENT NOT NULL, membre_id INT DEFAULT NULL, montant INT NOT NULL, INDEX IDX_AE64D2ED6A99F74A (membre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, nature VARCHAR(255) NOT NULL, montant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membre (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, datenaiss DATE NOT NULL, email VARCHAR(255) NOT NULL, montant_cotisation INT NOT NULL, date_adhesion DATE NOT NULL, UNIQUE INDEX UNIQ_F6B4FB29BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prets (id INT AUTO_INCREMENT NOT NULL, membre_id INT DEFAULT NULL, montant INT NOT NULL, type_pret VARCHAR(255) NOT NULL, delai DATE NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_3285EA7A6A99F74A (membre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE remboursement (id INT AUTO_INCREMENT NOT NULL, membre_id INT DEFAULT NULL, montant INT NOT NULL, date DATE NOT NULL, interet DOUBLE PRECISION NOT NULL, INDEX IDX_C0C0D9EF6A99F74A (membre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aide ADD CONSTRAINT FK_D99184A1FD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id)');
        $this->addSql('ALTER TABLE aide ADD CONSTRAINT FK_D99184A16A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE cotisation ADD CONSTRAINT FK_AE64D2ED6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE membre ADD CONSTRAINT FK_F6B4FB29BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE prets ADD CONSTRAINT FK_3285EA7A6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE remboursement ADD CONSTRAINT FK_C0C0D9EF6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE membre DROP FOREIGN KEY FK_F6B4FB29BCF5E72D');
        $this->addSql('ALTER TABLE aide DROP FOREIGN KEY FK_D99184A1FD02F13');
        $this->addSql('ALTER TABLE aide DROP FOREIGN KEY FK_D99184A16A99F74A');
        $this->addSql('ALTER TABLE cotisation DROP FOREIGN KEY FK_AE64D2ED6A99F74A');
        $this->addSql('ALTER TABLE prets DROP FOREIGN KEY FK_3285EA7A6A99F74A');
        $this->addSql('ALTER TABLE remboursement DROP FOREIGN KEY FK_C0C0D9EF6A99F74A');
        $this->addSql('DROP TABLE aide');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE cotisation');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE membre');
        $this->addSql('DROP TABLE prets');
        $this->addSql('DROP TABLE remboursement');
    }
}

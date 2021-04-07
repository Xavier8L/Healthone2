<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210407140710 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE medicijnen (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(255) NOT NULL, werking LONGTEXT NOT NULL, bijwerking LONGTEXT DEFAULT NULL, verzekerd TINYINT(1) NOT NULL, prijs INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patienten (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(255) NOT NULL, geboortedatum DATE NOT NULL, adres VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telefoonummer INT NOT NULL, verzekeringsnummer INT NOT NULL, aandoeningen VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recepten (id INT AUTO_INCREMENT NOT NULL, medicijn_id INT NOT NULL, patient_id INT DEFAULT NULL, datum DATE NOT NULL, periode VARCHAR(255) NOT NULL, INDEX IDX_72C1CA2DFC35CB (medicijn_id), INDEX IDX_72C1CA26B899279 (patient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE text (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recepten ADD CONSTRAINT FK_72C1CA2DFC35CB FOREIGN KEY (medicijn_id) REFERENCES medicijnen (id)');
        $this->addSql('ALTER TABLE recepten ADD CONSTRAINT FK_72C1CA26B899279 FOREIGN KEY (patient_id) REFERENCES patienten (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recepten DROP FOREIGN KEY FK_72C1CA2DFC35CB');
        $this->addSql('ALTER TABLE recepten DROP FOREIGN KEY FK_72C1CA26B899279');
        $this->addSql('DROP TABLE medicijnen');
        $this->addSql('DROP TABLE patienten');
        $this->addSql('DROP TABLE recepten');
        $this->addSql('DROP TABLE text');
        $this->addSql('DROP TABLE user');
    }
}

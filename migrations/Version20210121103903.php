<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210121103903 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE patienten (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(255) NOT NULL, geboortedatum DATE NOT NULL, adres VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telefoonummer INT NOT NULL, verzekeringsnummer INT NOT NULL, aandoeningen VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recepten ADD patient_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE recepten ADD CONSTRAINT FK_72C1CA26B899279 FOREIGN KEY (patient_id) REFERENCES patienten (id)');
        $this->addSql('CREATE INDEX IDX_72C1CA26B899279 ON recepten (patient_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recepten DROP FOREIGN KEY FK_72C1CA26B899279');
        $this->addSql('DROP TABLE patienten');
        $this->addSql('DROP INDEX IDX_72C1CA26B899279 ON recepten');
        $this->addSql('ALTER TABLE recepten DROP patient_id');
    }
}

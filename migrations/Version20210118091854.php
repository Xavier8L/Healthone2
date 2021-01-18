<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210118091854 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recepten DROP FOREIGN KEY FK_B92268A1DFC35CB');
        $this->addSql('DROP INDEX idx_b92268a1dfc35cb ON recepten');
        $this->addSql('CREATE INDEX IDX_72C1CA2DFC35CB ON recepten (medicijn_id)');
        $this->addSql('ALTER TABLE recepten ADD CONSTRAINT FK_B92268A1DFC35CB FOREIGN KEY (medicijn_id) REFERENCES medicijnen (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE recepten DROP FOREIGN KEY FK_72C1CA2DFC35CB');
        $this->addSql('DROP INDEX idx_72c1ca2dfc35cb ON recepten');
        $this->addSql('CREATE INDEX IDX_B92268A1DFC35CB ON recepten (medicijn_id)');
        $this->addSql('ALTER TABLE recepten ADD CONSTRAINT FK_72C1CA2DFC35CB FOREIGN KEY (medicijn_id) REFERENCES medicijnen (id)');
    }
}

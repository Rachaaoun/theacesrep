<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220220194117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sponsors CHANGE name name VARCHAR(255) NOT NULL, CHANGE logo logo VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DF9135A226');
        $this->addSql('DROP INDEX fkey8 ON tournoi');
        $this->addSql('ALTER TABLE tournoi DROP image, DROP idSponsor, DROP nbparticipant, CHANGE name name VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sponsors CHANGE name name VARCHAR(20) NOT NULL, CHANGE logo logo VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE tournoi ADD image VARCHAR(30) DEFAULT \'NULL\', ADD idSponsor INT DEFAULT NULL, ADD nbparticipant INT DEFAULT NULL, CHANGE name name VARCHAR(20) NOT NULL, CHANGE description description TEXT NOT NULL');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DF9135A226 FOREIGN KEY (idSponsor) REFERENCES sponsors (id)');
        $this->addSql('CREATE INDEX fkey8 ON tournoi (idSponsor)');
    }
}

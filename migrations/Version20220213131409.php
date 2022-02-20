<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220213131409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date DATE NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE admin CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE avis CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE idCl idCl INT DEFAULT NULL, CHANGE idComment idComment INT DEFAULT NULL, CHANGE imgClient imgClient VARCHAR(30) DEFAULT NULL, CHANGE nomClient nomClient VARCHAR(10) DEFAULT NULL');
        $this->addSql('ALTER TABLE client CHANGE idClient idClient INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE commentaire CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE element CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE livraison CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE cinLivreur cinLivreur INT DEFAULT NULL, CHANGE idClient idClient INT DEFAULT NULL, CHANGE idProd idProd INT DEFAULT NULL, CHANGE adresseClient adresseClient VARCHAR(30) DEFAULT NULL');
        $this->addSql('ALTER TABLE livreur CHANGE cin cin INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE promotion CHANGE idProd idProd INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reclamation CHANGE idRec idRec INT AUTO_INCREMENT NOT NULL, CHANGE idClient idClient INT DEFAULT NULL, CHANGE idRep idRep INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reparation CHANGE idRep idRep INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE responsable CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE sponsors CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE tournoi CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE idSponsor idSponsor INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE evenement');
        $this->addSql('ALTER TABLE admin CHANGE id id INT NOT NULL, CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE prenom prenom VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE adresse adresse VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE mail mail VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE champ_de_gestion champ_de_gestion VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE login login VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE mdp mdp VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE avis CHANGE id id INT NOT NULL, CHANGE description description TEXT NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE nomClient nomClient VARCHAR(10) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE idComment idComment INT NOT NULL, CHANGE imgClient imgClient VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE idCl idCl INT NOT NULL');
        $this->addSql('ALTER TABLE client CHANGE idClient idClient INT NOT NULL, CHANGE name name VARCHAR(10) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE prenom prenom VARCHAR(11) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE adresse adresse VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE mail mail VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE login login VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE mdp mdp VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE image image VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE commentaire CHANGE id id INT NOT NULL, CHANGE contenu contenu TEXT NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE element CHANGE id id INT NOT NULL, CHANGE type type VARCHAR(10) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE ref ref VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE nom nom VARCHAR(10) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE description description TEXT NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE image image VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE etat etat VARCHAR(10) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE livraison CHANGE id id INT NOT NULL, CHANGE method method VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE idProd idProd INT NOT NULL, CHANGE idClient idClient INT NOT NULL, CHANGE adresseClient adresseClient VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE cinLivreur cinLivreur INT NOT NULL');
        $this->addSql('ALTER TABLE livreur CHANGE cin cin INT NOT NULL, CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE prenom prenom VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE promotion CHANGE idProd idProd INT NOT NULL');
        $this->addSql('ALTER TABLE reclamation CHANGE idRec idRec INT NOT NULL, CHANGE description description TEXT NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE idRep idRep INT NOT NULL, CHANGE idClient idClient INT NOT NULL');
        $this->addSql('ALTER TABLE reparation CHANGE idRep idRep INT NOT NULL');
        $this->addSql('ALTER TABLE responsable CHANGE id id INT NOT NULL, CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE prenom prenom VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE adresse adresse VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE mail mail VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE champ_de_gestion champ_de_gestion VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE login login VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE mdp mdp VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE sponsors CHANGE id id INT NOT NULL, CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE logo logo VARCHAR(30) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE tournoi CHANGE id id INT NOT NULL, CHANGE name name VARCHAR(20) NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE description description TEXT NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE idSponsor idSponsor INT NOT NULL');
    }
}

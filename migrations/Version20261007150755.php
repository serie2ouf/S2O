<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261007150755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT IDENTITY NOT NULL, lib_categorie NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE chapitre (id INT IDENTITY NOT NULL, date_sortie DATE NOT NULL, num_chapitre INT NOT NULL, id_livre_id INT, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_8C62B0256702C95E ON chapitre (id_livre_id)');
        $this->addSql('CREATE TABLE commande (id INT IDENTITY NOT NULL, date_commande DATE NOT NULL, id_profil_id INT, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_6EEAA67DA76B6C5F ON commande (id_profil_id)');
        $this->addSql('CREATE TABLE episode (id INT IDENTITY NOT NULL, num_episode INT NOT NULL, titre_episode NVARCHAR(255) NOT NULL, id_saison_id INT, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_DDAA1CDA7950FD6B ON episode (id_saison_id)');
        $this->addSql('CREATE TABLE genre (id INT IDENTITY NOT NULL, lib_genre NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE insciption_news (id INT IDENTITY NOT NULL, email NVARCHAR(255) NOT NULL, id_profil_id INT NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8AC46D6CA76B6C5F ON insciption_news (id_profil_id) WHERE id_profil_id IS NOT NULL');
        $this->addSql('CREATE TABLE ligne_commande (id INT IDENTITY NOT NULL, qte INT NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE livre (id INT IDENTITY NOT NULL, titre NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE message (id INT IDENTITY NOT NULL, contenue_message NVARCHAR(255) NOT NULL, date_message DATE NOT NULL, id_profil_id INT, id_profil_envoyer_id INT, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_B6BD307FA76B6C5F ON message (id_profil_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FB81CBA87 ON message (id_profil_envoyer_id)');
        $this->addSql('CREATE TABLE musique (id INT IDENTITY NOT NULL, nom_musique NVARCHAR(255) NOT NULL, compositeur_musique NVARCHAR(255) NOT NULL, duree DATE NOT NULL, annee_sortie DATE NOT NULL, id_serie_id INT, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_EE1D56BC89986428 ON musique (id_serie_id)');
        $this->addSql('CREATE TABLE noter_chapitres (id INT IDENTITY NOT NULL, note INT NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE noter_episodes (id INT IDENTITY NOT NULL, note INT NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE personnage (id INT IDENTITY NOT NULL, nom_personnage NVARCHAR(255) NOT NULL, id_serie_id INT, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_6AEA486D89986428 ON personnage (id_serie_id)');
        $this->addSql('CREATE TABLE produit (id INT IDENTITY NOT NULL, nom_produit NVARCHAR(255) NOT NULL, prix_produit DOUBLE PRECISION NOT NULL, desc_produit NVARCHAR(255) NOT NULL, image_produit VARBINARY(MAX), id_serie_id INT, id_categorie_id INT, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_29A5EC2789986428 ON produit (id_serie_id)');
        $this->addSql('CREATE INDEX IDX_29A5EC279F34925F ON produit (id_categorie_id)');
        $this->addSql('CREATE TABLE profil (id INT IDENTITY NOT NULL, email NVARCHAR(180) NOT NULL, roles VARCHAR(MAX) NOT NULL, password NVARCHAR(255) NOT NULL, statut NVARCHAR(255) NOT NULL, nom_utilisateur NVARCHAR(255) NOT NULL, nb_suivis INT NOT NULL, nbsuiveur INT NOT NULL, compteur_bannisement INT NOT NULL, role_profil NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON profil (email) WHERE email IS NOT NULL');
        $this->addSql('CREATE TABLE saison (id INT IDENTITY NOT NULL, date_saison DATE NOT NULL, num_saison INT NOT NULL, id_serie_id INT, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_C0D0D58689986428 ON saison (id_serie_id)');
        $this->addSql('CREATE TABLE serie (id INT IDENTITY NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE suggestion (id INT IDENTITY NOT NULL, type_suggestion NVARCHAR(255), message_suggestion NVARCHAR(255) NOT NULL, contenu_message NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT IDENTITY NOT NULL, body VARCHAR(MAX) NOT NULL, headers VARCHAR(MAX) NOT NULL, queue_name NVARCHAR(190) NOT NULL, created_at DATETIME2(6) NOT NULL, available_at DATETIME2(6) NOT NULL, delivered_at DATETIME2(6), PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 ON messenger_messages (queue_name, available_at, delivered_at, id)');
        $this->addSql('ALTER TABLE chapitre ADD CONSTRAINT FK_8C62B0256702C95E FOREIGN KEY (id_livre_id) REFERENCES livre (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DA76B6C5F FOREIGN KEY (id_profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA7950FD6B FOREIGN KEY (id_saison_id) REFERENCES saison (id)');
        $this->addSql('ALTER TABLE insciption_news ADD CONSTRAINT FK_8AC46D6CA76B6C5F FOREIGN KEY (id_profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76B6C5F FOREIGN KEY (id_profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FB81CBA87 FOREIGN KEY (id_profil_envoyer_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE musique ADD CONSTRAINT FK_EE1D56BC89986428 FOREIGN KEY (id_serie_id) REFERENCES serie (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D89986428 FOREIGN KEY (id_serie_id) REFERENCES serie (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2789986428 FOREIGN KEY (id_serie_id) REFERENCES serie (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC279F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE saison ADD CONSTRAINT FK_C0D0D58689986428 FOREIGN KEY (id_serie_id) REFERENCES serie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('ALTER TABLE chapitre DROP CONSTRAINT FK_8C62B0256702C95E');
        $this->addSql('ALTER TABLE commande DROP CONSTRAINT FK_6EEAA67DA76B6C5F');
        $this->addSql('ALTER TABLE episode DROP CONSTRAINT FK_DDAA1CDA7950FD6B');
        $this->addSql('ALTER TABLE insciption_news DROP CONSTRAINT FK_8AC46D6CA76B6C5F');
        $this->addSql('ALTER TABLE message DROP CONSTRAINT FK_B6BD307FA76B6C5F');
        $this->addSql('ALTER TABLE message DROP CONSTRAINT FK_B6BD307FB81CBA87');
        $this->addSql('ALTER TABLE musique DROP CONSTRAINT FK_EE1D56BC89986428');
        $this->addSql('ALTER TABLE personnage DROP CONSTRAINT FK_6AEA486D89986428');
        $this->addSql('ALTER TABLE produit DROP CONSTRAINT FK_29A5EC2789986428');
        $this->addSql('ALTER TABLE produit DROP CONSTRAINT FK_29A5EC279F34925F');
        $this->addSql('ALTER TABLE saison DROP CONSTRAINT FK_C0D0D58689986428');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE chapitre');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE episode');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE insciption_news');
        $this->addSql('DROP TABLE ligne_commande');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE musique');
        $this->addSql('DROP TABLE noter_chapitres');
        $this->addSql('DROP TABLE noter_episodes');
        $this->addSql('DROP TABLE personnage');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE saison');
        $this->addSql('DROP TABLE serie');
        $this->addSql('DROP TABLE suggestion');
        $this->addSql('DROP TABLE messenger_messages');
    }
}

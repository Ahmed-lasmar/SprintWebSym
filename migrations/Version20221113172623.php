<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221113172623 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE application (id_app INT AUTO_INCREMENT NOT NULL, candidat VARCHAR(50) NOT NULL, offre VARCHAR(50) NOT NULL, cv VARCHAR(50) NOT NULL, etat VARCHAR(50) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id_app)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidat CHANGE Id_Can Id_Can INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE conge CHANGE idCon idCon INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE contrat CHANGE Id_Contrat Id_Contrat INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE demande CHANGE Id_dem Id_dem INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE employe CHANGE Id_per Id_per INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE entretien CHANGE id_entretien id_entretien INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE evaluation CHANGE id_evaluation id_evaluation INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE evenement CHANGE idEvent idEvent INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE fiche_de_paie CHANGE ID_FP ID_FP INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE formateur CHANGE Id_Formateur Id_Formateur INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE formation CHANGE Id_For Id_For INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE formatteur CHANGE Id_formatteur Id_formatteur INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (Id_formatteur)');
        $this->addSql('ALTER TABLE offreemploi CHANGE id_offre id_offre INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id_offre)');
        $this->addSql('ALTER TABLE participation CHANGE idParticipation idParticipation INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (idParticipation)');
        $this->addSql('ALTER TABLE personne CHANGE Id_Per Id_Per INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (Id_Per)');
        $this->addSql('ALTER TABLE postule CHANGE id_Post id_Post INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id_Post)');
        $this->addSql('CREATE INDEX Id_Can ON postule (Id_Can)');
        $this->addSql('CREATE INDEX Id_Off ON postule (Id_Off)');
        $this->addSql('ALTER TABLE prime CHANGE ID_Prime ID_Prime INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (ID_Prime)');
        $this->addSql('ALTER TABLE user CHANGE idUser idUser INT AUTO_INCREMENT NOT NULL, CHANGE Date_embauche Date_embauche DATE DEFAULT NULL, CHANGE Grade Grade VARCHAR(255) DEFAULT NULL, CHANGE Equipe Equipe VARCHAR(255) DEFAULT NULL, CHANGE Role Role VARCHAR(255) DEFAULT NULL, ADD PRIMARY KEY (idUser)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE application');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE demande CHANGE Id_dem Id_dem INT NOT NULL');
        $this->addSql('ALTER TABLE formation CHANGE Id_For Id_For INT NOT NULL');
        $this->addSql('ALTER TABLE user MODIFY idUser INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON user');
        $this->addSql('ALTER TABLE user CHANGE idUser idUser INT NOT NULL, CHANGE Date_embauche Date_embauche DATE NOT NULL, CHANGE Grade Grade VARCHAR(255) NOT NULL, CHANGE Equipe Equipe VARCHAR(255) NOT NULL, CHANGE Role Role VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE candidat CHANGE Id_Can Id_Can INT NOT NULL');
        $this->addSql('ALTER TABLE employe CHANGE Id_per Id_per INT NOT NULL');
        $this->addSql('ALTER TABLE offreemploi MODIFY id_offre INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON offreemploi');
        $this->addSql('ALTER TABLE offreemploi CHANGE id_offre id_offre INT NOT NULL');
        $this->addSql('ALTER TABLE contrat CHANGE Id_Contrat Id_Contrat INT NOT NULL');
        $this->addSql('ALTER TABLE evaluation CHANGE id_evaluation id_evaluation INT NOT NULL');
        $this->addSql('ALTER TABLE fiche_de_paie CHANGE ID_FP ID_FP INT NOT NULL');
        $this->addSql('ALTER TABLE personne MODIFY Id_Per INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON personne');
        $this->addSql('ALTER TABLE personne CHANGE Id_Per Id_Per INT NOT NULL');
        $this->addSql('ALTER TABLE formatteur MODIFY Id_formatteur INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON formatteur');
        $this->addSql('ALTER TABLE formatteur CHANGE Id_formatteur Id_formatteur INT NOT NULL');
        $this->addSql('ALTER TABLE participation MODIFY idParticipation INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON participation');
        $this->addSql('ALTER TABLE participation CHANGE idParticipation idParticipation INT NOT NULL');
        $this->addSql('ALTER TABLE postule MODIFY id_Post INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON postule');
        $this->addSql('DROP INDEX Id_Can ON postule');
        $this->addSql('DROP INDEX Id_Off ON postule');
        $this->addSql('ALTER TABLE postule CHANGE id_Post id_Post INT NOT NULL');
        $this->addSql('ALTER TABLE entretien CHANGE id_entretien id_entretien INT NOT NULL');
        $this->addSql('ALTER TABLE formateur CHANGE Id_Formateur Id_Formateur INT NOT NULL');
        $this->addSql('ALTER TABLE conge CHANGE idCon idCon INT NOT NULL');
        $this->addSql('ALTER TABLE evenement CHANGE idEvent idEvent INT NOT NULL');
        $this->addSql('ALTER TABLE prime MODIFY ID_Prime INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON prime');
        $this->addSql('ALTER TABLE prime CHANGE ID_Prime ID_Prime INT NOT NULL');
    }
}

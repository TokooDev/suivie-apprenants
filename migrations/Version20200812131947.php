<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200812131947 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE groupe_de_competence_competence (groupe_de_competence_id INT NOT NULL, competence_id INT NOT NULL, INDEX IDX_ADAE76A2D0A2E50 (groupe_de_competence_id), INDEX IDX_ADAE76A215761DAB (competence_id), PRIMARY KEY(groupe_de_competence_id, competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_de_tag_tag (groupe_de_tag_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_86A22ADEF194E202 (groupe_de_tag_id), INDEX IDX_86A22ADEBAD26311 (tag_id), PRIMARY KEY(groupe_de_tag_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE groupe_de_competence_competence ADD CONSTRAINT FK_ADAE76A2D0A2E50 FOREIGN KEY (groupe_de_competence_id) REFERENCES groupe_de_competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_de_competence_competence ADD CONSTRAINT FK_ADAE76A215761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_de_tag_tag ADD CONSTRAINT FK_86A22ADEF194E202 FOREIGN KEY (groupe_de_tag_id) REFERENCES groupe_de_tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_de_tag_tag ADD CONSTRAINT FK_86A22ADEBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE competence_groupe_de_competence');
        $this->addSql('DROP TABLE competence_niveau_devaluation');
        $this->addSql('ALTER TABLE groupe_de_competence DROP description, CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE groupe_de_tag CHANGE libelle libelle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE niveau_devaluation CHANGE actions actions VARCHAR(255) NOT NULL, CHANGE critere criteres VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE promo CHANGE langue langue VARCHAR(255) NOT NULL, CHANGE titre titre VARCHAR(255) NOT NULL, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE date_fin date_fin DATE NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competence_groupe_de_competence (competence_id INT NOT NULL, groupe_de_competence_id INT NOT NULL, INDEX IDX_BC37A35CD0A2E50 (groupe_de_competence_id), INDEX IDX_BC37A35C15761DAB (competence_id), PRIMARY KEY(competence_id, groupe_de_competence_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE competence_niveau_devaluation (competence_id INT NOT NULL, niveau_devaluation_id INT NOT NULL, INDEX IDX_18D732F7947D7A72 (niveau_devaluation_id), INDEX IDX_18D732F715761DAB (competence_id), PRIMARY KEY(competence_id, niveau_devaluation_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE competence_groupe_de_competence ADD CONSTRAINT FK_BC37A35C15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_groupe_de_competence ADD CONSTRAINT FK_BC37A35CD0A2E50 FOREIGN KEY (groupe_de_competence_id) REFERENCES groupe_de_competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_niveau_devaluation ADD CONSTRAINT FK_18D732F715761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_niveau_devaluation ADD CONSTRAINT FK_18D732F7947D7A72 FOREIGN KEY (niveau_devaluation_id) REFERENCES niveau_devaluation (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE groupe_de_competence_competence');
        $this->addSql('DROP TABLE groupe_de_tag_tag');
        $this->addSql('ALTER TABLE groupe_de_competence ADD description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE groupe_de_tag CHANGE libelle libelle VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE niveau_devaluation CHANGE actions actions VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE criteres critere VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE promo CHANGE langue langue VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE titre titre VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_fin date_fin DATE DEFAULT NULL');
    }
}

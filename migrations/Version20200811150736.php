<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200811150736 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tag_groupe_tag DROP FOREIGN KEY FK_2932D77FD1EC9F2B');
        $this->addSql('ALTER TABLE competence_niveau_evaluation DROP FOREIGN KEY FK_E1E4DE6855CCA3C7');
        $this->addSql('CREATE TABLE competence_niveau_devaluation (competence_id INT NOT NULL, niveau_devaluation_id INT NOT NULL, INDEX IDX_18D732F715761DAB (competence_id), INDEX IDX_18D732F7947D7A72 (niveau_devaluation_id), PRIMARY KEY(competence_id, niveau_devaluation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_de_tag (id INT AUTO_INCREMENT NOT NULL, libele VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau_devaluation (id INT AUTO_INCREMENT NOT NULL, actions VARCHAR(255) DEFAULT NULL, critere VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_groupe_de_tag (tag_id INT NOT NULL, groupe_de_tag_id INT NOT NULL, INDEX IDX_9943EE8ABAD26311 (tag_id), INDEX IDX_9943EE8AF194E202 (groupe_de_tag_id), PRIMARY KEY(tag_id, groupe_de_tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competence_niveau_devaluation ADD CONSTRAINT FK_18D732F715761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_niveau_devaluation ADD CONSTRAINT FK_18D732F7947D7A72 FOREIGN KEY (niveau_devaluation_id) REFERENCES niveau_devaluation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_groupe_de_tag ADD CONSTRAINT FK_9943EE8ABAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_groupe_de_tag ADD CONSTRAINT FK_9943EE8AF194E202 FOREIGN KEY (groupe_de_tag_id) REFERENCES groupe_de_tag (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE competence_niveau_evaluation');
        $this->addSql('DROP TABLE groupe_tag');
        $this->addSql('DROP TABLE niveau_evaluation');
        $this->addSql('DROP TABLE tag_groupe_tag');
        $this->addSql('ALTER TABLE groupe_de_competence CHANGE libele libelle VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tag_groupe_de_tag DROP FOREIGN KEY FK_9943EE8AF194E202');
        $this->addSql('ALTER TABLE competence_niveau_devaluation DROP FOREIGN KEY FK_18D732F7947D7A72');
        $this->addSql('CREATE TABLE competence_niveau_evaluation (competence_id INT NOT NULL, niveau_evaluation_id INT NOT NULL, INDEX IDX_E1E4DE6815761DAB (competence_id), INDEX IDX_E1E4DE6855CCA3C7 (niveau_evaluation_id), PRIMARY KEY(competence_id, niveau_evaluation_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE groupe_tag (id INT AUTO_INCREMENT NOT NULL, libele VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE niveau_evaluation (id INT AUTO_INCREMENT NOT NULL, actions VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, critere VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tag_groupe_tag (tag_id INT NOT NULL, groupe_tag_id INT NOT NULL, INDEX IDX_2932D77FBAD26311 (tag_id), INDEX IDX_2932D77FD1EC9F2B (groupe_tag_id), PRIMARY KEY(tag_id, groupe_tag_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE competence_niveau_evaluation ADD CONSTRAINT FK_E1E4DE6815761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_niveau_evaluation ADD CONSTRAINT FK_E1E4DE6855CCA3C7 FOREIGN KEY (niveau_evaluation_id) REFERENCES niveau_evaluation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_groupe_tag ADD CONSTRAINT FK_2932D77FBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_groupe_tag ADD CONSTRAINT FK_2932D77FD1EC9F2B FOREIGN KEY (groupe_tag_id) REFERENCES groupe_tag (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE competence_niveau_devaluation');
        $this->addSql('DROP TABLE groupe_de_tag');
        $this->addSql('DROP TABLE niveau_devaluation');
        $this->addSql('DROP TABLE tag_groupe_de_tag');
        $this->addSql('ALTER TABLE groupe_de_competence CHANGE libelle libele VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}

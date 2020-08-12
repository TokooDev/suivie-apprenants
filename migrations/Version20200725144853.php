<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200725144853 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE apprenant (id INT AUTO_INCREMENT NOT NULL, profildesortie_id INT DEFAULT NULL, promo_id INT DEFAULT NULL, prenom VARCHAR(60) NOT NULL, nom VARCHAR(60) NOT NULL, email VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, avatar VARCHAR(255) NOT NULL, INDEX IDX_C4EB462ECEB2FD19 (profildesortie_id), INDEX IDX_C4EB462ED0C07AFF (promo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apprenant_competence (apprenant_id INT NOT NULL, competence_id INT NOT NULL, INDEX IDX_F65E1DCAC5697D6D (apprenant_id), INDEX IDX_F65E1DCA15761DAB (competence_id), PRIMARY KEY(apprenant_id, competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence_tag (competence_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_294CD36D15761DAB (competence_id), INDEX IDX_294CD36DBAD26311 (tag_id), PRIMARY KEY(competence_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, formateur_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, projet VARCHAR(255) DEFAULT NULL, INDEX IDX_4B98C21155D8F51 (formateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_apprenant (groupe_id INT NOT NULL, apprenant_id INT NOT NULL, INDEX IDX_947F95197A45358C (groupe_id), INDEX IDX_947F9519C5697D6D (apprenant_id), PRIMARY KEY(groupe_id, apprenant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_de_competence (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_de_competence_competence (groupe_de_competence_id INT NOT NULL, competence_id INT NOT NULL, INDEX IDX_ADAE76A2D0A2E50 (groupe_de_competence_id), INDEX IDX_ADAE76A215761DAB (competence_id), PRIMARY KEY(groupe_de_competence_id, competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_de_tag (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_de_tag_tag (groupe_de_tag_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_86A22ADEF194E202 (groupe_de_tag_id), INDEX IDX_86A22ADEBAD26311 (tag_id), PRIMARY KEY(groupe_de_tag_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau_devaluation (id INT AUTO_INCREMENT NOT NULL, actions VARCHAR(255) NOT NULL, criteres VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau_devaluation_competence (niveau_devaluation_id INT NOT NULL, competence_id INT NOT NULL, INDEX IDX_B56A635947D7A72 (niveau_devaluation_id), INDEX IDX_B56A63515761DAB (competence_id), PRIMARY KEY(niveau_devaluation_id, competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil_de_sortie (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promo (id INT AUTO_INCREMENT NOT NULL, langue VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, lieu VARCHAR(255) NOT NULL, reference_agate VARCHAR(255) DEFAULT NULL, fabrique VARCHAR(255) DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promo_referentiel (promo_id INT NOT NULL, referentiel_id INT NOT NULL, INDEX IDX_638B8B6BD0C07AFF (promo_id), INDEX IDX_638B8B6B805DB139 (referentiel_id), PRIMARY KEY(promo_id, referentiel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE referentiel (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, presentation LONGTEXT DEFAULT NULL, programme VARCHAR(255) DEFAULT NULL, critere_evaluation LONGTEXT DEFAULT NULL, critere_admission LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, profil_id INT NOT NULL, username VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(60) NOT NULL, nom VARCHAR(60) NOT NULL, email VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, avatar VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), INDEX IDX_8D93D649275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apprenant ADD CONSTRAINT FK_C4EB462ECEB2FD19 FOREIGN KEY (profildesortie_id) REFERENCES profil_de_sortie (id)');
        $this->addSql('ALTER TABLE apprenant ADD CONSTRAINT FK_C4EB462ED0C07AFF FOREIGN KEY (promo_id) REFERENCES promo (id)');
        $this->addSql('ALTER TABLE apprenant_competence ADD CONSTRAINT FK_F65E1DCAC5697D6D FOREIGN KEY (apprenant_id) REFERENCES apprenant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apprenant_competence ADD CONSTRAINT FK_F65E1DCA15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_tag ADD CONSTRAINT FK_294CD36D15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_tag ADD CONSTRAINT FK_294CD36DBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe ADD CONSTRAINT FK_4B98C21155D8F51 FOREIGN KEY (formateur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE groupe_apprenant ADD CONSTRAINT FK_947F95197A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_apprenant ADD CONSTRAINT FK_947F9519C5697D6D FOREIGN KEY (apprenant_id) REFERENCES apprenant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_de_competence_competence ADD CONSTRAINT FK_ADAE76A2D0A2E50 FOREIGN KEY (groupe_de_competence_id) REFERENCES groupe_de_competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_de_competence_competence ADD CONSTRAINT FK_ADAE76A215761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_de_tag_tag ADD CONSTRAINT FK_86A22ADEF194E202 FOREIGN KEY (groupe_de_tag_id) REFERENCES groupe_de_tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_de_tag_tag ADD CONSTRAINT FK_86A22ADEBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE niveau_devaluation_competence ADD CONSTRAINT FK_B56A635947D7A72 FOREIGN KEY (niveau_devaluation_id) REFERENCES niveau_devaluation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE niveau_devaluation_competence ADD CONSTRAINT FK_B56A63515761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE promo_referentiel ADD CONSTRAINT FK_638B8B6BD0C07AFF FOREIGN KEY (promo_id) REFERENCES promo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE promo_referentiel ADD CONSTRAINT FK_638B8B6B805DB139 FOREIGN KEY (referentiel_id) REFERENCES referentiel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apprenant_competence DROP FOREIGN KEY FK_F65E1DCAC5697D6D');
        $this->addSql('ALTER TABLE groupe_apprenant DROP FOREIGN KEY FK_947F9519C5697D6D');
        $this->addSql('ALTER TABLE apprenant_competence DROP FOREIGN KEY FK_F65E1DCA15761DAB');
        $this->addSql('ALTER TABLE competence_tag DROP FOREIGN KEY FK_294CD36D15761DAB');
        $this->addSql('ALTER TABLE groupe_de_competence_competence DROP FOREIGN KEY FK_ADAE76A215761DAB');
        $this->addSql('ALTER TABLE niveau_devaluation_competence DROP FOREIGN KEY FK_B56A63515761DAB');
        $this->addSql('ALTER TABLE groupe_apprenant DROP FOREIGN KEY FK_947F95197A45358C');
        $this->addSql('ALTER TABLE groupe_de_competence_competence DROP FOREIGN KEY FK_ADAE76A2D0A2E50');
        $this->addSql('ALTER TABLE groupe_de_tag_tag DROP FOREIGN KEY FK_86A22ADEF194E202');
        $this->addSql('ALTER TABLE niveau_devaluation_competence DROP FOREIGN KEY FK_B56A635947D7A72');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649275ED078');
        $this->addSql('ALTER TABLE apprenant DROP FOREIGN KEY FK_C4EB462ECEB2FD19');
        $this->addSql('ALTER TABLE apprenant DROP FOREIGN KEY FK_C4EB462ED0C07AFF');
        $this->addSql('ALTER TABLE promo_referentiel DROP FOREIGN KEY FK_638B8B6BD0C07AFF');
        $this->addSql('ALTER TABLE promo_referentiel DROP FOREIGN KEY FK_638B8B6B805DB139');
        $this->addSql('ALTER TABLE competence_tag DROP FOREIGN KEY FK_294CD36DBAD26311');
        $this->addSql('ALTER TABLE groupe_de_tag_tag DROP FOREIGN KEY FK_86A22ADEBAD26311');
        $this->addSql('ALTER TABLE groupe DROP FOREIGN KEY FK_4B98C21155D8F51');
        $this->addSql('DROP TABLE apprenant');
        $this->addSql('DROP TABLE apprenant_competence');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE competence_tag');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE groupe_apprenant');
        $this->addSql('DROP TABLE groupe_de_competence');
        $this->addSql('DROP TABLE groupe_de_competence_competence');
        $this->addSql('DROP TABLE groupe_de_tag');
        $this->addSql('DROP TABLE groupe_de_tag_tag');
        $this->addSql('DROP TABLE niveau_devaluation');
        $this->addSql('DROP TABLE niveau_devaluation_competence');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE profil_de_sortie');
        $this->addSql('DROP TABLE promo');
        $this->addSql('DROP TABLE promo_referentiel');
        $this->addSql('DROP TABLE referentiel');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE user');
    }
}

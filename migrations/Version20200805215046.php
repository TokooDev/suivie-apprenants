<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200805215046 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE apprenant_groupe (apprenant_id INT NOT NULL, groupe_id INT NOT NULL, INDEX IDX_1D224F8DC5697D6D (apprenant_id), INDEX IDX_1D224F8D7A45358C (groupe_id), PRIMARY KEY(apprenant_id, groupe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence_groupe_competence (competence_id INT NOT NULL, groupe_competence_id INT NOT NULL, INDEX IDX_8A72A47315761DAB (competence_id), INDEX IDX_8A72A47389034830 (groupe_competence_id), PRIMARY KEY(competence_id, groupe_competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence_niveau_evaluation (competence_id INT NOT NULL, niveau_evaluation_id INT NOT NULL, INDEX IDX_E1E4DE6815761DAB (competence_id), INDEX IDX_E1E4DE6855CCA3C7 (niveau_evaluation_id), PRIMARY KEY(competence_id, niveau_evaluation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE referentiel_promo (referentiel_id INT NOT NULL, promo_id INT NOT NULL, INDEX IDX_6AA8ADB3805DB139 (referentiel_id), INDEX IDX_6AA8ADB3D0C07AFF (promo_id), PRIMARY KEY(referentiel_id, promo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE referentiel_groupe_competence (referentiel_id INT NOT NULL, groupe_competence_id INT NOT NULL, INDEX IDX_EC387D5B805DB139 (referentiel_id), INDEX IDX_EC387D5B89034830 (groupe_competence_id), PRIMARY KEY(referentiel_id, groupe_competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_groupe_tag (tag_id INT NOT NULL, groupe_tag_id INT NOT NULL, INDEX IDX_2932D77FBAD26311 (tag_id), INDEX IDX_2932D77FD1EC9F2B (groupe_tag_id), PRIMARY KEY(tag_id, groupe_tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apprenant_groupe ADD CONSTRAINT FK_1D224F8DC5697D6D FOREIGN KEY (apprenant_id) REFERENCES apprenant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apprenant_groupe ADD CONSTRAINT FK_1D224F8D7A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_groupe_competence ADD CONSTRAINT FK_8A72A47315761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_groupe_competence ADD CONSTRAINT FK_8A72A47389034830 FOREIGN KEY (groupe_competence_id) REFERENCES groupe_competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_niveau_evaluation ADD CONSTRAINT FK_E1E4DE6815761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_niveau_evaluation ADD CONSTRAINT FK_E1E4DE6855CCA3C7 FOREIGN KEY (niveau_evaluation_id) REFERENCES niveau_evaluation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE referentiel_promo ADD CONSTRAINT FK_6AA8ADB3805DB139 FOREIGN KEY (referentiel_id) REFERENCES referentiel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE referentiel_promo ADD CONSTRAINT FK_6AA8ADB3D0C07AFF FOREIGN KEY (promo_id) REFERENCES promo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE referentiel_groupe_competence ADD CONSTRAINT FK_EC387D5B805DB139 FOREIGN KEY (referentiel_id) REFERENCES referentiel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE referentiel_groupe_competence ADD CONSTRAINT FK_EC387D5B89034830 FOREIGN KEY (groupe_competence_id) REFERENCES groupe_competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_groupe_tag ADD CONSTRAINT FK_2932D77FBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_groupe_tag ADD CONSTRAINT FK_2932D77FD1EC9F2B FOREIGN KEY (groupe_tag_id) REFERENCES groupe_tag (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE apprenant_competence');
        $this->addSql('DROP TABLE cm');
        $this->addSql('DROP TABLE competence_tag');
        $this->addSql('ALTER TABLE apprenant ADD profil_de_sortie_id INT DEFAULT NULL, ADD promo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE apprenant ADD CONSTRAINT FK_C4EB462E65E0C4D3 FOREIGN KEY (profil_de_sortie_id) REFERENCES profil_de_sortie (id)');
        $this->addSql('ALTER TABLE apprenant ADD CONSTRAINT FK_C4EB462ED0C07AFF FOREIGN KEY (promo_id) REFERENCES promo (id)');
        $this->addSql('CREATE INDEX IDX_C4EB462E65E0C4D3 ON apprenant (profil_de_sortie_id)');
        $this->addSql('CREATE INDEX IDX_C4EB462ED0C07AFF ON apprenant (promo_id)');
        $this->addSql('ALTER TABLE groupe ADD formateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE groupe ADD CONSTRAINT FK_4B98C21155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id)');
        $this->addSql('CREATE INDEX IDX_4B98C21155D8F51 ON groupe (formateur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE apprenant_competence (apprenant_id INT NOT NULL, competence_id INT NOT NULL, INDEX IDX_F65E1DCA15761DAB (competence_id), INDEX IDX_F65E1DCAC5697D6D (apprenant_id), PRIMARY KEY(apprenant_id, competence_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cm (id INT AUTO_INCREMENT NOT NULL, comunity_manager VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE competence_tag (competence_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_294CD36DBAD26311 (tag_id), INDEX IDX_294CD36D15761DAB (competence_id), PRIMARY KEY(competence_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE apprenant_competence ADD CONSTRAINT FK_F65E1DCA15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apprenant_competence ADD CONSTRAINT FK_F65E1DCAC5697D6D FOREIGN KEY (apprenant_id) REFERENCES apprenant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_tag ADD CONSTRAINT FK_294CD36D15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_tag ADD CONSTRAINT FK_294CD36DBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE apprenant_groupe');
        $this->addSql('DROP TABLE competence_groupe_competence');
        $this->addSql('DROP TABLE competence_niveau_evaluation');
        $this->addSql('DROP TABLE referentiel_promo');
        $this->addSql('DROP TABLE referentiel_groupe_competence');
        $this->addSql('DROP TABLE tag_groupe_tag');
        $this->addSql('ALTER TABLE apprenant DROP FOREIGN KEY FK_C4EB462E65E0C4D3');
        $this->addSql('ALTER TABLE apprenant DROP FOREIGN KEY FK_C4EB462ED0C07AFF');
        $this->addSql('DROP INDEX IDX_C4EB462E65E0C4D3 ON apprenant');
        $this->addSql('DROP INDEX IDX_C4EB462ED0C07AFF ON apprenant');
        $this->addSql('ALTER TABLE apprenant DROP profil_de_sortie_id, DROP promo_id');
        $this->addSql('ALTER TABLE groupe DROP FOREIGN KEY FK_4B98C21155D8F51');
        $this->addSql('DROP INDEX IDX_4B98C21155D8F51 ON groupe');
        $this->addSql('ALTER TABLE groupe DROP formateur_id');
    }
}

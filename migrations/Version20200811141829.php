<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200811141829 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competence_groupe_competence DROP FOREIGN KEY FK_8A72A47389034830');
        $this->addSql('ALTER TABLE referentiel_groupe_competence DROP FOREIGN KEY FK_EC387D5B89034830');
        $this->addSql('CREATE TABLE competence_groupe_de_competence (competence_id INT NOT NULL, groupe_de_competence_id INT NOT NULL, INDEX IDX_BC37A35C15761DAB (competence_id), INDEX IDX_BC37A35CD0A2E50 (groupe_de_competence_id), PRIMARY KEY(competence_id, groupe_de_competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_de_competence (id INT AUTO_INCREMENT NOT NULL, libele VARCHAR(255) DEFAULT NULL, descriptif VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE referentiel_groupe_de_competence (referentiel_id INT NOT NULL, groupe_de_competence_id INT NOT NULL, INDEX IDX_4C9A62BA805DB139 (referentiel_id), INDEX IDX_4C9A62BAD0A2E50 (groupe_de_competence_id), PRIMARY KEY(referentiel_id, groupe_de_competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competence_groupe_de_competence ADD CONSTRAINT FK_BC37A35C15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_groupe_de_competence ADD CONSTRAINT FK_BC37A35CD0A2E50 FOREIGN KEY (groupe_de_competence_id) REFERENCES groupe_de_competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE referentiel_groupe_de_competence ADD CONSTRAINT FK_4C9A62BA805DB139 FOREIGN KEY (referentiel_id) REFERENCES referentiel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE referentiel_groupe_de_competence ADD CONSTRAINT FK_4C9A62BAD0A2E50 FOREIGN KEY (groupe_de_competence_id) REFERENCES groupe_de_competence (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE competence_groupe_competence');
        $this->addSql('DROP TABLE groupe_competence');
        $this->addSql('DROP TABLE referentiel_groupe_competence');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competence_groupe_de_competence DROP FOREIGN KEY FK_BC37A35CD0A2E50');
        $this->addSql('ALTER TABLE referentiel_groupe_de_competence DROP FOREIGN KEY FK_4C9A62BAD0A2E50');
        $this->addSql('CREATE TABLE competence_groupe_competence (competence_id INT NOT NULL, groupe_competence_id INT NOT NULL, INDEX IDX_8A72A47389034830 (groupe_competence_id), INDEX IDX_8A72A47315761DAB (competence_id), PRIMARY KEY(competence_id, groupe_competence_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE groupe_competence (id INT AUTO_INCREMENT NOT NULL, libele VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, descriptif VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE referentiel_groupe_competence (referentiel_id INT NOT NULL, groupe_competence_id INT NOT NULL, INDEX IDX_EC387D5B89034830 (groupe_competence_id), INDEX IDX_EC387D5B805DB139 (referentiel_id), PRIMARY KEY(referentiel_id, groupe_competence_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE competence_groupe_competence ADD CONSTRAINT FK_8A72A47315761DAB FOREIGN KEY (competence_id) REFERENCES competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competence_groupe_competence ADD CONSTRAINT FK_8A72A47389034830 FOREIGN KEY (groupe_competence_id) REFERENCES groupe_competence (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE referentiel_groupe_competence ADD CONSTRAINT FK_EC387D5B805DB139 FOREIGN KEY (referentiel_id) REFERENCES referentiel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE referentiel_groupe_competence ADD CONSTRAINT FK_EC387D5B89034830 FOREIGN KEY (groupe_competence_id) REFERENCES groupe_competence (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE competence_groupe_de_competence');
        $this->addSql('DROP TABLE groupe_de_competence');
        $this->addSql('DROP TABLE referentiel_groupe_de_competence');
    }
}

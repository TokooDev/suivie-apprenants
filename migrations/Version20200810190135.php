<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200810190135 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE referentiel_groupe_de_competence (referentiel_id INT NOT NULL, groupe_de_competence_id INT NOT NULL, INDEX IDX_4C9A62BA805DB139 (referentiel_id), INDEX IDX_4C9A62BAD0A2E50 (groupe_de_competence_id), PRIMARY KEY(referentiel_id, groupe_de_competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE referentiel_groupe_de_competence ADD CONSTRAINT FK_4C9A62BA805DB139 FOREIGN KEY (referentiel_id) REFERENCES referentiel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE referentiel_groupe_de_competence ADD CONSTRAINT FK_4C9A62BAD0A2E50 FOREIGN KEY (groupe_de_competence_id) REFERENCES groupe_de_competence (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE referentiel_groupe_de_competence');
    }
}

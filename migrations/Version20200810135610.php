<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200810135610 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apprenant DROP FOREIGN KEY FK_C4EB462E65E0C4D3');
        $this->addSql('DROP INDEX IDX_C4EB462E65E0C4D3 ON apprenant');
        $this->addSql('ALTER TABLE apprenant ADD profildesortie_id INT NOT NULL, DROP profil_de_sortie_id');
        $this->addSql('ALTER TABLE apprenant ADD CONSTRAINT FK_C4EB462ECEB2FD19 FOREIGN KEY (profildesortie_id) REFERENCES profil_de_sortie (id)');
        $this->addSql('CREATE INDEX IDX_C4EB462ECEB2FD19 ON apprenant (profildesortie_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apprenant DROP FOREIGN KEY FK_C4EB462ECEB2FD19');
        $this->addSql('DROP INDEX IDX_C4EB462ECEB2FD19 ON apprenant');
        $this->addSql('ALTER TABLE apprenant ADD profil_de_sortie_id INT DEFAULT NULL, DROP profildesortie_id');
        $this->addSql('ALTER TABLE apprenant ADD CONSTRAINT FK_C4EB462E65E0C4D3 FOREIGN KEY (profil_de_sortie_id) REFERENCES profil_de_sortie (id)');
        $this->addSql('CREATE INDEX IDX_C4EB462E65E0C4D3 ON apprenant (profil_de_sortie_id)');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220514191522 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E35DAC5993');
        $this->addSql('DROP INDEX IDX_717E22E35DAC5993 ON etudiant');
        $this->addSql('ALTER TABLE etudiant CHANGE inscription_id section_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('CREATE INDEX IDX_717E22E3D823E37A ON etudiant (section_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3D823E37A');
        $this->addSql('DROP INDEX IDX_717E22E3D823E37A ON etudiant');
        $this->addSql('ALTER TABLE etudiant CHANGE section_id inscription_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E35DAC5993 FOREIGN KEY (inscription_id) REFERENCES section (id)');
        $this->addSql('CREATE INDEX IDX_717E22E35DAC5993 ON etudiant (inscription_id)');
    }
}

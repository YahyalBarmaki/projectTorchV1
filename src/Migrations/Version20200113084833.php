<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200113084833 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE critere ADD fo_critere_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE critere ADD CONSTRAINT FK_7F6A80536D37B447 FOREIGN KEY (fo_critere_id) REFERENCES domaine (id)');
        $this->addSql('CREATE INDEX IDX_7F6A80536D37B447 ON critere (fo_critere_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE critere DROP FOREIGN KEY FK_7F6A80536D37B447');
        $this->addSql('DROP INDEX IDX_7F6A80536D37B447 ON critere');
        $this->addSql('ALTER TABLE critere DROP fo_critere_id');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190326165857 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE nanny (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, postal VARCHAR(5) DEFAULT NULL, city VARCHAR(255) NOT NULL, phone VARCHAR(10) DEFAULT NULL, diploma VARCHAR(255) DEFAULT NULL, description LONGTEXT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE child ADD nanny_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE child ADD CONSTRAINT FK_22B3542916497E83 FOREIGN KEY (nanny_id) REFERENCES nanny (id)');
        $this->addSql('CREATE INDEX IDX_22B3542916497E83 ON child (nanny_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE child DROP FOREIGN KEY FK_22B3542916497E83');
        $this->addSql('DROP TABLE nanny');
        $this->addSql('DROP INDEX IDX_22B3542916497E83 ON child');
        $this->addSql('ALTER TABLE child DROP nanny_id');
    }
}

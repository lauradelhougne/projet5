<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190326171304 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE request (id INT AUTO_INCREMENT NOT NULL, nanny_id INT DEFAULT NULL, datetime DATETIME NOT NULL, child_last_name VARCHAR(255) NOT NULL, child_first_name VARCHAR(255) NOT NULL, date_birth DATETIME NOT NULL, start_date DATETIME NOT NULL, days_childcare VARCHAR(255) NOT NULL, parent_last_name VARCHAR(255) NOT NULL, parent_first_name VARCHAR(255) NOT NULL, relation VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(10) NOT NULL, message LONGTEXT NOT NULL, INDEX IDX_3B978F9F16497E83 (nanny_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE request ADD CONSTRAINT FK_3B978F9F16497E83 FOREIGN KEY (nanny_id) REFERENCES nanny (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE request');
    }
}

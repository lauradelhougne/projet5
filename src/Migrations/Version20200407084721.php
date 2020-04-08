<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200407084721 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, child_id INT DEFAULT NULL, datetime DATETIME NOT NULL, meal LONGTEXT NOT NULL, sleep LONGTEXT NOT NULL, layers LONGTEXT NOT NULL, health LONGTEXT NOT NULL, activity LONGTEXT NOT NULL, notes LONGTEXT NOT NULL, INDEX IDX_23A0E66DD62C21B (child_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE child (id INT AUTO_INCREMENT NOT NULL, parents_id INT NOT NULL, nanny_id INT DEFAULT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, birth_date DATETIME NOT NULL, birth_place VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, postal VARCHAR(5) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, parent1last_name VARCHAR(255) DEFAULT NULL, parent1first_name VARCHAR(255) DEFAULT NULL, parent1family_situation VARCHAR(255) DEFAULT NULL, parent1address VARCHAR(255) DEFAULT NULL, parent1postal VARCHAR(5) DEFAULT NULL, parent1city VARCHAR(255) DEFAULT NULL, parent1phone VARCHAR(10) DEFAULT NULL, parent1profession VARCHAR(255) DEFAULT NULL, parent2last_name VARCHAR(255) DEFAULT NULL, parent2first_name VARCHAR(255) DEFAULT NULL, parent2family_situation VARCHAR(255) DEFAULT NULL, parent2address VARCHAR(255) DEFAULT NULL, parent2postal VARCHAR(5) DEFAULT NULL, parent2city VARCHAR(255) DEFAULT NULL, parent2phone VARCHAR(10) DEFAULT NULL, parent2profession VARCHAR(255) DEFAULT NULL, person1last_name VARCHAR(255) DEFAULT NULL, person1first_name VARCHAR(255) DEFAULT NULL, person1relation VARCHAR(255) DEFAULT NULL, person1phone VARCHAR(10) DEFAULT NULL, person1address VARCHAR(255) DEFAULT NULL, person2last_name VARCHAR(255) DEFAULT NULL, person2first_name VARCHAR(255) DEFAULT NULL, person2relation VARCHAR(255) DEFAULT NULL, person2phone VARCHAR(10) DEFAULT NULL, person2address VARCHAR(255) DEFAULT NULL, doctor_name VARCHAR(255) DEFAULT NULL, doctor_address VARCHAR(255) DEFAULT NULL, doctor_phone VARCHAR(10) DEFAULT NULL, food_allergy TINYINT(1) DEFAULT NULL, drug_allergy TINYINT(1) DEFAULT NULL, asthme TINYINT(1) DEFAULT NULL, notes_allergy LONGTEXT DEFAULT NULL, INDEX IDX_22B35429B706B6D3 (parents_id), INDEX IDX_22B3542916497E83 (nanny_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nanny (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, postal VARCHAR(5) DEFAULT NULL, city VARCHAR(255) NOT NULL, phone VARCHAR(10) DEFAULT NULL, diploma VARCHAR(255) DEFAULT NULL, description LONGTEXT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F354C7CCE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parents (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, relation VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(10) NOT NULL, password VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE request_nanny (id INT AUTO_INCREMENT NOT NULL, nanny_id INT DEFAULT NULL, child_last_name VARCHAR(255) NOT NULL, child_first_name VARCHAR(255) NOT NULL, date_birth DATETIME NOT NULL, start_date DATETIME NOT NULL, days_childcare TINYTEXT NOT NULL COMMENT \'(DC2Type:array)\', parent_last_name VARCHAR(255) NOT NULL, parent_first_name VARCHAR(255) NOT NULL, relation VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(10) NOT NULL, message LONGTEXT NOT NULL, INDEX IDX_AE437BE916497E83 (nanny_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66DD62C21B FOREIGN KEY (child_id) REFERENCES child (id)');
        $this->addSql('ALTER TABLE child ADD CONSTRAINT FK_22B35429B706B6D3 FOREIGN KEY (parents_id) REFERENCES parents (id)');
        $this->addSql('ALTER TABLE child ADD CONSTRAINT FK_22B3542916497E83 FOREIGN KEY (nanny_id) REFERENCES nanny (id)');
        $this->addSql('ALTER TABLE request_nanny ADD CONSTRAINT FK_AE437BE916497E83 FOREIGN KEY (nanny_id) REFERENCES nanny (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66DD62C21B');
        $this->addSql('ALTER TABLE child DROP FOREIGN KEY FK_22B3542916497E83');
        $this->addSql('ALTER TABLE request_nanny DROP FOREIGN KEY FK_AE437BE916497E83');
        $this->addSql('ALTER TABLE child DROP FOREIGN KEY FK_22B35429B706B6D3');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE child');
        $this->addSql('DROP TABLE nanny');
        $this->addSql('DROP TABLE parents');
        $this->addSql('DROP TABLE request_nanny');
    }
}

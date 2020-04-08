<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200408082533 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, nanny_id INT NOT NULL, child_id INT NOT NULL, datetime DATETIME NOT NULL, meal LONGTEXT NOT NULL, sleep LONGTEXT NOT NULL, layers LONGTEXT NOT NULL, health LONGTEXT NOT NULL, activity LONGTEXT NOT NULL, notes LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE child (id INT AUTO_INCREMENT NOT NULL, parents_id INT NOT NULL, nanny_id INT NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, birth_date DATETIME NOT NULL, birth_place VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, postal VARCHAR(5) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, parent1last_name VARCHAR(255) DEFAULT NULL, parent1first_name VARCHAR(255) DEFAULT NULL, parent1family_situation VARCHAR(255) DEFAULT NULL, parent1address VARCHAR(255) DEFAULT NULL, parent1postal VARCHAR(5) DEFAULT NULL, parent1city VARCHAR(255) DEFAULT NULL, parent1phone VARCHAR(10) DEFAULT NULL, parent1profession VARCHAR(255) DEFAULT NULL, parent2last_name VARCHAR(255) DEFAULT NULL, parent2first_name VARCHAR(255) DEFAULT NULL, parent2family_situation VARCHAR(255) DEFAULT NULL, parent2address VARCHAR(255) DEFAULT NULL, parent2postal VARCHAR(5) DEFAULT NULL, parent2city VARCHAR(255) DEFAULT NULL, parent2phone VARCHAR(10) DEFAULT NULL, parent2profession VARCHAR(255) DEFAULT NULL, person1last_name VARCHAR(255) DEFAULT NULL, person1first_name VARCHAR(255) DEFAULT NULL, person1relation VARCHAR(255) DEFAULT NULL, person1phone VARCHAR(10) DEFAULT NULL, person1address VARCHAR(255) DEFAULT NULL, person2last_name VARCHAR(255) DEFAULT NULL, person2first_name VARCHAR(255) DEFAULT NULL, person2relation VARCHAR(255) DEFAULT NULL, person2phone VARCHAR(10) DEFAULT NULL, person2address VARCHAR(255) DEFAULT NULL, doctor_name VARCHAR(255) DEFAULT NULL, doctor_address VARCHAR(255) DEFAULT NULL, doctor_phone VARCHAR(10) DEFAULT NULL, food_allergy TINYINT(1) DEFAULT NULL, drug_allergy TINYINT(1) DEFAULT NULL, asthme TINYINT(1) DEFAULT NULL, notes_allergy LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nanny (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, address VARCHAR(255) DEFAULT NULL, postal VARCHAR(5) DEFAULT NULL, city VARCHAR(255) NOT NULL, phone VARCHAR(10) DEFAULT NULL, diploma VARCHAR(255) DEFAULT NULL, description LONGTEXT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F354C7CCE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parents (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, relation VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(10) NOT NULL, password VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE request_nanny (id INT AUTO_INCREMENT NOT NULL, nanny_id INT NOT NULL, datetime DATETIME NOT NULL, child_last_name VARCHAR(255) NOT NULL, child_first_name VARCHAR(255) NOT NULL, date_birth DATETIME NOT NULL, start_date DATETIME NOT NULL, days_childcare TINYTEXT NOT NULL COMMENT \'(DC2Type:array)\', parent_last_name VARCHAR(255) NOT NULL, parent_first_name VARCHAR(255) NOT NULL, relation VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(10) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE child');
        $this->addSql('DROP TABLE nanny');
        $this->addSql('DROP TABLE parents');
        $this->addSql('DROP TABLE request_nanny');
    }
}

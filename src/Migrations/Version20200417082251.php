<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200417082251 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66DD62C21B');
        $this->addSql('DROP INDEX IDX_23A0E66DD62C21B ON article');
        $this->addSql('ALTER TABLE article ADD nanny_id INT NOT NULL, CHANGE child_id child_id INT NOT NULL');
        $this->addSql('ALTER TABLE child DROP FOREIGN KEY FK_22B3542916497E83');
        $this->addSql('ALTER TABLE child DROP FOREIGN KEY FK_22B35429B706B6D3');
        $this->addSql('DROP INDEX IDX_22B3542916497E83 ON child');
        $this->addSql('DROP INDEX IDX_22B35429B706B6D3 ON child');
        $this->addSql('ALTER TABLE child ADD days_childcare TINYTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD parent1email VARCHAR(10) DEFAULT NULL, ADD parent2email VARCHAR(10) DEFAULT NULL, CHANGE nanny_id nanny_id INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F354C7CCE7927C74 ON nanny (email)');
        $this->addSql('ALTER TABLE request_nanny DROP FOREIGN KEY FK_3B978F9F16497E83');
        $this->addSql('DROP INDEX IDX_3B978F9F16497E83 ON request_nanny');
        $this->addSql('ALTER TABLE request_nanny CHANGE nanny_id nanny_id INT NOT NULL, CHANGE days_childcare days_childcare TINYTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article DROP nanny_id, CHANGE child_id child_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66DD62C21B FOREIGN KEY (child_id) REFERENCES child (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66DD62C21B ON article (child_id)');
        $this->addSql('ALTER TABLE child DROP days_childcare, DROP parent1email, DROP parent2email, CHANGE nanny_id nanny_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE child ADD CONSTRAINT FK_22B3542916497E83 FOREIGN KEY (nanny_id) REFERENCES nanny (id)');
        $this->addSql('ALTER TABLE child ADD CONSTRAINT FK_22B35429B706B6D3 FOREIGN KEY (parents_id) REFERENCES parents (id)');
        $this->addSql('CREATE INDEX IDX_22B3542916497E83 ON child (nanny_id)');
        $this->addSql('CREATE INDEX IDX_22B35429B706B6D3 ON child (parents_id)');
        $this->addSql('DROP INDEX UNIQ_F354C7CCE7927C74 ON nanny');
        $this->addSql('ALTER TABLE request_nanny CHANGE nanny_id nanny_id INT DEFAULT NULL, CHANGE days_childcare days_childcare VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE request_nanny ADD CONSTRAINT FK_3B978F9F16497E83 FOREIGN KEY (nanny_id) REFERENCES nanny (id)');
        $this->addSql('CREATE INDEX IDX_3B978F9F16497E83 ON request_nanny (nanny_id)');
    }
}

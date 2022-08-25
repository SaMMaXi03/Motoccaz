<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220822083635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE model_yamaha (id INT AUTO_INCREMENT NOT NULL, model VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moto_brand (id INT AUTO_INCREMENT NOT NULL, fk_model_id INT NOT NULL, brand VARCHAR(255) NOT NULL, INDEX IDX_3605BEC24B5DF439 (fk_model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE moto_brand ADD CONSTRAINT FK_3605BEC24B5DF439 FOREIGN KEY (fk_model_id) REFERENCES model_yamaha (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE moto_brand DROP FOREIGN KEY FK_3605BEC24B5DF439');
        $this->addSql('DROP TABLE model_yamaha');
        $this->addSql('DROP TABLE moto_brand');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220822093732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE moto_brand DROP FOREIGN KEY moto_brand_ibfk_1');
        $this->addSql('ALTER TABLE moto_brand DROP FOREIGN KEY FK_3605BEC24B5DF439');
        $this->addSql('DROP TABLE model_bmw');
        $this->addSql('DROP TABLE model_harley_davidson');
        $this->addSql('DROP TABLE model_suzuki');
        $this->addSql('DROP TABLE model_yamaha');
        $this->addSql('DROP TABLE moto_brand');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE model_bmw (id INT AUTO_INCREMENT NOT NULL, model VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE model_harley_davidson (id INT AUTO_INCREMENT NOT NULL, model VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE model_suzuki (id INT AUTO_INCREMENT NOT NULL, model VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX id (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE model_yamaha (id INT AUTO_INCREMENT NOT NULL, model VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE moto_brand (id INT AUTO_INCREMENT NOT NULL, fk_model_id INT NOT NULL, brand VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_3605BEC24B5DF439 (fk_model_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE moto_brand ADD CONSTRAINT FK_3605BEC24B5DF439 FOREIGN KEY (fk_model_id) REFERENCES model_yamaha (id)');
        $this->addSql('ALTER TABLE moto_brand ADD CONSTRAINT moto_brand_ibfk_1 FOREIGN KEY (fk_model_id) REFERENCES model_bmw (id)');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220104140449 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campus (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE campus_curriculum (campus_id INT NOT NULL, curriculum_id INT NOT NULL, INDEX IDX_ADC71F4FAF5D55E1 (campus_id), INDEX IDX_ADC71F4F5AEA4428 (curriculum_id), PRIMARY KEY(campus_id, curriculum_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE curriculum (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE instructor (id INT AUTO_INCREMENT NOT NULL, campus_id INT DEFAULT NULL, curriculum_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, INDEX IDX_31FC43DDAF5D55E1 (campus_id), INDEX IDX_31FC43DD5AEA4428 (curriculum_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, campus_id INT DEFAULT NULL, curriculum_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, INDEX IDX_B723AF33AF5D55E1 (campus_id), INDEX IDX_B723AF335AEA4428 (curriculum_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE campus_curriculum ADD CONSTRAINT FK_ADC71F4FAF5D55E1 FOREIGN KEY (campus_id) REFERENCES campus (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE campus_curriculum ADD CONSTRAINT FK_ADC71F4F5AEA4428 FOREIGN KEY (curriculum_id) REFERENCES curriculum (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE instructor ADD CONSTRAINT FK_31FC43DDAF5D55E1 FOREIGN KEY (campus_id) REFERENCES campus (id)');
        $this->addSql('ALTER TABLE instructor ADD CONSTRAINT FK_31FC43DD5AEA4428 FOREIGN KEY (curriculum_id) REFERENCES curriculum (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33AF5D55E1 FOREIGN KEY (campus_id) REFERENCES campus (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF335AEA4428 FOREIGN KEY (curriculum_id) REFERENCES curriculum (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE campus_curriculum DROP FOREIGN KEY FK_ADC71F4FAF5D55E1');
        $this->addSql('ALTER TABLE instructor DROP FOREIGN KEY FK_31FC43DDAF5D55E1');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33AF5D55E1');
        $this->addSql('ALTER TABLE campus_curriculum DROP FOREIGN KEY FK_ADC71F4F5AEA4428');
        $this->addSql('ALTER TABLE instructor DROP FOREIGN KEY FK_31FC43DD5AEA4428');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF335AEA4428');
        $this->addSql('DROP TABLE campus');
        $this->addSql('DROP TABLE campus_curriculum');
        $this->addSql('DROP TABLE curriculum');
        $this->addSql('DROP TABLE instructor');
        $this->addSql('DROP TABLE student');
    }
}

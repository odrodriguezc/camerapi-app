<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200816141435 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photo_entity (id INT AUTO_INCREMENT NOT NULL, file_name VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, label VARCHAR(255) NOT NULL, extention VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, exposure VARCHAR(255) NOT NULL, awb VARCHAR(255) NOT NULL, resolution_x INT NOT NULL, resolution_y INT NOT NULL, brightness INT NOT NULL, contrast INT NOT NULL, size INT NOT NULL, effect VARCHAR(255) NOT NULL, text VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE photo_entity');
    }
}

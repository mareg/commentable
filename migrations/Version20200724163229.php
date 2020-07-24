<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200724163229 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Create videos table';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('
            CREATE TABLE videos (
                uuid VARCHAR(36) NOT NULL,
                title VARCHAR(255) NOT NULL,
                video_url LONGTEXT NOT NULL,
                created_at DATETIME NOT NULL,
                updated_at DATETIME NOT NULL,
                INDEX created_at_idx (created_at),
                INDEX updated_at_idx (updated_at),
                PRIMARY KEY(uuid)
            )
            DEFAULT
                CHARACTER SET utf8mb4
                COLLATE `utf8mb4_unicode_ci`
                ENGINE = InnoDB
        ');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('
            DROP TABLE videos
        ');
    }
}

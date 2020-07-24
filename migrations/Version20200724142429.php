<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200724142429 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Create comments table';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('
            CREATE TABLE comments (
                uuid VARCHAR(36) NOT NULL,
                comment LONGTEXT NOT NULL,
                author VARCHAR(255) NOT NULL,
                created_at DATETIME NOT NULL,
                parent_uuid VARCHAR(36) NOT NULL,
                parent_commentable VARCHAR(255) NOT NULL,
                INDEX parent_idx (parent_uuid, parent_commentable),
                INDEX created_at_idx (created_at),
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
            DROP TABLE comments
        ');
    }
}

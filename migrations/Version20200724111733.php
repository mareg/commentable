<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200724111733 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Create posts table';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('
            CREATE TABLE posts (
                uuid VARCHAR(36) NOT NULL,
                subject VARCHAR(255) NOT NULL,
                body LONGTEXT NOT NULL,
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
            DROP TABLE posts
        ');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240117000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create uuids table for Pimcore UUID bundle';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE IF NOT EXISTS uuids (
            uuid BINARY(16) NOT NULL,
            itemId int(11) NOT NULL,
            type VARCHAR(25) NOT NULL,
            instanceIdentifier VARCHAR(50) NOT NULL,
            PRIMARY KEY (uuid),
            UNIQUE KEY `UNIQ_ITEM_ID_TYPE_INSTANCE` (itemId,type,instanceIdentifier)
        ) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE IF EXISTS uuids');
    }
}
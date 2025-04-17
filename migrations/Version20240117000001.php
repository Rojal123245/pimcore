<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240117000001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create required Pimcore base tables';
    }

    public function up(Schema $schema): void
    {
        // Create uuids table first
        $this->addSql('CREATE TABLE IF NOT EXISTS uuids (
            uuid BINARY(16) NOT NULL,
            itemId int(11) NOT NULL,
            type VARCHAR(25) NOT NULL,
            instanceIdentifier VARCHAR(50) NOT NULL,
            PRIMARY KEY (uuid),
            UNIQUE KEY `UNIQ_ITEM_ID_TYPE_INSTANCE` (itemId,type,instanceIdentifier)
        ) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

        // Then create settings_store table
        $this->addSql('CREATE TABLE IF NOT EXISTS settings_store (
            id VARCHAR(190) NOT NULL,
            scope VARCHAR(190) NOT NULL,
            data LONGBLOB NULL,
            type VARCHAR(190) NULL,
            PRIMARY KEY (id, scope),
            INDEX scope (scope)
        ) DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE IF EXISTS settings_store');
        $this->addSql('DROP TABLE IF EXISTS uuids');
    }
}

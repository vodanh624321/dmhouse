<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170729223925 extends AbstractMigration
{

    /**
     * @var string table name
     */
    const TABLE = 'dtb_product_price';

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        if ($schema->hasTable(self::TABLE)) {
            $schema->dropTable(self::TABLE);
        }
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}

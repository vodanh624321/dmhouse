<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\ORM\Tools\SchemaTool;
use Eccube\Application;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170802223925 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->getTable('dtb_customer');
        if (!$table->hasColumn('company_name_kana')) {
            $table->addColumn('company_name_kana', 'text', array('NotNull' => false));
        }
        if (!$table->hasColumn('full_tel')) {
            $table->addColumn('full_tel', 'text', array('NotNull' => true));
        }
        if (!$table->hasColumn('full_mobile')) {
            $table->addColumn('full_mobile', 'text', array('NotNull' => false));
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

# migrationファイルが一つもないとこけるのでダミーファイル

<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\ORM\Tools\SchemaTool;
use Eccube\Application;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170728223925 extends AbstractMigration
{

    /**
     * @var string table name
     */
    const TABLE = 'dtb_product_price';


    /**
     * @var array plugin entity
     */
    protected $entities = array(
        'Eccube\Entity\ProductPrice',
    );

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        if ($schema->hasTable(self::TABLE)) {
            return true;
        }
        $app = Application::getInstance();
        $em = $app['orm.em'];
        $entityName = $this->entities;
        $firstEntityName = array_shift($entityName);
        $classes = array(
            $em->getClassMetadata($firstEntityName),
        );
        $tool = new SchemaTool($em);
        $tool->createSchema($classes);
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

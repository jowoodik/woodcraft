<?php

use yii\db\Migration;

class m170216_160859_alter_table_entity_catalog_categories extends Migration
{
    public function safeUp()
    {
        $this->addColumn('entity_catalog_categories', 'price', 'string DEFAULT NULL');
    }

    public function safeDown()
    {
        $this->dropColumn('entity_catalog_categories', 'price');

        return false;
    }
}

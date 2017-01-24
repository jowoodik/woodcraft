<?php

use yii\db\Migration;

class m160504_000018_entity_catalog_wood extends Migration
{
    public function up()
    {
        $this->createTable('entity_catalog_wood', [
            'id' => $this->primaryKey(),
            'route_id' => $this->integer(),
            'name' => $this->string(),

        ]);
        $this->addForeignKey('fk_catalog_wood_id', 'entity_catalog_wood', 'route_id', 'route', 'id',
            'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('entity_catalog_wood');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

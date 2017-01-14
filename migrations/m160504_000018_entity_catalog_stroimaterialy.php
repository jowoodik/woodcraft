<?php

use yii\db\Migration;

class m160504_000018_entity_catalog_stroimaterialy extends Migration
{
    public function up()
    {
        $this->createTable('entity_catalog_stroimaterialy', [
            'id' => $this->primaryKey(),
            'route_id' => $this->integer(),
            'name' => $this->string(),

        ]);
        $this->addForeignKey('fk_catalog_stroimaterialy_id', 'entity_catalog_stroimaterialy', 'route_id', 'route', 'id',
            'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('entity_catalog_stroimaterialy');
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

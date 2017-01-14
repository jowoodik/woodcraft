<?php

use yii\db\Migration;

class m160504_000013_create_entity_catalog extends Migration
{
    public function up()
    {
        $this->createTable('entity_catalog', [
            'id' => $this->primaryKey(),
            'route_id' => $this->integer(),
            'name' => $this->string(),

        ]);
        $this->addForeignKey('catalog_route_id_id_fk', 'entity_catalog', 'route_id', 'route', 'id',
            'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('entity_catalog');
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

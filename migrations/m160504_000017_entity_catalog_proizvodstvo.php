<?php

use yii\db\Migration;

class m160504_000017_entity_catalog_proizvodstvo extends Migration
{
    public function up()
    {
        $this->createTable('entity_catalog_proizvodstvo', [
            'id' => $this->primaryKey(),
            'route_id' => $this->integer(),
            'name' => $this->string(),

        ]);
        $this->addForeignKey('fk_catalog_route_id', 'entity_catalog_proizvodstvo', 'route_id', 'route', 'id',
            'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('entity_catalog_proizvodstvo');
    }
}

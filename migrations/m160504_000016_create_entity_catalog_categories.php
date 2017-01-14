<?php

use yii\db\Migration;

class m160504_000016_create_entity_catalog_categories extends Migration
{
    public function up()
    {
        $this->createTable('entity_catalog_categories', [
            'id' => $this->primaryKey(),
            'route_id' => $this->integer(),
            'text' => $this->text(),
            'image' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'is_show' => $this->boolean(),
            'is_sidebar' => $this->boolean()
        ]);
        $this->addForeignKey('pages_route_id_id_fk', 'entity_catalog_categories', 'route_id', 'route', 'id',
            'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('entity_catalog_categories');
        $this->dropForeignKey('pages_route_id_id_fk', 'entity_catalog_categories');
    }
}

<?php

use yii\db\Migration;

class m160504_000008_create_gallery extends Migration
{
    public function up()
    {
        $this->createTable('entity_gallery', [
            'id' => $this->primaryKey(),
            'route_id' => $this->integer(),
            'image' => $this->string(),
            'description' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        $this->addForeignKey('gallery_route_id_id_fk', 'entity_gallery', 'route_id', 'route', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('entity_gallery');
    }
}

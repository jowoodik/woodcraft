<?php

use yii\db\Migration;

class m160504_000009_create_gallery_item extends Migration
{
    public function up()
    {
        $this->createTable('gallery_item', [
            'id' => $this->primaryKey(),
            'gallery_id' => $this->integer(),
            'name' => $this->string(),
            'image' => $this->string(),
            'is_active' => $this->boolean(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        $this->addForeignKey('gallery_item_gallery_id_id_fk', 'gallery_item', 'gallery_id', 'entity_gallery', 'id',
            'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('gallery_item');
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

<?php

use yii\db\Migration;

class m160504_000019_entity_services extends Migration
{
    public static $table = 'services';

    public function up()
    {
        $this->createTable('entity_services', [
            'id' => $this->primaryKey(),
            'route_id' => $this->integer(),
            'image' => $this->string(),
            'description' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        $this->addForeignKey('entity_services_id_id_fk', 'entity_services', 'route_id', 'route', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('entity_services');
    }
}

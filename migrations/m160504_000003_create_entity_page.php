<?php

use yii\db\Migration;

class m160504_000003_create_entity_page extends Migration
{
    public static $table = 'entity_page';

    public function safeUp()
    {
        $this->createTable(self::$table, [
            'id' => $this->primaryKey(),
            'route_id' => $this->integer(),
            'text' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey(self::$table . '_route_id_fk', self::$table, 'route_id',
            'route', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable(self::$table);
    }
}

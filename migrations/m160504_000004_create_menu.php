<?php

use yii\db\Migration;

class m160504_000004_create_menu extends Migration
{
    public static $table = 'menu';

    public function safeUp()
    {
        $this->createTable(self::$table, [
            'id' => $this->primaryKey(),
            'route_id'=>$this->integer(),
            'name'=>$this->string(),
            'position'=>$this->string(),
            'sort'=>$this->integer(),
            'is_active'=>$this->boolean(),
        ]);

        $this->addForeignKey(self::$table . '_route_id_fk', self::$table, 'route_id',
            'route', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable(self::$table);
    }
}

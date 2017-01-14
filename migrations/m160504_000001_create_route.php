<?php

use yii\db\Migration;

class m160504_000001_create_route extends Migration
{
    public static $table = 'route';

    public function safeUp()
    {
        $this->createTable(self::$table, [
            'id' => $this->primaryKey(),
            'title' => $this->string()->comment('Заголовок'),
            'alias' => $this->string(),
            'parent_id' => $this->integer(),
            'entity' => $this->integer(),
            'entity_id' => $this->integer(),
            'meta_title' => $this->string(255),
            'meta_description' => $this->text(),
            'meta_keywords' => $this->text(),
            'is_active' => $this->boolean(),
            'sort' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey(self::$table . '_parent_id_id_fk', self::$table, 'parent_id',
            self::$table, 'id', 'SET NULL', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable(self::$table);
    }
}

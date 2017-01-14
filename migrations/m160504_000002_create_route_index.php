<?php

use yii\db\Migration;

/**
 * Handles the creation for table `route_index`.
 */
class m160504_000002_create_route_index extends Migration
{
    public static $table = 'route_index';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable(self::$table, [
            'route_id' => $this->primaryKey(),
            'path' => $this->string(),
            'level' => $this->smallInteger(),
            'refs' => 'int',
        ]);

        $this->addForeignKey(self::$table . '_route_id_fk', self::$table, 'route_id',
            'route', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable(self::$table);
    }
}

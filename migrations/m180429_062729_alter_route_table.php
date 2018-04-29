<?php

use yii\db\Migration;

class m180429_062729_alter_route_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('route', 'h1', 'string DEFAULT NULL');
    }

    public function safeDown()
    {
        $this->dropColumn('route', 'h1');

        return false;
    }
}

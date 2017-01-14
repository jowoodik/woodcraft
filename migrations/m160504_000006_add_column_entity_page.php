<?php

use yii\db\Migration;

class m160504_000006_add_column_entity_page extends Migration
{
    public function up()
    {
        $this->addColumn('entity_page','is_main','boolean DEFAULT FALSE');
    }

    public function down()
    {
        $this->dropColumn('entity_page', 'is_main');
        return false;
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

<?php

use yii\db\Migration;

class m160504_000015_alter_entity_page extends Migration
{
    public function up()
    {
        $this->renameColumn('entity_page', 'is_main', 'is_sidebar');
    }

    public function down()
    {
        $this->dropColumn('entity_page', 'is_sidebar');
    }
}

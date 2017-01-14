<?php

use yii\db\Migration;

class m160504_000005_create_settings_main_page extends Migration
{
    public function up()
    {
        $this->createTable('settings_main_page', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'info_text' => $this->text(),
            'status' => $this->smallInteger(),
            'image' => $this->string(),
            'video' => $this->text(),
            'number' => $this->string(),
            'position' => $this->string(50),
            'sort' => $this->smallInteger()->defaultValue(0),
        ]);
    }

    public function down()
    {
        $this->dropTable('settings_main_page');
    }
}

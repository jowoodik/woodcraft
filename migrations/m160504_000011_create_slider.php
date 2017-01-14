<?php

use yii\db\Migration;

class m160504_000011_create_slider extends Migration
{
    public function up()
    {
        $this->createTable('slider', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'text' => $this->text(),
            'image' => $this->string(),
            'link' => $this->string(50),
            'status' => $this->smallInteger(),
            'sort' => $this->smallInteger()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('slider');
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

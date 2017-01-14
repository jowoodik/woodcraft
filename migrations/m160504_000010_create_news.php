<?php

use yii\db\Migration;

class m160504_000010_create_news extends Migration
{
    public function up()
    {
        $this->createTable('news', [
            'id'               => $this->primaryKey(),
            'title'            => $this->string(),
            'alias'            => $this->string(),
            'short_text'       => $this->text(),
            'text'             => $this->text(),
            'image'            => $this->string(),
            'meta_title'       => $this->string(),
            'meta_description' => $this->string(),
            'meta_keywords'    => $this->string(),
            'created_at'       => $this->integer(),
            'updated_at'       => $this->integer(),
            'status'           => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('news');
    }
}

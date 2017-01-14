<?php

use yii\db\Migration;

class m160504_000012_create_applications extends Migration
{
    public function up()
    {
        $this->createTable('applications', [
            'id' => $this->primaryKey(),
            'user_name' => $this->string(),
            'user_email' => $this->string(),
            'user_telephone' => $this->string(),
            'user_company' => $this->string(),
            'build_appointment' => $this->string(),
            'status' => $this->smallInteger(),
            'outer_length' => $this->char(10),
            'outer_width' => $this->char(10),
            'outer_height' => $this->char(10),
            'inner_length' => $this->char(10),
            'inner_width' => $this->char(10),
            'inner_height' => $this->char(10),
            'build_foundation' => $this->string(),
            'file_route' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('applications');
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%applications}}".
 *
 * @property integer $id
 * @property string $user_name
 * @property string $user_email
 * @property string $user_telephone
 * @property string $user_company
 * @property string $build_appointment
 * @property integer $status
 * @property string $outer_length
 * @property string $outer_width
 * @property string $outer_height
 * @property string $inner_length
 * @property string $inner_width
 * @property string $inner_height
 * @property string $build_foundation
 * @property string $file_route
 * @property integer $created_at
 * @property integer $updated_at
 */
class BaseApplications extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%applications}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['user_name', 'user_email', 'user_telephone', 'user_company', 'build_appointment', 'build_foundation', 'file_route'], 'string', 'max' => 255],
            [['outer_length', 'outer_width', 'outer_height', 'inner_length', 'inner_width', 'inner_height'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'user_email' => 'User Email',
            'user_telephone' => 'User Telephone',
            'user_company' => 'User Company',
            'build_appointment' => 'Build Appointment',
            'status' => 'Status',
            'outer_length' => 'Outer Length',
            'outer_width' => 'Outer Width',
            'outer_height' => 'Outer Height',
            'inner_length' => 'Inner Length',
            'inner_width' => 'Inner Width',
            'inner_height' => 'Inner Height',
            'build_foundation' => 'Build Foundation',
            'file_route' => 'File Route',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

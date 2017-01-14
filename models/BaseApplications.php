<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%applications}}".
 *
 * @property integer $id
 * @property string $user_name
 * @property string $user_email
 * @property string $user_message
 * @property integer $status
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
            [['user_message'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['user_name', 'user_email'], 'string', 'max' => 255],
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
            'user_message' => 'User Message',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

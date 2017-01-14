<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%slider}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $image
 * @property string $link
 * @property integer $status
 * @property integer $sort
 * @property integer $created_at
 * @property integer $updated_at
 */
class BaseSlider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%slider}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['status', 'sort', 'created_at', 'updated_at'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['link'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'image' => 'Image',
            'link' => 'Link',
            'status' => 'Status',
            'sort' => 'Sort',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%settings_main_page}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $info_text
 * @property integer $status
 * @property string $image
 * @property string $video
 * @property string $number
 * @property string $position
 * @property integer $sort
 */
class BaseSettingsMainPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%settings_main_page}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['info_text', 'video'], 'string'],
            [['status', 'sort'], 'integer'],
            [['title', 'image', 'number'], 'string', 'max' => 255],
            [['position'], 'string', 'max' => 50],
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
            'info_text' => 'Info Text',
            'status' => 'Status',
            'image' => 'Image',
            'video' => 'Video',
            'number' => 'Number',
            'position' => 'Position',
            'sort' => 'Sort',
        ];
    }
}

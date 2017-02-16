<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%entity_page}}".
 *
 * @property integer $id
 * @property integer $route_id
 * @property string $text
 * @property integer $created_at
 * @property integer $updated_at
 * @property boolean $is_sidebar
 *
 * @property Route $route
 */
class BaseEntityPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%entity_page}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['route_id', 'created_at', 'updated_at'], 'integer'],
            [['text'], 'string'],
            [['is_sidebar'], 'boolean'],
            [['route_id'], 'exist', 'skipOnError' => true, 'targetClass' => Route::className(), 'targetAttribute' => ['route_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'route_id' => 'Route ID',
            'text' => 'Text',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_sidebar' => 'Is Sidebar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoute()
    {
        return $this->hasOne(Route::className(), ['id' => 'route_id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%entity_services}}".
 *
 * @property integer $id
 * @property integer $route_id
 * @property string $image
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Route $route
 */
class BaseEntityServices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%entity_services}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['route_id', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['image'], 'string', 'max' => 255],
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
            'image' => 'Image',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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

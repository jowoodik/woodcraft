<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%entity_catalog_stroimaterialy}}".
 *
 * @property integer $id
 * @property integer $route_id
 * @property string $name
 *
 * @property Route $route
 */
class BaseEntityCatalogStroimaterialy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%entity_catalog_stroimaterialy}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['route_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'name' => 'Name',
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

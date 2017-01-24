<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%entity_catalog_categories}}".
 *
 * @property integer $id
 * @property integer $route_id
 * @property string $text
 * @property string $image
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $is_show
 * @property integer $is_sidebar
 *
 * @property Route $route
 */
class BaseEntityCatalogCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%entity_catalog_categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['route_id', 'created_at', 'updated_at', 'is_show', 'is_sidebar'], 'integer'],
            [['text'], 'string'],
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
            'text' => 'Text',
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_show' => 'Is Show',
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

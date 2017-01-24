<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%route}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property integer $parent_id
 * @property integer $entity
 * @property integer $entity_id
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $is_active
 * @property integer $sort
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property EntityCatalog[] $entityCatalogs
 * @property EntityCatalogCategories[] $entityCatalogCategories
 * @property EntityCatalogInstrument[] $entityCatalogInstruments
 * @property EntityCatalogWood[] $entityCatalogWoods
 * @property EntityGallery[] $entityGalleries
 * @property EntityPage[] $entityPages
 * @property EntityServices[] $entityServices
 * @property Menu[] $menus
 * @property Route $parent
 * @property Route[] $routes
 * @property RouteIndex $routeIndex
 */
class BaseRoute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%route}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'entity', 'entity_id', 'is_active', 'sort', 'created_at', 'updated_at'], 'integer'],
            [['meta_description', 'meta_keywords'], 'string'],
            [['title', 'alias', 'meta_title'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Route::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'alias' => 'Alias',
            'parent_id' => 'Parent ID',
            'entity' => 'Entity',
            'entity_id' => 'Entity ID',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'is_active' => 'Is Active',
            'sort' => 'Sort',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntityCatalogs()
    {
        return $this->hasMany(EntityCatalog::className(), ['route_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntityCatalogCategories()
    {
        return $this->hasMany(EntityCatalogCategories::className(), ['route_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntityCatalogInstruments()
    {
        return $this->hasMany(EntityCatalogInstrument::className(), ['route_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntityCatalogWoods()
    {
        return $this->hasMany(EntityCatalogWood::className(), ['route_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntityGalleries()
    {
        return $this->hasMany(EntityGallery::className(), ['route_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntityPages()
    {
        return $this->hasMany(EntityPage::className(), ['route_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntityServices()
    {
        return $this->hasMany(EntityServices::className(), ['route_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['route_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Route::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoutes()
    {
        return $this->hasMany(Route::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRouteIndex()
    {
        return $this->hasOne(RouteIndex::className(), ['route_id' => 'id']);
    }
}

<?php

namespace app\models;


use app\behaviors\RouteBehavior;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;

class EntityCatalogCategories extends BaseEntityCatalogCategories
{
    use EntityTrait;

    public $breadcrumbs;

    public $page;

    public $enclosedEntities;

    public $menu;

    public $module_content;

    public function transactions()
    {
        return [
            'default' => self::OP_INSERT | self::OP_UPDATE | self::OP_DELETE,
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => RouteBehavior::className(),
                'entity' => Entity::ENTITY_CATALOG_CATEGORIES,
            ],
            TimestampBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            [['route_id', 'created_at', 'updated_at'], 'integer'],
            [['text'], 'string'],
            [['is_sidebar', 'is_show'], 'boolean'],
            [['image'], 'string', 'max' => 255],
            [['route_id'], 'exist', 'skipOnError' => true, 'targetClass' => Route::className(), 'targetAttribute' => ['route_id' => 'id']],
            [['title', 'alias'], 'string', 'max' => 70],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'alias' => 'Псевдоним',
            'is_active' => 'Активно',
            'is_sidebar' => 'Показать боковое меню на данной странице',
            'is_show' => 'Отображать в списке продукции на главной странице'
        ];
    }

    public function attach()
    {
        $route_id = $this->route['id'];

        $this->breadcrumbs = Route::getBreadCrumbs($this->route['refs']);


        $this->page = self::find()
            ->asArray()
            ->where(['id' => $this->entity_id])
            ->one();

        //вложенные страницы
        $this->enclosedEntities = Route::find()
            ->asArray()
            ->select([
                'route.*',
                'route_index.path AS path',
                'route_index.level as level',
            ])
            ->where([
                'is_active' => true,
                'entity' => [
                    Entity::ENTITY_PAGE,
                ]
            ])
            ->andWhere(['parent_id' => $this->route['id']])
            ->andWhere("route_index.refs && ARRAY[$route_id]")
            ->innerJoin('route_index', 'route_index.route_id = route.id')
            ->innerJoin('entity_page', 'entity_page.route_id = route.id')
            ->orderBy('route_index.level')
            ->orderBy('route.sort')
            ->indexBy('id')
            ->all();
    }

    public static function search($q)
    {
        $query = self::find()
            ->select([
                'entity_catalog_categories.id',
                'entity_catalog_categories.route_id',
                'entity_catalog_categories.text',
                'route.title',
                'route_index.path'
            ])
            ->innerJoin('route', 'route.entity_id = entity_catalog_categories.id')
            ->innerJoin('route_index', 'route.id = route_index.route_id')
            ->orderBy([
                'entity_catalog_categories.id' => 'DESC',
            ])
            ->where(['ilike', 'route.title', $q])
            ->orWhere(['ilike', 'entity_catalog_categories.text', $q]);

        return $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
            ],
        ]);
    }

    public static function getMainPageItems()
    {
        $result = self::find()
            ->select([
                'entity_catalog_categories.*',
                'route.*',
                'route_index.path as path'
            ])
            ->innerJoin('route', 'route.id = entity_catalog_categories.route_id')
            ->innerJoin('route_index', 'route_index.route_id = route.id')
            ->where(['entity_catalog_categories.is_show' => TRUE])
            ->limit(6)
            ->all();

        return $result;
    }
}
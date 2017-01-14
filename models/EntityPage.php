<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12.04.16
 * Time: 16:11
 */

namespace app\models;

use app\behaviors\RouteBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Json;


/**
 * Class EntityPages
 * @package app\models
 */
class EntityPage extends BaseEntityPage
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
                'entity' => Entity::ENTITY_PAGE,
            ],
            TimestampBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            [['route_id', 'created_at', 'updated_at'], 'integer'],
            [['text'], 'string'],
            [['is_sidebar'], 'boolean'],
            [['route_id'], 'exist', 'skipOnError' => true, 'targetClass' => Route::className(), 'targetAttribute' => ['route_id' => 'id']],
            [['title'], 'string', 'max' => 100],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название страницы',
            'alias' => 'Псевдоним страницы',
            'is_active' => 'Активная страница',
            'position' => 'Позиция на сайте',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_sidebar' => 'Показывать боковое меню',
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
}

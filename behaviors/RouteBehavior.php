<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 18.04.16
 * Time: 16:01
 */

namespace app\behaviors;

use app\models\Index;
use app\modules\admin\models\Route;
use /** @noinspection PhpMethodOrClassCallIsNotCaseSensitiveInspection */
    Yii;
use yii\base\Behavior;
use yii\base\InvalidConfigException;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\validators\Validator;

/**
 * Class RouteBehavior
 * @package app\behaviors
 * @property ActiveRecord $owner
 * @property $params
 */
class RouteBehavior extends Behavior
{
    public $entity;
    public $route;
    public $title;
    public $alias;
    public $parent_id;
    public $is_active;
    public $meta_title;
    public $meta_description;
    public $meta_keywords;
    public $params;

    public function events()
    {
        return [
//            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeSave',
//            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeSave',
            ActiveRecord::EVENT_AFTER_INSERT => 'afterSave',
            ActiveRecord::EVENT_AFTER_UPDATE => 'afterSave',
            ActiveRecord::EVENT_AFTER_FIND => 'afterFind',
        ];
    }

    /**
     * @param Model $owner
     * @throws InvalidConfigException
     */
    public function attach($owner)
    {
        if (!$this->entity) {
            throw new InvalidConfigException('Entity not set to RouteBehavior');
        }

        ArrayHelper::merge($owner->validators, [
            Validator::createValidator('required', $owner, ['title']),

            Validator::createValidator('integer', $owner, ['parent_id']),

            Validator::createValidator('string', $owner, [
                'title',
                'alias',
                'meta_title',
                'meta_description',
                'meta_keywords',
            ]),

            Validator::createValidator('boolean', $owner, 'is_active'),

            Validator::createValidator('safe', $owner, ['params']),
        ]);

        parent::attach($owner);
    }

    public function afterFind()
    {
        $route_id = $this->owner->{'route_id'};

        $route_id = (!$route_id) ? $this->owner->oldAttributes['route_id'] : $route_id;

        /** @var Route $route */
        $route = Route::findOne($route_id);

        $this->route = $route;
        $this->title = $route->title;
        $this->alias = $route->alias;
//        $this->path = $route->path;
        $this->parent_id = $route->parent_id;
        $this->is_active = $route->is_active ?: true;
        $this->meta_title = $route->meta_title;
        $this->meta_description = $route->meta_description;
        $this->meta_keywords = $route->meta_keywords;

    }

    public function afterSave()
    {

        $id = $this->owner['id'];
        $route_id = $this->owner['route_id'];

        $route = $route_id ? Route::findOne($route_id) : new Route;

        $route->title = $this->title;
        $route->alias = $this->alias;
        $route->parent_id = $this->parent_id;
        $route->is_active = $this->owner['is_active'];
        $route->meta_title = $this->meta_title;
        $route->meta_description = $this->meta_description;
        $route->meta_keywords = $this->meta_keywords;
        $route->entity = $this->entity;
        $route->entity_id = $id;

        $route->save();

        $model = $this->owner;

        //Index::routes();
        $model::updateAll(['route_id' => $route->id], ['id' => $id]);

        Index::routes();
    }
}

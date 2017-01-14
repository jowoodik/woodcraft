<?php

namespace app\models;

class EntityServices extends BaseEntityServices
{
    use EntityTrait;
    public $breadcrumbs;
    public $items;
    public $route_id;

    public $enclosedEntities;

    public function transactions()
    {
        return [
            'default' => self::OP_INSERT | self::OP_UPDATE | self::OP_DELETE,
        ];
    }

    public function attach()
    {
        $refs = $this->route['refs'];
        $this->breadcrumbs = Route::getBreadCrumbs($refs);
        $this->route_id = $this->route['id'];
        $query = Route::find()
            ->asArray()
            ->select([
                'route.*',
                'route_index.path AS path',
                'route_index.level as level',
                'entity_catalog_categories.image',
            ])
            ->where([
                'is_active' => true,
                'entity' => [
                    Entity::ENTITY_CATALOG_CATEGORIES,

                ]
            ])
            ->andWhere("route_index.refs && ARRAY[$this->route_id]")
            ->andWhere(['level' => 1])
            ->innerJoin('route_index', 'route_index.route_id = route.id')
            ->innerJoin('entity_catalog_categories', 'entity_catalog_categories.route_id = route.id')
            ->orderBy('route.sort')
            ->indexBy('id');

        $this->items = $query->all();
        $this->route_id = current($this->items)['parent_id'];
    }
}
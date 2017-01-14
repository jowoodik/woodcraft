<?php

namespace app\models;

class Menu extends BaseMenu
{
    public static $positions = [
        'menu_header'=>'Основное меню навгигации',
        'middle_menu'=>'Навигация в центре',
        'footer_menu'=>'Навигация в подвале',
    ];

    public static function getRouteAliases()
    {
        return Route::find()
            ->asArray()
            ->select([
                'route.alias',
                'route_index.level as level',
            ])
            ->where([
                'level' => 0,
                'entity' => [
                    Entity::ENTITY_PAGE,
                ]
            ])
            ->indexBy('alias')
            ->innerJoin('route_index', 'route_index.route_id = route.id')
            ->column();
    }
}
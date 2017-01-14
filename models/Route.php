<?php

namespace app\models;


use app\components\App;
use yii\behaviors\TimestampBehavior;

class Route extends BaseRoute
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            [['title', 'alias'], 'string', 'max' => 70],
        ];
    }

    public static function getList()
    {
        return Route::find()
            ->asArray()
            ->select([
                'route.*',
                'route_index.path AS path',
            ])
            ->orderBy('[[parent_id]] ASC NULLS FIRST, [[id]] ASC')
            ->indexBy('id')
            ->innerJoin('route_index', 'route_index.route_id = route.id')
            ->all();

    }

    public static function getRouteByPath($path)
    {
        return Route::find()
            ->asArray()
            ->select([
                'route.*',
                'route_index.path AS path',
                'route_index.level AS level',
                'route_index.refs AS refs'
            ])
            ->from('route')
            ->innerJoin('route_index', 'route_index.route_id = route.id')
            ->where(['path' => '/' . $path])
            ->one();
    }

    public static function getBreadCrumbs($refs)
    {
        $refsTrim = App::dbStringToArray($refs);
        $finalRefs = explode(',', $refsTrim);

        //array_slice выдает id до 3 элемента включительно
        $finalRefs = array_slice($finalRefs, 0, 6);

        $breadCrumbs = RouteIndex::find()
            ->asArray()
            ->select([
                'route.title as label',
                'route_index.path AS url',
            ])
            ->from('route')
            ->innerJoin('route_index', 'route_index.route_id = route.id')
            ->where([
                'id' => $finalRefs,
            ])
            ->orderBy('level')
            ->all();

        $end = end($breadCrumbs);
        unset($end['url']);

        array_pop($breadCrumbs);

        return array_merge($breadCrumbs, $end);
    }
}

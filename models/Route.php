<?php

namespace app\models;


use app\components\App;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%route}}".
 *
 * @property EntityCatalogCategories $entityCatalogCategories
 */
class Route extends \app\modules\admin\models\Route
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public static function getList()
    {
        return Route::find()
            ->asArray()
            ->select([
                'route.*',
                'route_index.path AS path',
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

    public function getChildRoutes()
    {
        return Route::find()
            ->asArray()
            ->select([
                'route.id',
                'route.title',
                'route.parent_id AS parent',
                'route_index.path AS path',
                'level'
            ])
            ->from('route')
            ->innerJoin('route_index', 'route_index.route_id = route.id')
            ->andWhere(['<', 'level', 3])
            ->all();
    }
}

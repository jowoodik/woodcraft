<?php
namespace app\modules\admin\lib;

use app\tables\Types;
use yii\db\Query;
use yii\helpers\ArrayHelper;

class Lst
{
    public static function modulesTypes()
    {
        $array = (new Query())
            ->distinct()
            ->select('type')
            ->from('modules')
            ->where(['not' , ['type' => '']])
            ->orderBy('type')
            ->all();

        return ArrayHelper::map($array, 'type', 'type');
    }

    public static function types()
    {
        return self::table('types', 'id', 'name');
    }

    public static function ctColors()
    {
        return self::table('colors', 'hex', 'color', ['color' => SORT_ASC]);
    }

    public static function ctCategories()
    {
        return self::table('categories', 'id', 'title', ['created_at' => SORT_DESC]);
    }

    public static function ctBrands()
    {
        return self::table('brands', 'id', 'title', ['sort' => SORT_ASC]);
    }

    public static function elements($type_id = null)
    {
        if (!$type_id) return [];
        /** @var $type Types */
        $type = Types::findOne($type_id);
        return self::table($type->table, 'id', 'title', ['created_at' => SORT_DESC]);
    }

    public static function routeParents($currentUrl)
    {
        $array = (new Query())
            ->select([
                'CONCAT(label, " - ", url) AS name',
                'url'
            ])
            ->from('routes')
            ->orderBy(['date' => SORT_DESC])
            ->where(['not', ['url' => $currentUrl]])
            ->all();

        return ArrayHelper::map($array, 'url', 'name');
    }

    public static function getParents($level)
    {
        $array = (new Query())
            ->select([
                'id',
                'title',
            ])
            ->from('categories')
            ->where(['level' => $level - 1])
            ->all();

        return ArrayHelper::map($array, 'id', 'title');
//        return $array;
    }

    public static function table($table, $key = 'id', $value = 'title', $order = ['ordering' => SORT_ASC])
    {
        $array = (new Query())
            ->select([$key, $value])
            ->from($table)
            ->orderBy($order)
            ->all();

        return ArrayHelper::map($array, $key, $value);
    }
}

<?php

namespace app\lib;


use app\tables\Information;
use yii\helpers\ArrayHelper;

class Info
{
    private static $info = [];

    public static function get($key = '')
    {
        if (!self::$info) self::$info = ArrayHelper::map(Information::find()
            ->asArray()
            ->select([
                'alias',
                'text',
            ])
            ->all(), 'alias', 'text');
        return $key ? ArrayHelper::getValue(self::$info, $key, '') : self::$info;
    }
}
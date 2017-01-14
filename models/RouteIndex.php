<?php

namespace app\models;

class RouteIndex extends BaseRouteIndex
{
    public static function getPathById($id){
        $path = self::find()
            ->where(['route_id' => $id])
            ->one();

        return $path;
    }
}
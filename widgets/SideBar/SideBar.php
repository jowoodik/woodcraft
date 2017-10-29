<?php

namespace app\widgets\SideBar;

use yii\base\Widget;
use app\models\Route;

class SideBar extends Widget
{
    public $form;
    public $model;
    public $id;
    public $parent_id;
    public $routes;

    public function init()
    {
        if (isset($this->model->parent_id)){
            $condition = 'parent_id';
            $id = $this->model->id;
        } else {
            $condition = 'level';
            $id = 1;
        }

        $this->routes = Route::find()
            ->asArray()
            ->select([
                'route.*',
                'route_index.*'
            ])
            ->where([$condition => $id])
            ->andWhere(['entity' => 5])
            ->andWhere(['!=','parent_id', 28])
            ->innerJoin('route_index', 'route_index.route_id = route.id')
            ->all();

    }

    public function run()
    {
        return $this->render('sideBar', [
            'routes' => $this->routes
        ]);
    }
}
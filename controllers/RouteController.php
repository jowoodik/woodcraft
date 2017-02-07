<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12.04.16
 * Time: 16:39
 */

namespace app\controllers;


use app\components\App;
use app\models\Entity;
use app\models\Route;
use yii\db\ActiveQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class RouteController extends Controller
{
    public function actionIndex($path)
    {
        $route = Route::getRouteByPath($path);

        if (!$route) throw new NotFoundHttpException;

        App::$currentRoute = $route;

        $entity = $route['entity'];
        $entity_id = $route['entity_id'];

        $model = Entity::getEntityModel($entity, $entity_id);

        $model->route = $route;

        $model->attach();

        return $model->action($this);
    }

    public function actionGetSubLevels()
    {
        $req = \Yii::$app->request->post();
        $parentId = $req['parentId'];
        $parentPath = $req['parentPath'];
        $parentName = $req['parentName'];

        $subRoutes = Route::find()
            ->joinWith(['routeIndex'])
            ->andWhere(['parent_id'=>$parentId])
            ->all();

        $html = $this->renderPartial('index',[
            'routes' => $subRoutes,
            'parentPath' => $parentPath,
            'parentName' => $parentName,
        ]);

        return $html;
    }
}

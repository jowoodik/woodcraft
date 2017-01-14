<?php

namespace app\modules\admin\controllers;

use app\models\Entity;


use app\models\Route;
use HttpException;
use Yii;
use yii\base\ErrorException;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class RouteController extends Controller
{
    public $title = 'Структура';

    public function actionIndex()
    {
        Url::remember();

        $this->view->title = $this->title;

        $model = Route::getList();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $route = Route::findOne($id);

        if (!$route) throw new NotFoundHttpException;
        if ($id == 16 || $id == 119) {
            throw new ErrorException('Удаление данной страницы невозможно');
        } else {
            $route->delete();
        }

        return $this->goBack();
    }

    public function actionGoToEntity($action, $entity, $entity_id)
    {
        switch ($action) {
            case 'update':
                $url = Entity::getEntityUpdateUrl($entity, $entity_id);
//                dd($url);
                break;

            default:
                throw new NotFoundHttpException;
        }

        return $this->redirect($url);
    }

    public function actionDeleteEntity()
    {
        $req = Yii::$app->request;
        $id = $req->post('id');
        if ($id) {

            $route = Route::findOne($id);

            if (!$route) throw new NotFoundHttpException;
            if ($id == 16 || $id == 119) {
                throw new ErrorException('Удаление данной страницы невозможно');
            } else {

                $route->delete();
            }
        } else throw new NotFoundHttpException;

        return $this->goBack();
    }
}

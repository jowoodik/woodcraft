<?php

namespace app\modules\admin\controllers;


use app\models\Entity;
use app\models\EntityCatalog;
use app\models\EntityCatalogCategories;
use app\models\EntityGallery;
use app\models\EntityVacancy;
use app\modules\admin\models\Route;
use HttpException;
use /** @noinspection PhpMethodOrClassCallIsNotCaseSensitiveInspection */
    Yii;
use yii\base\ErrorException;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{
    public $title = 'Структура';

    public function actionIndex()
    {
        Url::remember();

        $this->view->title = $this->title;

        $data = Route::getData();

        return $this->render('index', [
            'data' => $data,
        ]);
    }

    public function actionDelete($id)
    {
        $route = Route::findOne($id);

        if (!$route) throw new NotFoundHttpException;

        return $this->goBack();
    }

    public function actionGoToEntity($action, $entity, $entity_id)
    {

        switch ($action) {
            case 'update':
                $url = Entity::getEntityUpdateUrl($entity, $entity_id);
                break;
            default:
                throw new NotFoundHttpException;
        }

        return $url;

    }

    public function actionDeleteEntity()
    {
        $req = Yii::$app->request;

        $id = (int)$req->post('id');

        if ($id) {

            $route = Route::findOne($id);

            if (!$route) throw new NotFoundHttpException;
//            if ($id == 16 || $id == 119) {
//                throw new ErrorException('Удаление данной страницы невозможно');
//            } else {
//
//                $route->delete();
//            }
        } else throw new NotFoundHttpException;
        if (!$route) throw new NotFoundHttpException;

        $route->delete();

        return $this->goBack();
    }
}

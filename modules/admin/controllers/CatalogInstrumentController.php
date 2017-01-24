<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\Route;
use app\modules\admin\models\CatalogInstrument;

class CatalogInstrumentController extends Controller
{
    public $title = 'Каталог Иснтрументов';

    public function actionIndex()
    {
        Url::remember();

        $this->view->title = $this->title;

        $model = Route::getList();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        $req = Yii::$app->request;

        $model = new CatalogInstrument();

        if ($model->load($req->post())) {
            if ($model->save()) {
                return $this->goBack();
            } else {
                //чтобы видеть ошибку:
                Yii::warning($model->errors);
            }
        }
        $this->view->params['breadcrumbs'][] = $this->view->title = 'Добавить каталог Инструментов';

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $this->view->title = $this->title;

        $req = Yii::$app->request;

        /** @var $model CatalogInstrument */
        $model = CatalogInstrument::findOne($id);
        if ($model->load($req->post())) {
            if ($model->save()) {
                if ($req->post('btn-save-and-close')) {
                    return $this->goBack();
                }
            } else {
                //чтобы видеть ошибку:
                Yii::warning($model->errors);
            }
        }
        $this->view->params['breadcrumbs'][] = $this->view->title = 'Редактировать каталог Инструментов';

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete()
    {
        return $this->redirect('/admin/route/index');
    }
}

<?php
namespace app\modules\admin\controllers;


use app\models\EntityPage;
use app\models\Route;
use yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PageController extends Controller
{
    public $title = 'Страницы';

    public function actionIndex()
    {
        return $this->redirect(yii\helpers\Url::to('/admin/default/index'));
    }

    public function actionCreate()
    {
        $this->view->title = $this->title;

        $req = Yii::$app->request;

        $model = new EntityPage();

        if ($model->load($req->post())) {
            if ($model->save()) {
                return $this->goBack();
            } else {
                //чтобы видеть ошибку:
                Yii::warning($model->errors);
            }
        }

        $this->view->params['breadcrumbs'][] = $this->view->title = 'Добавить страницу';

        return $this->render('page-form', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $this->view->title = $this->title;

        $req = Yii::$app->request;

        /** @var $model EntityPage() */
        $model = EntityPage::findOne($id);
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

        $this->view->params['breadcrumbs'][] = $this->view->title = 'Редактировать страницу';

        return $this->render('page-form', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $ep = EntityPage::findOne($id);

        if (isset($ep)) {
            $route_id = $ep['route_id'];
            $ep->delete();

            $route = Route::findOne($route_id);
            if (!$route) throw new NotFoundHttpException;

            $route->delete();
        }
        return $this->goBack();
    }
}

<?php

namespace app\modules\admin\controllers;

use Exception;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;
use app\models\Applications;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;


class MailboxController extends Controller
{
    public $title = 'Заявки';

    public function actionIndex()
    {

        Url::remember();
        $this->view->title = $this->title;

        $models = Applications::find()->asArray();

        $dataProvider = new ActiveDataProvider([
            'query'      => $models,
            'sort'       => [
                'defaultOrder' => ['id' => SORT_DESC],
            ],
            'pagination' => [
                'defaultPageSize' => 20,
            ],
        ]);
        $this->view->params['breadcrumbs'][] = $this->view->title = $this->title;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate($id)
    {
        $this->view->title = $this->title;

        $req = Yii::$app->request;

        /** @var $model Applications */
        $model = Applications::findOne($id);
        $model->status = ($req->post('Applications')['status']);
        if ($req->post('Applications')['status'] && $model->save(false)) {
            return $this->goBack();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDownload($id)
    {
        $model = Applications::findOne($id);

        $path = Yii::getAlias('@webroot/');

        $file = $path . $model->file_route;

        if (file_exists($file)) {
            Yii::$app->response->sendFile($file);
        }
    }

    public function actionDelete($id)
    {
        /** @var $m Applications */
        $m = Applications::findOne($id);

        if (!$m->delete()) throw new Exception(Json::encode($m->errors));

        return $this->redirect('index');
    }
}

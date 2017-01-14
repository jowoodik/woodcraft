<?php
namespace app\modules\admin\controllers;

use app\models\Menu;
use Exception;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;

class MenuController extends Controller
{
    public $title = 'Меню';
   
    public function actionIndex()
    {
        Url::remember();
        $this->view->title = $this->title;

        $models = Menu::find()
            ->asArray()
            ->with('route');

        $dataProvider = new ActiveDataProvider([
            'query' => $models,
        ]);
        $this->view->params['breadcrumbs'][] = $this->view->title = $this->title;
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'models' => $models,
        ]);
    }


    public function actionCreate($pid = null)
    {
        $this->view->title = $this->title;

        $req = Yii::$app->request;

        /** @var $model Menu */
        $model = new Menu;

        if ($model->load($req->post())) {
            if ($model->save()) {
                return $this->goBack();
            } else {
                //чтобы видеть ошибку:
                Yii::warning($model->errors);
            }
        }
        $this->view->params['breadcrumbs'][] = $this->view->title = 'Добавить пункт меню';

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $this->view->title = $this->title;

        $req = Yii::$app->request;

        /** @var $model Menu */
        $model = Menu::findOne($id);
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
        $this->view->params['breadcrumbs'][] = $this->view->title = 'Редактировать пункт меню';

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        /** @var $model Menu */
        $m = Menu::findOne($id);

        if (!$m->delete()) throw new Exception(Json::encode($m->errors));

        return $this->redirect('index');
    }
}

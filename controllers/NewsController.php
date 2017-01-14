<?php
/**
 */

namespace app\controllers;

use app\models\News;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class NewsController extends Controller
{
    public $title = 'Новости';

    public function actionIndex()
    {
        $this->view->title = $this->title;
        $model = News::find()->asArray()->where(['status' => 1]);

        $dataProvider = new ActiveDataProvider([
            'query'      => $model,
            'sort'       => [
                'defaultOrder' => ['id' => SORT_DESC],
            ],
            'pagination' => [
                'defaultPageSize' => 6,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model'        => $model,
        ]);
    }


    public function actionView($id, $alias)
    {
        /** @var News $model */
        $model = News::findOne(['id' => $id, 'alias' => $alias]);
        if (!$model) {
            throw new NotFoundHttpException;
        }

        $this->view->title = $model->title;

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}

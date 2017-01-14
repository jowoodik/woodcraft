<?php
/**
 */

namespace app\controllers;


use app\models\Applications;
use app\models\News;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;


class RequestController extends Controller
{
    public $title = 'Заявка';

    public function actionIndex()
    {
        $application = new Applications();
        $req = Yii::$app->request;

        if ($application->load($req->post())) {
            $file = UploadedFile::getInstance($application, 'file_route');

            if ($file) {
                $dirName = 'uploads/application/';

                $route = $dirName;
                $dir = Yii::getAlias("@app/web/");

                $string = $route . rand(1, 100) . '' . date('YmdHis') . '.' . $file->extension;

                $application->file_route = $string;

                $file->saveAs($dir . '/' . $string);
            }

            foreach ($application as $key => $item) {
                if (is_array($item)){
                    if ($key != 'id') $application->$key = htmlspecialchars(strip_tags($item[0]));

                } else {
                    if ($key != 'id') $application->$key = htmlspecialchars(strip_tags($item));
                }
            }

            if ($application->save() && $application->contact()) {
                Yii::$app->session->setFlash('contactFormSubmitted');
            }
        };
        return $this->render('index', [

        ]);
    }


    public function actionView($id, $alias)
    {
        /** @var News $model */
        $model = News::findOne(['id' => $id, 'alias' => $alias]);
        if (!$model) throw new NotFoundHttpException;

        $this->view->title = $model->title;

        return $this->render('view', [
            'model' => $model,
        ]);
    }
}

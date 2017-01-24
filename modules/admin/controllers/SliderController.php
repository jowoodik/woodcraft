<?php
/**
 */

namespace app\modules\admin\controllers;

use app\modules\admin\models\Slider;
use Exception;
use Imagine\Image\Box;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\UploadedFile;

class SliderController extends Controller
{
    public $title = 'Слайдер';

    public function actionIndex()
    {
        Url::remember();
        $this->view->title = $this->title;

        $models = Slider::find()->asArray();

        $dataProvider = new ActiveDataProvider([
            'query' => $models,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
            ],
        ]);
        $this->view->params['breadcrumbs'][] = $this->view->title = $this->title;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
   

     public function actionCreate()
    {
        $this->view->title = $this->title;

        $req = Yii::$app->request;

        /** @var $model Slider */
        $model = new Slider;
        if ($model->load($req->post())) {
            $dirName = 'uploads/slider';

            $route = $dirName . '/';
            $dir = Yii::getAlias("@app/web/");
            $string = $route . rand(1, 100) . '' . date('YmdHis');

            $file = UploadedFile::getInstance($model, 'image');

            if ($file) {
                $model->image = $string;
                $image = Image::getImagine();
                $sizePreview = new Box(380, 200);

                $image->open($file->tempName)
                    ->thumbnail($sizePreview)
                    ->save($dir . '/' . $string . '-preview.jpg', ['quality' => 100]);

                $file->saveAs($dir . '/' . $string . '.jpg');
            }
            if ($model->save()) {
                return $this->goBack();
            } else {
                Yii::warning($model->errors);
            }
        }
        $this->view->params['breadcrumbs'][] = $this->view->title = 'Добавить слайд';

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $this->view->title = $this->title;

        $req = Yii::$app->request;

        /** @var $model Slider */
        $model = Slider::findOne($id);

        $oldFile = $model->image;

        if ($model->load($req->post())) {
            if (!$model->image) $model->image = $oldFile;
            $dirName = 'uploads/slider';

            $route = $dirName . '/';
            $dir = Yii::getAlias("@app/web/");
            $string = $route . rand(1, 100) . '' . date('YmdHis');

            $file = UploadedFile::getInstance($model, 'image');

            if ($file) {
                $model->image = $string;
                $image = Image::getImagine();
                $sizePreview = new Box(380, 200);

                $image->open($file->tempName)
                    ->thumbnail($sizePreview)
                    ->save($dir . '/' . $string . '-preview.jpg', ['quality' => 100]);

                $file->saveAs($dir . '/' . $string . '.jpg');
            }
            if ($model->save()) {
                return $this->goBack();
            } else {
                Yii::warning($model->errors);
            }
        }
        $this->view->params['breadcrumbs'][] = $this->view->title = 'Редактировать слайд';

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        /** @var Slider $news */
        $slider = Slider::findOne($id);

        if (!$slider->delete()) throw new Exception(Json::encode($slider->errors));

        return $this->redirect('index');
    }
}

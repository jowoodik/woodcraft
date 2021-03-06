<?php
/**
 */

namespace app\modules\admin\controllers;

use app\modules\admin\models\News;
use Exception;
use Imagine\Image\Box;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\UploadedFile;

class NewsController extends Controller
{
    public $title = 'Новости';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        Url::remember();
        $this->view->title = $this->title;

        $models = News::find()->asArray();

        $dataProvider = new ActiveDataProvider([
            'query' => $models,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
            ],
        ]);
        $this->view->params['breadcrumbs'][] = $this->view->title = 'Новости';

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionCreate()
    {
        $this->view->title = $this->title;

        $req = Yii::$app->request;

        /** @var $model News */
        $model = new News;
        if ($model->load($req->post())) {
            $dirName = 'uploads/news';

            $route = $dirName . '/';
            $dir = Yii::getAlias("@app/web/");
            $string = $route . rand(1, 100) . '' . date('YmdHis');

            $file = UploadedFile::getInstance($model, 'image');

            if ($file) {
                $model->image = $string;
                $sizes = getimagesize($file->tempName);
                $height = $sizes[1];
                $image = Image::getImagine();
                $sizePreview = new Box(259, 194);
                $sizeCard = new Box(450, $height);

                $image->open($file->tempName)
                    ->thumbnail($sizePreview)
                    ->save($dir . '/' . $string . '-preview.jpg', ['quality' => 100]);

                $image->open($file->tempName)
                    ->thumbnail($sizeCard)
                    ->save($dir . '/' . $string . '-card.jpg', ['quality' => 100]);

                $file->saveAs($dir . '/' . $string . '.jpg');
            }
            if ($model->save()) {
                return $this->redirect(['update', 'id' => $model->id]);
            } else {
                //чтобы видеть ошибку:
                Yii::warning($model->errors);
            }
        }
        $this->view->params['breadcrumbs'][] = $this->view->title = 'Добавить новость';

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $this->view->title = $this->title;

        $req = Yii::$app->request;

        /** @var $model News */
        $model = News::findOne($id);

        $oldFile = $model->image;

        if ($model->load($req->post())) {
            if (!$model->image) $model->image = $oldFile;
            $dirName = 'uploads/news';

            $route = $dirName . '/';
            $dir = Yii::getAlias("@app/web/");
            $string = $route . rand(1, 100) . '' . date('YmdHis');

            $file = UploadedFile::getInstance($model, 'image');

            if ($file) {
                $model->image = $string;
                $sizes = getimagesize($file->tempName);
                $height = $sizes[1];
                $image = Image::getImagine();
                $sizePreview = new Box(259, 194);
                $sizeCard = new Box(348, 231);

                $image->open($file->tempName)
                    ->thumbnail($sizePreview)
                    ->save($dir . '/' . $string . '-preview.jpg', ['quality' => 100]);

                $image->open($file->tempName)
                    ->thumbnail($sizeCard)
                    ->save($dir . '/' . $string . '-card.jpg', ['quality' => 100]);

                $file->saveAs($dir . '/' . $string . '.jpg');
            }
            if ($model->save()) {
                return $this->redirect(['update', 'id' => $model->id]);
            } else {
                //чтобы видеть ошибку:
                Yii::warning($model->errors);
            }
        }
        $this->view->params['breadcrumbs'][] = $this->view->title = 'Редактировать новость';

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        /** @var News $news */
        $news = News::findOne($id);

        if (!$news->delete()) throw new Exception(Json::encode($news->errors));

        return $this->redirect('index');
    }
}

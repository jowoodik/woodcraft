<?php
/**
 */

namespace app\modules\admin\controllers;

use app\modules\admin\models\SettingsMainPage;
use Exception;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;

class SettingsMainPageController extends Controller
{
    public $title = 'Настройки главной страницы';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error'   => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        Url::remember();
        $this->view->title = $this->title;

        $models = SettingsMainPage::find()->asArray();

        $dataProvider = new ActiveDataProvider([
            'query' => $models,
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

        /** @var $model SettingsMainPage */
        $model = new SettingsMainPage;
        if ($model->load($req->post())) {
            $dirName = 'uploads';

            $route = $dirName . '/';
            $dir = Yii::getAlias("@app/web/");
            if ($model->position == 'catalog-link') {
                $string = $route . 'price';
            } else {
                $string = $route . rand(1, 100) . '' . date('YmdHis');
            }


            $file = UploadedFile::getInstance($model, 'image');

            if ($file) {
                $model->image = $string;
                if ($model->position == 'catalog-link') {
                    $file->saveAs($dir . '/' . $string . '.xls');
                } else {
                    $file->saveAs($dir . '/' . $string . '.jpg');
                }
            }

            if ($model->save()) {
                    return $this->redirect(['update', 'id' => $model->id]);
                } else {
                    //чтобы видеть ошибку:
                    Yii::warning($model->errors);
                }
        }
        $this->view->params['breadcrumbs'][] = $this->view->title = 'Добавить настройку';

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $this->view->title = $this->title;

        $req = Yii::$app->request;

        /** @var $model SettingsMainPage */
        $model = SettingsMainPage::findOne($id);
        $oldFile = $model->image;

        if ($model->load($req->post())) {

            if (!$model->image) {
                $model->image = $oldFile;
            }
            $dirName = 'uploads';

            $route = $dirName . '/';
            $dir = Yii::getAlias("@app/web/");
            if ($model->position == 'catalog-link') {
                $string = $route . 'price';
            } else {
                $string = $route . rand(1, 100) . '' . date('YmdHis');
            }

            $file = UploadedFile::getInstance($model, 'image');

            if ($file) {
                $model->image = $string;
                if ($model->position == 'catalog-link') {
                    $file->saveAs($dir . '/' . $string . '.xls');
                } else {
                    $file->saveAs($dir . '/' . $string . '.jpg');
                }
            }
        }
        if ($model->save() && $req->post('btn-close')) {
            return $this->redirect($req->post('btn-close'));
        }
        $this->view->params['breadcrumbs'][] = $this->view->title = 'Редактировать настройку';

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        /** @var $model SettingsMainPage */
        $s = SettingsMainPage::findOne($id);

        if (!$s->delete()) {
            throw new Exception(Json::encode($s->errors));
        }

        return $this->redirect('index');
    }
}

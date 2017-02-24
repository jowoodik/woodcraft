<?php

namespace app\controllers;


use app\models\Applications;
use app\models\forms\LoginForm;
use /** @noinspection PhpMethodOrClassCallIsNotCaseSensitiveInspection */
    Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


class SiteController extends Controller
{
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
        return $this->render('index');
    }

    public function actionLogin()
    {
        $this->layout = 'clean';

        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/admin/default/index']);
        }
        $model = new LoginForm();

        $this->view->title = 'Авторизация';

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/admin/default/index']);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSendEmail()
    {
        $application = new Applications();
        $req = Yii::$app->request;

        if ($application->load($req->post())) {

            if ($application->save() && $application->contact()) {
                Yii::$app->session->setFlash('contactFormSubmitted');
            }
        }

        return $this->redirect('/katalog',302);
    }
}

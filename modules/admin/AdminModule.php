<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 25.03.2016
 * Time: 1:14
 */

namespace app\modules\admin;


use /** @noinspection PhpMethodOrClassCallIsNotCaseSensitiveInspection */
    Yii;
use yii\base\Module;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class AdminModule extends Module
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            return ArrayHelper::getValue(Yii::$app->user->identity, 'is_admin', false);
                        }
                    ]
                ],
            ],
        ];
    }

    public function init()
    {
        $this->layout = 'admin';

        parent::init();
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 23.05.2016
 * Time: 22:07
 */

namespace app\components;


use app\modules\admin\AdminModule;
use /** @noinspection PhpMethodOrClassCallIsNotCaseSensitiveInspection */
    Yii;
use yii\base\Component;

class Init extends Component
{
    public function init()
    {
        Yii::$app->setModules([
            'admin' => AdminModule::className(),
        ]);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 25.04.16
 * Time: 15:45
 */

namespace app\commands;


use app\models\Index;
use yii\console\Controller;

class IndexController extends Controller
{
    public function actionRoutes()
    {
        echo Index::routes() . "\n";
    }
}

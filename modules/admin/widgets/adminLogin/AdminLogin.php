<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 28.04.16
 * Time: 12:39
 */

namespace app\modules\admin\widgets\adminLogin;


use app\lib\App;
use yii\base\Widget;


class AdminLogin extends Widget
{
    public function run()
    {
        App::$currentRoute;

        //if (!App::$currentRoute) throw new NotFoundHttpException;

        //pree(App::$currentRoute);
        //pree($_SERVER);
        //$current = App::$currentRoute;
        $entity = App::$currentRoute['entity'];
        $entity_id = App::$currentRoute['entity_id'];

        return $this->render(
            'index', [
                'entity' => $entity,
                'entity_id' => $entity_id,
                //'current' => App::$currentRoute,
            ]
        );
    }

}
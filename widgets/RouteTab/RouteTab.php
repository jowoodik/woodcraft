<?php
/**
 * Created by PhpStorm.
 * User: danjudex
 * Date: 23.06.16
 * Time: 10:58
 */

namespace app\widgets\RouteTab;


use yii\bootstrap\ActiveForm;
use yii\bootstrap\Widget;

/**
 * Class RouteTab
 * @package app\widgets\RouteTab
 * @property ActiveForm $form
 */
class RouteTab extends Widget
{
    public $form;
    public $model;

    public function run()
    {
//        dd($this->form);
        return $this->render('route-tab', [
            'that' => $this
        ]);
    }
}

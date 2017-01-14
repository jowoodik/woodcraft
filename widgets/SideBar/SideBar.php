<?php

namespace app\widgets\SideBar;

use app\widgets\SideBar\SideBarAsset;
use yii\base\Widget;
use yii\helpers\Url;

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 04.05.16
 * Time: 14:20
 */
class SideBar extends Widget
{
    public $form;
    public $model;
    public $id;
    public $parent_id;

    public function run()
    {
        return $this->render('sideBar', [
            'model' => $this
        ]);
    }
}
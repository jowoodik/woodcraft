<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26.05.16
 * Time: 9:41
 * @noinspection SpellCheckingInspection
 */
namespace app\widgets\Elfinder;


use yii\base\Widget;

/** @noinspection SpellCheckingInspection */
class Elfinder extends Widget
{
    public function init()
    {
        ElfinderAsset::register($this->view);
    }

    public function run()
    {
        return $this->render('elfinder');
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26.05.16
 * Time: 9:41
 */

/** @noinspection SpellCheckingInspection */
namespace app\widgets\Elfinder;


use yii\jui\JuiAsset;
use yii\web\AssetBundle;

/** @noinspection SpellCheckingInspection */
class ElfinderAsset extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = __DIR__ . '/dist';

        $this->js = ['js/elfinder.full.js'];

        $this->css = ['css/elfinder.full.css'];

        $this->depends = [
            JuiAsset::className()
        ];
    }
}

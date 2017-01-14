<?php
namespace app\widgets\MainSlider;


use yii\web\YiiAsset;
use yii\web\AssetBundle;

class MainSliderAsset extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = __DIR__ . '/dist';

        $this->css = [
            'css/lightslider.css'
        ];
        $this->js = [
            'js/lightslider.min.js',
            'js/script.js'
        ];

        $this->depends = [
            YiiAsset::className(),
        ];
    }
}
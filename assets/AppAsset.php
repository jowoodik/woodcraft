<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\bootstrap\BootstrapAsset;
use yii\web\YiiAsset;
use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public function init()
    {
        $this->basePath = '@webroot';
        $this->baseUrl = '@web';

        $this->css = [
            'css/owl.carousel.min.css',
            'css/owl.theme.default.css',
            'css/style.css',
        ];

        $this->js = [
            'js/bootstrap.js',
            'js/owl.carousel.min.js',
            'js/script.js',
        ];

        $this->depends = [
            YiiAsset::className(),
            BootstrapAsset::className(),
        ];


    }
}

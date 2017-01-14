<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 25.03.2016
 * Time: 0:22
 */

namespace app\modules\admin\assets;


use yii\bootstrap\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

class AdminAsset extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = '@vendor/almasaeed2010/adminlte/dist';

        $this->css = [
            'css/AdminLTE.min.css',
            'css/skins/_all-skins.min.css',
        ];

        $this->js = [
            'js/app.min.js',
        ];

        $this->depends = [
            AdminStyleAsset::className(),
            YiiAsset::className(),
            BootstrapPluginAsset::className(),
            FontAwesomeAsset::className(),
            AdminPluginsAsset::className(),
        ];
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 25.03.2016
 * Time: 1:44
 */

namespace app\modules\admin\assets;


use yii\web\AssetBundle;

class AdminPluginsAsset extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = '@vendor/almasaeed2010/adminlte/plugins';

        $this->js = [
//            'fastclick/fastclick.min.js',
            'slimScroll/jquery.slimscroll.min.js',
        ];
    }
}
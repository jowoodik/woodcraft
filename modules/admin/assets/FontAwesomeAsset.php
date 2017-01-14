<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 25.03.2016
 * Time: 0:30
 */

namespace app\modules\admin\assets;


use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = '@vendor/fortawesome/font-awesome';

        $this->css = ['css/font-awesome.min.css'];
    }
}
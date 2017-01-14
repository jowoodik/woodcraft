<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 28.04.16
 * Time: 10:03
 */

namespace app\widgets\popup;


class MagnificPopupAsset extends \yii\web\AssetBundle
{
    public function init()
    {
        $this->sourcePath = __DIR__ . '/assets';
        $this->js = [
            'js/jquery.magnific-popup.js',
        ];
        $this->css = [
            'css/magnific-popup.css'
        ];
        $this->depends = [
            'yii\web\JqueryAsset',
        ];
    }
}
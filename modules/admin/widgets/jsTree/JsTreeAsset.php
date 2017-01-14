<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 11.05.16
 * Time: 17:24
 */

namespace app\modules\admin\widgets\jsTree;


use yii\web\AssetBundle;

class JsTreeAsset extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = __DIR__ . '/dist';

        $this->js = [
            'js/jstree.js',
           
        ];
        
        $this->css = [
            'themes/default/style.css'
        ];
        
        $this->depends = [
            'yii\web\JqueryAsset',
        ];
    }
}
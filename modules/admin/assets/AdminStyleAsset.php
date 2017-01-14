<?php
/**
 * Created by PhpStorm.
 * User: mt4
 * Date: 31.03.16
 * Time: 14:08
 */

namespace app\modules\admin\assets;


use yii\web\AssetBundle;

class AdminStyleAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/dist';

    public $css = [
        'css/admin.css',
        'css/zambAdmin.css'
    ];
}

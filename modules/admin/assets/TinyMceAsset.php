<?php
/**
 * Created by PhpStorm.
 * User: mt4
 * Date: 31.03.16
 * Time: 15:39
 */

namespace app\modules\admin\assets;

use yii\web\AssetBundle;

class TinyMceAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/admin.css',
    ];
    public $js = [
        'js/tinymce/tinymce.min.js'
    ];
}
<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22.03.16
 * Time: 12:22
 */

namespace app\modules\admin\widgets\editor;


use yii\web\AssetBundle;

class TinyMceAsset extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = '@bower/tinymce-dist';

        $this->js = ['tinymce.min.js'];
    }
}
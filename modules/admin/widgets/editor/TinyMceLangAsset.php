<?php
/**
 * @copyright Copyright (c) 2013-2015 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace app\modules\admin\widgets\editor;


use yii\web\AssetBundle;

class TinyMceLangAsset extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = __DIR__ . '/dist';
        
        $this->js = ['langs/ru.js'];

        $this->depends = [TinyMceAsset::className()];
    }
}

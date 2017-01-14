<?php

namespace app\widgets\DataTable;


use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class DataTableAsset extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = __DIR__ . '/dist';
        $this->js = ['js/jquery.dataTables.min.js', 'js/dataTables.rowReorder.min.js'];
        $this->css = ['css/jquery.dataTables.css', 'css/rowReorder.dataTables.min.css'];

        $this->depends = [
            JqueryAsset::className(),
        ];
    }
}
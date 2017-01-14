<?php

namespace app\widgets\CatalogItems;


use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class CatalogItemsAsset extends AssetBundle
{
    public function init()
    {
        $this->depends = [
            JqueryAsset::className(),
        ];
    }
}
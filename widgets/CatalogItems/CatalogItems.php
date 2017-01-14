<?php

namespace app\widgets\CatalogItems;


use yii\base\Widget;

class CatalogItems extends Widget
{
    public $items = [];

    public function init()
    {
        $this->view->registerAssetBundle(CatalogItemsAsset::className());
    }

    public function run()
    {
        return $this->render('index', array(
            'items' => $this->items,
        ));
    }
}

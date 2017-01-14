<?php
namespace app\widgets\MainSlider;


use yii\base\Widget;

class MainSlider extends Widget
{
    public $items = [];
    
    public function init()
    {
        $this->view->registerAssetBundle(MainSliderAsset::className());
    }

    public function run()
    {
        return $this->render('index', [
            'items' => $this->items,
        ]);
    }
}

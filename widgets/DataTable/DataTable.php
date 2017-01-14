<?php

namespace app\widgets\DataTable;


use yii\base\Widget;

class DataTable extends Widget
{
    public $ajax;
    public $columns;
    public $urlUpdate;

    public function init()
    {
        $this->view->registerAssetBundle(DataTableAsset::className());
    }

    public function run()
    {

        foreach ($this->columns as $key => $item)
        {
            $dataColumn[] = ["data" => $key];
        }
        $this->view->registerJs($this->render('data-table.js',
            [
                'columns' => json_encode($dataColumn),
                'ajax' => $this->ajax,
                'urlUpdate' => $this->urlUpdate
            ]));

        return $this->render('index', array(
            'model' => $this,
        ));
    }
}

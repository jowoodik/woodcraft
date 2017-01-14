<?php
/**
 * Created by PhpStorm.
 * User: mt4
 * Date: 11.05.2016
 * Time: 10:49
 */

namespace app\modules\admin\widgets\jsTree;

use yii\base\Widget;
use yii\helpers\Json;

class jsTree extends Widget
{
    public $params;   

    public function init()
    {
        /* jsTreeAsset::register($this->view);
         parent::init();*/
        $this->view->registerAssetBundle(JsTreeAsset::className());
    }

    public function run()
    {
        $html = $this->render('tree', [
            'id' => $this->id,
            'params' => Json::encode($this->params),           
        ]);

        return $html;
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 18.01.2016
 * Time: 12:56
 */

namespace app\modules\admin\models;


use yii\behaviors\TimestampBehavior;

class Slider extends \app\models\Slider
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 18.01.2016
 * Time: 12:56
 */

namespace app\modules\admin\models;


use yii\behaviors\TimestampBehavior;

class News extends \app\models\News
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
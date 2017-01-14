<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 18.01.2016
 * Time: 12:56
 */

namespace app\modules\admin\models;


use app\behaviors\RouteBehavior;
use app\models\Entity;
use yii\behaviors\TimestampBehavior;


class GalleryItem extends \app\models\GalleryItem
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}

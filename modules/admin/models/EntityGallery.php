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


/**
 * Class Gallery
 * @package app\modules\admin\models
 * @property $title;
 * @property $alias;
 * @property $pid;
 * @property $description
 * @property $is_active;
 * @property $meta_title;
 * @property $meta_description;
 * @property $meta_keywords;
 */
class EntityGallery extends \app\models\EntityGallery
{
    public function transactions()
    {
        return [
            'default' => self::OP_INSERT | self::OP_UPDATE | self::OP_DELETE,
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => RouteBehavior::className(),
                'entity' => Entity::ENTITY_GALLERY,
            ],
            TimestampBehavior::className(),
        ];
    }

    public static function getGalleryList()
    {
        return EntityGallery::find()
            ->asArray()
            ->select([
                'gallery.id',
                'gallery.route_id',
                'routes.title as title'
            ])
            ->from('gallery')
            ->innerJoin('routes', 'routes.id = gallery.route_id')
            ->all();
    }
}

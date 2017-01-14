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
use app\models\EntityCatalogCategories;


/**
 * Class CatalogCategories
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
class CatalogCategories extends EntityCatalogCategories
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
                'entity' => Entity::ENTITY_CATALOG_CATEGORIES,
            ],
            
        ];
    }
}

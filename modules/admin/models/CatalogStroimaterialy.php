<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22.04.16
 * Time: 10:58
 */

namespace app\modules\admin\models;


use app\behaviors\RouteBehavior;
use app\models\Entity;
use app\models\EntityCatalogProizvodstvo;
use app\models\EntityCatalogStroimaterialy;

class CatalogStroimaterialy extends EntityCatalogStroimaterialy
{
    public function behaviors()
    {
        return [
            [
                'class' => RouteBehavior::className(),
                'entity' => Entity::ENTITY_CATALOG_STROIMATERIALY,
            ],
        ];
    }
}

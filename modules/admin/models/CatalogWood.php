<?php

namespace app\modules\admin\models;


use app\behaviors\RouteBehavior;
use app\models\Entity;
use app\models\EntityCatalogWood;

class CatalogWood extends EntityCatalogWood
{
    public function behaviors()
    {
        return [
            [
                'class' => RouteBehavior::className(),
                'entity' => Entity::ENTITY_CATALOG_WOOD,
            ],
        ];
    }
}

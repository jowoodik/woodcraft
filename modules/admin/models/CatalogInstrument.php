<?php

namespace app\modules\admin\models;


use app\behaviors\RouteBehavior;
use app\models\Entity;
use app\models\EntityCatalogInstrument;

class CatalogInstrument extends EntityCatalogInstrument
{
    public function behaviors()
    {
        return [
            [
                'class' => RouteBehavior::className(),
                'entity' => Entity::ENTITY_CATALOG_INSTRUMENT,
            ],
        ];
    }
}

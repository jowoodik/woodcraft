<?php

namespace app\models;

use app\behaviors\RouteBehavior;
use yii\behaviors\TimestampBehavior;

class EntityGallery extends BaseEntityGallery
{

    public function getActiveItems()
    {
        return $this->hasMany(GalleryItem::className(), ['gallery_id' => 'id'])
            ->where(['is_active' => true]);
    }

    use EntityTrait;

    public $breadcrumbs;

    public $gallery;

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

    public function attach()
    {
        $this->breadcrumbs = Route::getBreadCrumbs($this->route['refs']);

        $query = self::find()
            ->asArray()
            ->where(['id' => $this->entity_id])
            ->with(['route', 'activeItems']);
        $this->gallery = $query->one();
    }
}

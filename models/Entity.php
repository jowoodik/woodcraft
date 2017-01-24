<?php

namespace app\models;


use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class Entity
{
    const ENTITY_PAGE = 1;
    const ENTITY_GALLERY = 2;
    const ENTITY_CATALOG_INSTRUMENT = 3;
    const ENTITY_CATALOG_WOOD = 4;
    const ENTITY_CATALOG_CATEGORIES = 5;
    const ENTITY_REQUEST = 6;
    const ENTITY_SERVICES = 7;

    public static function getEntityData($entity = null)
    {
        $data = [
            self::ENTITY_PAGE                   => [
                'class'      => EntityPage::className(),
                'name'       => 'Страница',
                'controller' => 'page',
                'icon'       => 'fa fa-file-text',
            ],
            self::ENTITY_GALLERY                => [
                'class'      => EntityGallery::className(),
                'name'       => 'Галерея',
                'controller' => 'gallery',
                'icon'       => 'fa fa-camera-retro',
            ],
            self::ENTITY_CATALOG_INSTRUMENT   => [
                'class'      => EntityCatalogInstrument::className(),
                'name'       => 'Каталог Инструментов',
                'controller' => 'catalog-instrument',
                'icon'       => 'fa fa-building',
            ],
            self::ENTITY_CATALOG_WOOD => [
                'class'      => EntityCatalogWood::className(),
                'name'       => 'Деревообрабатывающее оборудование',
                'controller' => 'catalog-wood',
                'icon'       => 'fa fa-building',
            ],
            self::ENTITY_CATALOG_CATEGORIES     => [
                'class'      => EntityCatalogCategories::className(),
                'name'       => 'Страница продукции',
                'controller' => 'catalog-categories',
                'icon'       => 'fa fa-cube',
            ],
            self::ENTITY_REQUEST                => [
                'class'      => EntityCatalogCategories::className(),
                'name'       => 'Заявка',
                'controller' => 'request',
                'icon'       => 'fa fa-file-image-o jstree-themeicon-custom',
            ],
            self::ENTITY_SERVICES               => [
                'class'      => EntityServices::className(),
                'name'       => 'Каталог Услуг',
                'controller' => 'services',
                'icon'       => 'fa fa-file-image-o jstree-themeicon-custom',
            ],
        ];

        return $entity ? $data[$entity] : $data;
    }

    /**
     * @param $entity
     * @return ActiveRecord | EntityTrait
     */
    public static function className($entity)
    {
        return self::getEntityData($entity)['class'];

    }

    public static function getEntityController($entity)
    {
        return self::getEntityData($entity)['controller'];
    }

    public static function getEntityIcon($entity)
    {
        $icon = self::getEntityData($entity)['icon'];

        return "<i class='$icon' aria-hidden='true'></i>";
    }

    public static function getEntityIconClass($entityId)
    {
        $icon = self::getEntityData($entityId)['icon'];

        return $icon;
    }

    public static function getEntityIcons($entityId)
    {
        return ArrayHelper::getColumn(self::getEntityData($entityId), 'icon');
    }

    /**
     * @param $entity
     * @param $entity_id
     * @return EntityTrait
     */
    public static function getEntityModel($entity, $entity_id)
    {
        $class = self::className($entity);

        /** @var EntityTrait $model */
        $model = new $class([
            'entity_id' => $entity_id,
        ]);

        return $model;
    }

    public static function findEntity($entity, $entity_id)
    {
        /** @var $class BaseActiveRecord */
        $class = self::className($entity);

        return $class::findOne($entity_id);
    }

    public static function getEntityUpdateUrl($entity, $entity_id)
    {
        $controller = self::getEntityController($entity);

        return Url::to(["$controller/update", 'id' => $entity_id]);
    }

    public static function getEntityCreateUrl($entity, $pid = null)
    {
        $controller = self::getEntityController($entity);

        return Url::to(["$controller/create", 'parent_id' => $pid]);
    }

    public static function getEntityCreateUrlList()
    {
        $items = [];

        foreach (self::getEntityData() as $entity => $data) {

            $url = self::getEntityCreateUrl($entity);
            $items[] = ['label' => $data['name'], 'url' => $url];
        }

        return $items;
    }

    public static function getEntityDeleteUrl($route_id)
    {
        return Url::to(["/admin/routes/delete", 'id' => $route_id]);
    }
}

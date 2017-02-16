<?php
/**
 * @var $this yii\web\View
 * @var app\models\EntityCatalogStroimaterialy $model
 */

use app\lib\My;
use app\models\Entity;
use app\models\Route;

//$this->registerMetaTag(['name' => 'title', 'content' => strip_tags($model['route']['meta_title'])]);
$this->registerMetaTag(['name' => 'description', 'content' => strip_tags($model['route']['meta_description'])]);
$this->registerMetaTag(['name' => 'keywords', 'content' => strip_tags($model['route']['meta_keywords'])]);

$routes = Route::find()
    ->asArray()
    ->select([
        'route.*',
        'route_index.*',
        'entity_catalog_categories.*'
    ])
    ->where(['parent_id' => $model['route_id']])
    ->andWhere(['entity' => Entity::ENTITY_CATALOG_CATEGORIES])
    ->innerJoin('route_index', 'route_index.route_id = route.id')
    ->innerJoin('entity_catalog_categories', 'entity_catalog_categories.route_id = route.id')
    ->orderBy('entity_catalog_categories.id')
    ->all();
?>

    <h1 class="text-uppercase">Каталог</h1>

<?php if (isset($routes) && !empty($routes)) : ?>
    <?php foreach ($routes as $route) : ?>
        <div class="col-md-4 col-sm-6">
<div class="item">
            <?php if (!empty($route['image'])) { ?>
                <a class="block" href="<?= $route['path'] ?>">
                    <?= $route['title'] ?>
                </a>
                <a href="<?= $route['path'] ?>" class="img-href">
                    <div class="img-wrapper">
                        <img src="/<?= $route['image'] . '.jpg' ?>" class="img-responsive"/>
                    </div>
                </a>
            <?php } else { ?>
                <a href="<?= $route['path'] ?>">
                    <img src="/uploads/no-image.jpg" class="my-thumb"/>
                </a>
            <?php } ?>
        </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
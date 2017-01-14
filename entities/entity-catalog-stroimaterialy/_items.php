<?php
/**
 * @var $this yii\web\View
 * @var app\models\EntityCatalogStroimaterialy $model
 */

use app\lib\My;
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
    ->andWhere(['entity' => 5])
    ->innerJoin('route_index', 'route_index.route_id = route.id')
    ->innerJoin('entity_catalog_categories', 'entity_catalog_categories.route_id = route.id')
    ->orderBy('entity_catalog_categories.id')
    ->all();
?>

    <h1 class="text-uppercase">Стройматериалы</h1>
    <div class="description">В качестве генподрядной организации мы оказываем весь спектр
        строительных услуг от этапа подготовительных работ до ввода объекта в эксплуатацию и
        специализируемся на проведении проектных работ, монолитных работ, кровельных работ,
        отделочных работ, работ по устройству инженерных систем и коммуникаций.
    </div>

<?php if (isset($routes) && !empty($routes)) : ?>
    <?php foreach ($routes as $route) : ?>
        <div class="col-md-4 col-sm-6 col-xs-12 thumb-wrapper">
            <a href="<?= $route['path'] ?>">
                <img src="/<?= $route['image'] . '-preview-stroi.jpg' ?>" class="my-thumb" alt="">
            </a>
            <div class="dark-block">
                <?= $route['title'] ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<?php
/**
 * @var $this yii\web\View
 * @var \app\models\EntityCatalogCategories $model
 */

use app\lib\My;
use app\models\Route;
use app\widgets\popup\MagnificPopup;
use app\widgets\SideBar\SideBar;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

$this->params['breadcrumbs'] = $model->breadcrumbs;
$this->title = $model['route']['title'];

$routes = Route::find()
    ->asArray()
    ->select([
        'route.*',
        'route_index.*',
        'entity_catalog_categories.*'
    ])
    ->where(['parent_id' => $model['page']['route_id']])
    ->andWhere(['entity' => 5])
    ->innerJoin('route_index', 'route_index.route_id = route.id')
    ->innerJoin('entity_catalog_categories', 'entity_catalog_categories.route_id = route.id')
    ->orderBy('entity_catalog_categories.id')
    ->all();

//$this->registerMetaTag(['name' => 'title', 'content' => strip_tags($model['route']['meta_title'])]);
$this->registerMetaTag(['name' => 'description', 'content' => strip_tags($model['route']['meta_description'])]);
$this->registerMetaTag(['name' => 'keywords', 'content' => strip_tags($model['route']['meta_keywords'])]);

?>
<div class="row">
    <div class="catalog-page">
        <?php
        echo SideBar::widget([
            'id' => $model['route']['id'],
            'parent_id' => $model['route']['parent_id']
        ]);
        $col=9;
        ?>
        <div class="page-sidebar col-md-<?= isset($col) ? 9 : 12 ?> col-xs-12">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <div class="title">
                <?= $model['route']['title'] ?>
            </div>
            <div class="row">
                <?php if (isset($routes) && !empty($routes)) { ?>
                <?php foreach ($routes as $i => $route) : ?>
                <?php if ($i && !($i % 3)): ?></div>
            <div class="row"><?php endif; ?>
                <?= $this->render('product-list', ['route' => $route]); ?>
                <?php endforeach; ?>
                <?php } else { ?>
                    <?= $this->render('product-card', ['model' => $model]); ?>
                    <div class="block-text">
                        <?= $model['page']['text'] ?>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>

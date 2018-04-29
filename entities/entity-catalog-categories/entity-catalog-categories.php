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

$this->registerMetaTag(['name' => 'title', 'content' => strip_tags($model['route']['meta_title']) ? strip_tags($model['route']['meta_title']) : '']);
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
        $col = 9;
        ?>
        <div class="page-sidebar col-md-<?= isset($col) ? 9 : 12 ?> col-xs-12">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <h1 class="title">
                <?= $model['route']['h1'] ? $model['route']['h1'] : $model['route']['title']?>
            </h1>
                <?php if (isset($routes) && !empty($routes)) { ?>
                <?php foreach ($routes as $i => $route) : ?>
                <?= $this->render('product-list', ['route' => $route]); ?>
                <?php endforeach; ?>
                <?php } else { ?>
                    <?= $this->render('product-card', ['model' => $model]); ?>
                        <div class="col-md-4 col-sm-12">
                            <div>
                                <span class="btn btn-green"><span class="glyphicon glyphicon-ruble"></span><span class="align-top">Цена: <?= $model['page']['price'] ?> руб.</span></span>
                            </div>
                            <button type="button" id="make-order" data-toggle="modal" data-target="#orderModal" data-name="<?=$model['route']['title']?>" data-price="<?= $model['page']['price'] ?>">
                                <span class="btn btn-green"><span class="glyphicon glyphicon-shopping-cart"></span>Заказать</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="block-text">
                            <?= $model['page']['text'] ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

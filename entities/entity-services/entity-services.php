<?php
/**
 * @var $this yii\web\View
 * @var app\models\EntityServices $model
 */

use app\widgets\SideBar\SideBar;

$services = \app\models\Route::find()
    ->asArray()
    ->alias('r')
    ->select(['r.*', 'ri.*','ecc.*'])
    ->andWhere(['parent_id' => $model->route_id])
    ->joinWith(['routeIndex ri', 'entityCatalogCategories ecc'])
    ->all();

$this->title = 'Услуги';
$this->params['breadcrumbs'] = $model->breadcrumbs;
$this->params['h1'] = $this->title;
?>

<?php echo SideBar::widget([
]); ?>
<div class="col-md-9 col-xs-12 content-wrapper">
    <div class="catalog-page service">
        <?= $this->render('_items', ['services' => $services, 'model' => $model]) ?>
    </div>
</div>


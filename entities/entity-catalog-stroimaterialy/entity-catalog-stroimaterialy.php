<?php
/**
 * @var $this yii\web\View
 * @var app\models\EntityCatalogStroimaterialy $model
 */

use app\widgets\SideBar\SideBar;

$this->title = 'Стройматериалы';
$this->params['breadcrumbs'] = $model->breadcrumbs;
$this->params['h1'] = $this->title;
?>
<?php echo SideBar::widget([
]); ?>
<div class="col-md-9 col-xs-12 content-wrapper">
    <div class="catalog-page">
        <?= $this->render('_items', ['model' => $model]) ?>
    </div>
</div>


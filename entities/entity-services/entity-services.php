<?php
/**
 * @var $this yii\web\View
 * @var app\models\EntityServices $model
 */

use app\widgets\SideBar\SideBar;

$this->title = 'Услуги';
$this->params['breadcrumbs'] = $model->breadcrumbs;
$this->params['h1'] = $this->title;
?>
<!--<div class="block-title pull-left">--><? //= $this->title ?><!--</div>-->
<!--<hr class="block-hr">-->
<?php echo SideBar::widget([
]); ?>
<div class="col-md-9 col-xs-12 content-wrapper">
    <div class="catalog-page service">
        <?= $this->render('_items', ['model' => $model]) ?>
    </div>
</div>


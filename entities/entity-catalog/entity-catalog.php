<?php
/**
 * @var $this yii\web\View
 * @var app\models\EntityCatalog $model
 */

$this->title = 'Каталог';
$this->params['breadcrumbs'] = $model->breadcrumbs;
$this->params['h1'] = $this->title;
?>
<div class="block-title pull-left"><?= $this->title ?></div>
<hr class="block-hr">
<div class="catalog">
    <?= $this->render('_items', ['model' => $model]) ?>
</div>


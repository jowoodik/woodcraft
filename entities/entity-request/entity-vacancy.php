<?php
/**
 * @var $this yii\web\View
 * @var app\models\EntityPage $model
 */

$this->title = 'Заявка';
$this->params['breadcrumbs'] = $model->breadcrumbs;
$this->params['h1'] = $this->title;

?>
<div class="block-title pull-left"><?= $this->title ?></div>
<hr class="block-hr">

<div class="vacancy">
    <?= $this->render('_items', ['model' => $model]) ?>
</div>

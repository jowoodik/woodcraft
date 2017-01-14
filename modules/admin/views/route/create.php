<?php
/**
 * @var $this yii\web\View
 * @var $model
 */
use yii\grid\GridView;
use yii\helpers\Html;

$this->params['h1'] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-body">
                <?= $this->render('_form', ['model' => $model]) ?>
            </div>
        </div>
    </div>
</div>

<?php
/**
 * @var \yii\web\View $this
 * @var $content
 */
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="clearfix">
            <?= $this->title ? Html::tag('h1', Html::encode($this->title)) : null ?>

            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'homeLink' => ['label' => 'Панель управления', 'url' => ['/admin/default/index']],
            ]) ?>
        </div>
    </section>

    <!-- Main content -->
    <section class="content body">
        <?= $content ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->params['h1'] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <p>
                    <a href="<?=Url::to(['create'])?>" class="btn btn-success" style="background-color: #dd4b39;border-color: #dd4b39;">Добавить</a>
                </p>
            </div>
            <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'title' => [
                            'attribute' => 'Заголовок',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a($data['title'], ['update', 'id' => $data['id']]);
                            }
                        ],
                        'status' => [
                            'attribute' => 'Статус',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return $data['status'] ? 'Опубликовано' : 'Не опубликовано';
                            }
                        ],
                        'delete' => [
                            'attribute' => 'Удалить',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i>', ['delete', 'id' => $data['id']]);
                            }
                        ]
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>

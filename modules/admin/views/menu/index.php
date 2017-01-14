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
                <a href="<?=Url::to(['create'])?>" class="btn btn-success" style="background-color: #dd4b39;border-color: #dd4b39;">Добавить</a>
            </div>
            <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'title' => [
                            'attribute' => 'Название пункта меню',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a($data['route']['title'], ['update', 'id' => $data['id']]);
                            }
                        ],
                        'alias' => [
                            'attribute' => 'Алиас пункта меню',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a($data['route']['alias'], ['update', 'id' => $data['id']]);
                            }
                        ],
                        'position' => [
                            'attribute' => 'Местоположение пункта меню',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a($data['position'], ['update', 'id' => $data['id']]);
                            }
                        ],
                        'sort' => [
                            'attribute' => 'Номер п/п - отображение порядка пункта меню',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a($data['sort'], ['update', 'id' => $data['id']]);
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

<?php
/**
 *
 * @var \yii\data\ActiveDataProvider $dataProvider
 */

use yii\grid\GridView;
use yii\helpers\Html;

$this->params['h1'] = 'Галереи';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body">
                <p>
                    <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-danger']) ?>
                </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'title' => [
                            'attribute' => 'Заголовок',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a($data['route']['title'], ['update', 'id' => $data['id']]);
                            }
                        ],
                        'alias' => [
                            'attribute' => 'Алиас',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a($data['route']['alias'], ['update', 'id' => $data['id']]);
                            }
                        ],
                        'description' => [
                            'attribute' => 'Описание',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a($data['description'], ['gallery-update', 'id' => $data['id']]);
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

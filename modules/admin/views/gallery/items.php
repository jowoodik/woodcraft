<?php
/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 */
use yii\grid\GridView;
use yii\helpers\Html;

$this->params['h1'] = 'Изображения в галереях';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body">
                <p>
                    <?= Html::a('Добавить', ['item-create'], ['class' => 'btn btn-danger']) ?>
                </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns'      => [
                        'image'      => [
                            'attribute' => 'Изображение',
                            'format'    => 'raw',
                            'value'     => function ($data) {
                                return Html::a($data['name'], ['item-update', 'id' => $data['id']]);
                            }
                        ],
                        'gallery_id' => [
                            'attribute' => 'Галерея',
                            'format'    => 'raw',
                            'value'     => function ($data) {
                                return Html::a($data['gallery_id'], ['item-update', 'id' => $data['id']]);
                            }
                        ],
                        'is_active'  => [
                            'attribute' => 'Опубликовано',
                            'format'    => 'raw',
                            'value'     => function ($data) {
                                return $data['is_active'] ? 'Опубликовано' : 'Не опубликовано';
                            }
                        ],
                        'delete'     => [
                            'attribute' => 'Удалить',
                            'format'    => 'raw',
                            'value'     => function ($data) {
                                return Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i>',
                                    ['item-delete', 'id' => $data['id']]);
                            }
                        ]
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>

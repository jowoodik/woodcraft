<?php
/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\admin\lib\My;

$this->params['h1'] = $this->title;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'user_name' => [
                            'attribute' => 'ФИО заказчика',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a($data['user_name'], ['update', 'id' => $data['id']]);
                            }
                        ],
                        'user_email' => [
                            'attribute' => 'Email',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a($data['user_email'], ['update', 'id' => $data['id']]);
                            }
                        ],
                        'user_telephone' => [
                            'attribute' => 'Номер телефона',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a($data['user_telephone'], ['update', 'id' => $data['id']]);
                            }
                        ],
                        'created_at' => [
                            'attribute' => 'Дата получения заявки',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::a(Yii::$app->formatter->asDatetime($data['created_at']), ['update', 'id' => $data['id']]);
                            }
                        ],
                        'status' => [
                            'attribute' => 'Статус',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return $data['status'] ? 'Обработана' : 'Не обработана';
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

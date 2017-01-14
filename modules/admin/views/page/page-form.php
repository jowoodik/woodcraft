<?php
/**
 * @var $this yii\web\View
 * @var $model
 */
use app\modules\admin\lib\My;
use app\widgets\RouteTab\RouteTab;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Tabs;

?>
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body">
                <?php

                $form = ActiveForm::begin([
                    'options' => [
                        'enctype' => 'multipart/form-data',
                    ]
                ]);

                echo Tabs::widget([
                    'items' => [
                        [
                            'label' => 'Маршрут',
                            'content' => RouteTab::widget([
                                'form' => $form,
                                'model' => $model,
                            ]),
                        ],
                        [
                            'label' => 'Страница',
                            'content' => $this->render('_page-form', [
                                'form' => $form,
                                'model' => $model,
                            ]),
                        ],
                    ]
                ]);

                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</div>

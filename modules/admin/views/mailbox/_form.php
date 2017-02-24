<?php
/**
 * @var $this yii\web\View
 * @var $model
 */
use app\models\Settings;
use app\modules\admin\lib\My;
use app\modules\admin\widgets\editor\TinyMce;
use yii\bootstrap\ActiveForm;
use mihaildev\elfinder\InputFile;
use yii\helpers\Html;

$form = ActiveForm::begin([
    'options' => [
        'enctype' => 'multipart/form-data',
    ]
]);

echo $form->field($model, 'user_name')->textInput(['autofocus' => false, 'placeholder' => 'Не указано', 'class' => 'form-control message', 'readonly' => true])->label('Имя отправителя');
echo $form->field($model, 'user_telephone')->textInput(['placeholder' => 'Не указано', 'class' => 'form-control message', 'readonly' => true])->label('Номер телефона');
echo $form->field($model, 'user_email')->textInput(['placeholder' => 'Не указано', 'class' => 'form-control message', 'readonly' => true])->label('e-mail');
echo $form->field($model, 'outer_length')->textInput(['placeholder' => 'Не указано', 'class'=>'form-control message', 'readonly'=>true])->label('Цена товара');
echo $form->field($model, 'file_route')->textInput(['placeholder' => 'Не указано', 'class' => 'form-control message', 'readonly' => true])->label('Название товара');
echo $form->field($model, 'build_foundation')->textInput(['placeholder' => 'Не указано', 'class' => 'form-control message', 'readonly' => true])->label('Комментарий');


echo $form->field($model, 'status')->checkbox()->label('Обработана');

echo My::buttons(['delete', 'id' => $model->id], ['index'], $model->isNewRecord);

ActiveForm::end();

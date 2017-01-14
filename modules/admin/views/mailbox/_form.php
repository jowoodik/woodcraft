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
echo $form->field($model, 'user_company')->textInput(['placeholder' => 'Не указано', 'class' => 'form-control message', 'readonly' => true])->label('Компания');
echo $form->field($model, 'user_telephone')->textInput(['placeholder' => 'Не указано', 'class' => 'form-control message', 'readonly' => true])->label('Номер телефона');
echo $form->field($model, 'user_email')->textInput(['placeholder' => 'Не указано', 'class' => 'form-control message', 'readonly' => true])->label('e-mail');
echo $form->field($model, 'outer_length')->textInput(['placeholder' => 'Не указано', 'class'=>'form-control message', 'readonly'=>true])->label('Длина наружняя');
echo $form->field($model, 'outer_width')->textInput(['placeholder' => 'Не указано', 'class'=>'form-control message', 'readonly'=>true])->label('Ширина наружняя');
echo $form->field($model, 'outer_height')->textInput(['placeholder' => 'Не указано', 'class'=>'form-control message', 'readonly'=>true])->label('Высота наружняя');
echo $form->field($model, 'inner_length')->textInput(['placeholder' => 'Не указано', 'class'=>'form-control message', 'readonly'=>true])->label('Длина внутренняя');
echo $form->field($model, 'inner_width')->textInput(['placeholder' => 'Не указано', 'class'=>'form-control message', 'readonly'=>true])->label('Ширина внутренняя');
echo $form->field($model, 'inner_height')->textInput(['placeholder' => 'Не указано', 'class'=>'form-control message', 'readonly'=>true])->label('Высота внутренняя');

echo $form->field($model, 'build_appointment')->textInput(['placeholder' => 'Не указано', 'class' => 'form-control message', 'readonly' => true])->label('Назначение здания');
echo $form->field($model, 'build_foundation')->textInput(['placeholder' => 'Не указано', 'class' => 'form-control message', 'readonly' => true])->label('Фундамент здания');

if (!empty($model->file_route)){
    echo Html::a('Скачать пользовательский файл<span class="glyphicon glyphicon-save-file"></span>', ['download', 'id' => $model->id], ['class' => 'btn btn-primary', 'id' => 'download-file']);
}

echo $form->field($model, 'status')->checkbox()->label('Обработана');

echo My::buttons(['delete', 'id' => $model->id], ['index'], $model->isNewRecord);

ActiveForm::end();

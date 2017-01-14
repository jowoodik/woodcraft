<?php

use app\modules\admin\lib\My;
use app\modules\admin\widgets\alias\GenerateAlias;
use app\modules\admin\widgets\editor\TinyMce;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use yii\helpers\Html;
use yii\web\JsExpression;

/**
 * @var $this yii\web\View
 * @var $model
 */
$form = ActiveForm::begin([
    'options' => [
        'enctype' => 'multipart/form-data',
    ]
]);

echo $form->field($model, 'title')->label('Заголовок');

echo $form->field($model, 'text')->textarea(['rows' => 5])->label('Текст');

echo $form->field($model, 'link')->label('Ссылка');

echo $form->field($model, 'image')->widget(FileInput::classname(), [
    'options'       => ['accept' => 'image/*'],
    'pluginOptions' => [
        'allowedFileExtensions'  => ['jpg', 'jpeg', 'gif', 'png', 'bmp'],
        'initialPreviewFileType' => 'image',
        'previewFileType'        => 'image',
        'showUpload'             => false,
        'initialPreview'         => [
            $model->image ? Html::img('/' . $model->image . '.jpg', ['class' => 'img-small img-preview']) : null,
            // checks the models to display the preview
        ],
        'overwriteInitial'       => false,
    ],

])->label('Изображение');

echo $form->field($model, 'status')->checkbox()->label('Опубликовано');

echo My::buttons(['delete', 'id' => $model->id], ['index'], $model->isNewRecord);

ActiveForm::end();

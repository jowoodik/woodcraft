<?php

/**
 * @var $this yii\web\View
 * @var $model
 */
use app\modules\admin\lib\My;
use app\modules\admin\widgets\alias\GenerateAlias;
use app\modules\admin\widgets\editor\TinyMce;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use yii\helpers\Html;
use yii\web\JsExpression;

$form = ActiveForm::begin([
    'options' => [
        'enctype' => 'multipart/form-data',
    ]
]);

echo $form->field($model, 'title')->label('Заголовок');

echo $form->field($model, 'alias')->widget(GenerateAlias::className(), [
    'depends' => 'title',
])->label('Алиас');

echo $form->field($model, 'short_text')->label('Вступление');

echo $form->field($model, 'text')->widget(TinyMce::className())->label('Текст');

echo $form->field($model, 'image')->widget(FileInput::classname(), [
    'options'       => ['accept' => 'image/*'],
    'pluginOptions' => [
        'allowedFileExtensions'  => ['jpg', 'gif', 'png', 'bmp'],
        'showUpload'             => false,
        'showRemove'             => true,
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

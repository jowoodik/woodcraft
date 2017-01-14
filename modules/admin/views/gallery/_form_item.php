<?php
/**
 * @var $this yii\web\View
 * @var $model
 */
use app\models\Entity;
use app\modules\admin\lib\My;
use app\modules\admin\models\EntityGallery;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use mihaildev\elfinder\InputFile;
use yii\helpers\Html;

$form = ActiveForm::begin([
    'options' => [
        'enctype' => 'multipart/form-data',
    ]
]);

echo $form->field($model, 'name')->label('Название изображения');

echo $form->field($model, 'gallery_id')
    ->dropDownList(\yii\helpers\ArrayHelper::map(EntityGallery::find()->all(), 'id', 'title'))->label('Название галереи');

echo $form->field($model, 'image')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
    'pluginOptions' => [
        'allowedFileExtensions' => ['jpg', 'gif', 'png', 'bmp'],
        'initialPreviewFileType' => 'image',
        'previewFileType' => 'image',
        'showUpload' => false,
        'initialPreview' => [
            $model->image ? Html::img('/' . $model->image . '.jpg', ['class' => 'img-responsive img-preview']) : null, // checks the models to display the preview
        ],
        'overwriteInitial' => false,
    ],

])->label('Изображение');

echo $form->field($model, 'is_active')->checkbox()->label('Опубликовано');

echo My::buttons(['gallery/item-delete', 'id' => $model->id], ['items'], $model->isNewRecord);

ActiveForm::end();

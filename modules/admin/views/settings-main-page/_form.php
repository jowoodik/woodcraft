<?php
/**
 * @var $this yii\web\View
 * @var $model
 */
use app\models\SettingsMainPage;
use app\modules\admin\lib\My;
use app\modules\admin\widgets\editor\TinyMce;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use mihaildev\elfinder\InputFile;
use yii\helpers\Html;

$extension = $model->position == 'catalog-link' ? '.xls' : '.jpg';

$form = ActiveForm::begin([
    'options' => [
        'enctype' => 'multipart/form-data',
    ]
]);

echo $form->field($model, 'title')->label('Заголовок');

echo $form->field($model, 'info_text')->widget(TinyMce::className())->label('Информационный блок');

echo $form->field($model, 'position')->dropDownList(SettingsMainPage::$positions)->label('Позиция на сайте');;

echo $form->field($model, 'number')->label('Номер');

echo $form->field($model, 'image')->widget(FileInput::classname(), [
    'options' => ['accept' => '*'],
    'pluginOptions' => [
        'allowedFileExtensions' => ['jpg', 'gif', 'png', 'bmp', 'xls', 'xlsx', 'doc', 'docx'],
        'initialPreviewFileType' => 'document',
        'previewFileType' => 'document',
        'showUpload' => false,
        'initialPreview' => [
            $model->image ? Html::img('/' . $model->image . $extension, ['class' => 'img-small img-preview']) : null, // checks the models to display the preview
        ],
        'overwriteInitial' => false,
    ],

])->label('Файл');


echo $form->field($model, 'status')->checkbox()->label('Опубликовано');

echo My::buttons(['delete', 'id' => $model->id], ['index'], $model->isNewRecord);


ActiveForm::end();

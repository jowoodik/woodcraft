<?php
/**
 * @var $this yii\web\View
 * @var $model
 * @var $form
 */


use app\modules\admin\lib\My;
use app\modules\admin\widgets\editor\TinyMce;
use kartik\file\FileInput;
use mihaildev\elfinder\InputFile;
use yii\helpers\Html;
//if (isset($model['price'])){
    echo  $form->field($model, 'price')->textInput()->label('Цена товара в рублях');;
//}
echo $form->field($model, 'text')->widget(TinyMce::className())->label('Текст');

echo $form->field($model, 'image')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
    'pluginOptions' => [
        'allowedFileExtensions' => ['jpg', 'jpeg','gif', 'png', 'bmp'],
        'initialPreviewFileType' => 'image',
        'previewFileType' => 'image',
        'showUpload' => false,
        'initialPreview' => [
            $model->image ? Html::img('/' . $model->image . '.jpg', ['class' => 'img-small img-preview']) : null, // checks the models to display the preview
        ],
        'overwriteInitial' => false,
    ],

])->label('Изображение');

echo My::buttons(['delete', 'id' => $model->id], ['index'], $model->isNewRecord);

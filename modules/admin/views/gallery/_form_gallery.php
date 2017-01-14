<?php
/**
 * @var $this yii\web\View
 * @var $model
 */

use app\modules\admin\lib\My;
use app\modules\admin\widgets\alias\GenerateAlias;
use app\modules\admin\widgets\editor\TinyMce;
use yii\bootstrap\ActiveForm;
use mihaildev\elfinder\InputFile;

$form = ActiveForm::begin([
    'options' => [
        'enctype' => 'multipart/form-data',
    ]
]);

echo $form->field($model, 'title')->label('Заголовок');

echo $form->field($model, 'alias')->widget(GenerateAlias::className(), [
    'depends' => 'title',
])->label('Алиас');

echo $form->field($model, 'description')->widget(TinyMce::className())->label('Описание');

echo $form->field($model, 'image')->widget(InputFile::className(), [
    'language' => 'ru',
    'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
    'filter' => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
    'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
    'options' => ['class' => 'form-control'],
    'buttonOptions' => ['class' => 'btn btn-default'],
    'multiple' => false       // возможность выбора нескольких файлов
])->label('Обложка-изображение');

echo $form->field($model, 'is_active')->checkbox()->label('Опубликовано');

echo My::buttons(['gallery/delete', 'id' => $model->id], ['index'], $model->isNewRecord);

ActiveForm::end();

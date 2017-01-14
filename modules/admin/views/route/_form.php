<?php
/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Categories $model
 * @var $catList
 * @var $level1
 * @var $level2
 */

use app\models\Entity;
use app\modules\admin\lib\My;
use app\modules\admin\widgets\alias\GenerateAlias;
use kartik\depdrop\DepDrop;
use mihaildev\elfinder\InputFile;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);


echo $form->field($model, 'title');
echo $form->field($model, 'alias')->widget(GenerateAlias::className(), [
    'depends' => 'title',
]);

echo $form->field($model, 'pid')->dropDownList($routes = Route::find()
    ->asArray()
    ->select(['title', 'id'])
    ->where(['not', ['id' => $model->id]])
    ->orderBy(['id' => SORT_ASC])
    ->indexBy('id')
    ->column(), ['prompt' => 'Выберите pid...']
);

//echo $form->field($model, 'description')->widget(TinyMce::className())->label('Текст');

echo $form->field($model, 'image')->widget(InputFile::className(), [
    'language' => 'ru',
    'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
    'filter' => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
    'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
    'options' => ['class' => 'form-control'],
    'buttonOptions' => ['class' => 'btn btn-default'],
    'multiple' => false       // возможность выбора нескольких файлов
])->label('Изображение');



echo $form->field($model, 'is_active')->checkbox()->label('Опубликовано');

echo $form->field($model, 'meta_title')->label('Заголовок для вывода');

echo $form->field($model, 'meta_description')->label('Описание');

echo $form->field($model, 'meta_keywords')->label('Ключевые слова');

echo $form->field($model, 'entity')->dropDownList(Entity::entityList(), [
    'prompt' => 'Выберите компонент...',
]);

echo $form->field($model, 'entity_id')->widget(DepDrop::className(), [
    'type' => DepDrop::TYPE_SELECT2,
    'pluginOptions' => [
        'depends' => ['routes-entity'],
        'placeholder' => 'Выберите объект...',
        'url' => Url::to(['entity/values']),
    ]
]);

echo My::saveAndCloseBtn();

ActiveForm::end();

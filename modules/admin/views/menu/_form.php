<?php
/**
 * @var $this yii\web\View
 * @var $model
 */
use app\models\Entity;
use app\models\Menu;
use app\models\Route;
use app\modules\admin\lib\My;

use yii\bootstrap\ActiveForm;


$form = ActiveForm::begin([
    'options' => [
        'enctype' => 'multipart/form-data',
    ]
]);

//echo $form->field($model, 'name')->label('Название пункта меню');

echo $form->field($model, 'route_id')->dropDownList(
    $routes = Route::find()
        ->asArray()
        ->select([
            'title',
            'id'
        ])
        ->where(['not', ['id' => $model->id]])
        ->andWhere([
            'entity' => [Entity::ENTITY_PAGE, Entity::ENTITY_GALLERY, Entity::ENTITY_CATALOG, Entity::ENTITY_REQUEST, Entity::ENTITY_SERVICES, Entity::ENTITY_CATALOG_CATEGORIES,],
        ])
        ->orderBy(['id' => SORT_ASC])
        ->indexBy('id')
        ->column(), ['prompt' => 'Выберите название пункта меню...']
)->label('Название пункта меню');

/*echo $form->field($model, 'route_id')->dropDownList(
    $routes = Routes::find()
        ->asArray()
        ->select(['alias', 'id'])
        ->where(['not', ['id' => $model->id]])
        ->orderBy(['id' => SORT_ASC])
        ->indexBy('id')
        ->column(), ['prompt' => 'Выберите алиас пункта меню...']
)->label('Алиас пункта меню');*/

echo $form->field($model, 'is_active')->checkbox()->label('Опубликовано');

echo $form->field($model, 'position')->dropDownList(Menu::$positions)->label('Местонахождение пункта меню');

echo $form->field($model, 'sort')->label('Номер п/п - отображение порядка пункта меню');


echo My::buttons(['delete', 'id' => $model->id], ['index'], $model->isNewRecord);

ActiveForm::end();

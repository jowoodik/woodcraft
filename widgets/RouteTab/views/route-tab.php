<?php
/**
 * @var \app\widgets\RouteTab\RouteTab $that
 */

use app\models\Entity;
use app\modules\admin\models\Route;


$form = $that->form;
//pree($that->model);
//dd($that->model);
echo $form->field($that->model, 'title');

echo $form->field($that->model, 'alias');

echo $form->field($that->model, 'parent_id')
    ->dropDownList(Route::getPidList([
        Entity::ENTITY_PAGE,
        Entity::ENTITY_GALLERY,
        Entity::ENTITY_CATALOG_INSTRUMENT,
        Entity::ENTITY_CATALOG_WOOD,
        Entity::ENTITY_CATALOG_CATEGORIES,
        Entity::ENTITY_SERVICES
    ], $that->model['route_id']), [
        'prompt' => 'Выберите родительскую страницу..'
    ])
    ->label('Унаследовать от..');

echo $form->field($that->model, 'is_active')->checkbox();

echo $form->field($that->model, 'is_sidebar')->checkbox();

//echo $form->field($that->model, 'meta_title');

echo $form->field($that->model, 'meta_description');

echo $form->field($that->model, 'meta_keywords');

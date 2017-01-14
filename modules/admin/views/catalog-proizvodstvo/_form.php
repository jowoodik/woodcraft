<?php
/**
 * @var $this yii\web\View
 * @var app\modules\admin\models\Categories $model
 */

use app\modules\admin\lib\My;
use app\modules\admin\models\Routes;
use yii\bootstrap\ActiveForm;


$form = ActiveForm::begin([
    'options' => [
        'enctype' => 'multipart/form-data',
    ]
]);

echo $form->field($model, 'title')->label('Заголовок');

echo $form->field($model, 'alias')->label('Алиас');

echo $form->field($model, 'is_active')->checkbox()->label('Опубликовано');

echo $form->field($model, 'meta_title');

echo $form->field($model, 'meta_description');

echo $form->field($model, 'meta_keywords');


echo My::buttons(['route/delete', 'id' => $model->route_id], ['index'], $model->isNewRecord);

ActiveForm::end();

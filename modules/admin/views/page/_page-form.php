<?php
/**
 * @var $this yii\web\View
 * @var $model
 * @var $form
 */


use app\modules\admin\lib\My;
use app\modules\admin\widgets\editor\TinyMce;


echo $form->field($model, 'text')
    ->widget(TinyMce::className())->label('Текст');

echo My::buttons(['delete', 'id' => $model->id], ['index'], $model->isNewRecord);
<?php
/**
 * @var $model
 */

use yii\helpers\Html;

use yii\helpers\Url;

$date = $model['created_at'];
?>

<div class="border">
    <p class="date"><?= Yii::$app->formatter->asDate($date); ?></p>
    <p><?= Html::encode($model['short_text']) ?></p>
    <a href="<?= Url::to(['/news/view/', 'id' => $model['id'], 'alias' => $model['alias']]) ?>" class="button">
        Подробнее
    </a>
</div>

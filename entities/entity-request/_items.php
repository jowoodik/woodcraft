<?php
/**
 * @var $this yii\web\View
 * @var app\models\EntityPage $model
 */

//$this->registerMetaTag(['name' => 'title', 'content' => strip_tags($model['route']['meta_title'])]);
$this->registerMetaTag(['name' => 'description', 'content' => strip_tags($model['route']['meta_description'])]);
$this->registerMetaTag(['name' => 'keywords', 'content' => strip_tags($model['route']['meta_keywords'])]);

foreach ($model['items'] as $item): ?>
    <div class="block-text">
        <a href="<?= $item['path'] ?>"><?= $item['title'] ?></a>
    </div>
<?php endforeach; ?>



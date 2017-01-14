<?php
/**
 * @var $this yii\web\View
 * @var app\models\EntityServices $model
 */

//$this->registerMetaTag(['name' => 'title', 'content' => strip_tags($model['route']['meta_title'])]);
$this->registerMetaTag(['name' => 'description', 'content' => strip_tags($model['route']['meta_description'])]);
$this->registerMetaTag(['name' => 'keywords', 'content' => strip_tags($model['route']['meta_keywords'])]);

$description = \app\models\EntityServices::find()
    ->asArray()
    ->where(['route_id' => $model['route']['id']])
    ->one();
?>

<h1 class="text-uppercase"><?= $this->title ?></h1>
<div class="description"><?= strip_tags($description['description']) ?></div>

<?php foreach ($model['items'] as $item): ?>
    <div class="col-md-4 col-sm-6 col-xs-12 thumb-wrapper">
        <a href="<?= $item['path'] ?>">
            <img src="<?= $item['image'] . '-preview.jpg' ?>" class="my-thumb" alt="">
        </a>
        <div class="dark-block">
            <?= $item['title'] ?>
        </div>
    </div>
<?php endforeach; ?>

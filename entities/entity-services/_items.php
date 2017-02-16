<?php
/**
 * @var $this yii\web\View
 * @var app\models\EntityServices $model
 * @var array $services
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

<?php foreach ($services as $service): ?>
    <div class="wrapper-service">
        <h4 class="service-title"><?= $service['title'] ?></h4>
        <div class="text hidden"><?=$service['text']?></div>
    </div>
<?php endforeach; ?>

<?php
/**
 * @var $this yii\web\View
 * @var app\models\EntityCatalog $model
 */

use app\lib\My;

//$this->registerMetaTag(['name' => 'title', 'content' => strip_tags($model['route']['meta_title'])]);
$this->registerMetaTag(['name' => 'description', 'content' => strip_tags($model['route']['meta_description'])]);
$this->registerMetaTag(['name' => 'keywords', 'content' => strip_tags($model['route']['meta_keywords'])]);

foreach ($model['items'] as $item): ?>
    <div class="col-md-4 padding-less">
        <div class="catalog-item item image-small">
            <a href="<?= $item['path'] ?>">
                <img src="<?= My::getThumb($item['image'], 'news') ?>"/>
            </a>
            <div class="article-title">
                <a href="<?= $item['path'] ?>"><?= $item['title'] ?> </a>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php
/**
 * @var $this yii\web\View
 * @var app\models\EntityCatalogProizvodstvo $model
 */

use app\lib\My;

//$this->registerMetaTag(['name' => 'title', 'content' => strip_tags($model['route']['meta_title'])]);
$this->registerMetaTag(['name' => 'description', 'content' => strip_tags($model['route']['meta_description'])]);
$this->registerMetaTag(['name' => 'keywords', 'content' => strip_tags($model['route']['meta_keywords'])]);

function getChilds($items, $id)
{
    $result = [];
    foreach ($items as $item) {
        if ($item['parent_id'] == $id) {
            $result[] = $item;
        }
    }

    return $result;
}

foreach ($model['items'] as $item): ?>
    <?php if ($item['level'] === 1): ?>
        <?php $result = getChilds($model['items'], $item['id']); ?>
        <div class="col-md-6 col-xs-12">
            <div class="title">
                <?= $item['title']; ?>
            </div>
            <?php foreach ($result as $r): ?>
                <a href="<?= $r['path']; ?>" class="catalog-item"><?= $r['title']; ?></a>
            <?php endforeach ?>
        </div>
    <?php endif; ?>
<?php endforeach; ?>

<div class="col-md-12 catalog-request">
    <div class="title"> по вашим чертежам</div>
    <div class="request">
        <a href="/request" class="btn btn-yellow text-uppercase">Заявка</a>
    </div>
</div>

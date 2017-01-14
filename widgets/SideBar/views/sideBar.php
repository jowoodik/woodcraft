<?php
/**
 * @var \app\widgets\SideBar\SideBar $model
 */

use app\models\News;
use yii\helpers\Url;

if (isset($model->parent_id)) {
    $condition = 'parent_id';
    $id = $model->id;
} else {
    $condition = 'level';
    $id = 1;
}

$newses = News::find()
    ->asArray()
    ->andWhere(['status' => 1])
    ->limit(2)
    ->orderBy('created_at DESC')
    ->all();
?>

<div class="col-md-3 col-xs-12 news">
    <div class="title text-uppercase">Новости</div>
    <?php foreach ($newses as $news) : ?>
        <div class="news-item">
            <a href="<?= Url::to(['/news/view/', 'id' => $news['id'], 'alias' => $news['alias']]) ?>">
                <?php if (str_word_count($news['image'])) { ?>
                    <img src="<?= '/' . $news['image'] . '-preview.jpg' ?>" class="img-responsive" alt="">
                <?php } else { ?>
                    <img src="/uploads/no-image.jpg" class="img-responsive"/>
                <?php } ?>
            </a>
            <div class="date"><?= date('d.m.Y', $news['created_at']) ?></div>
            <div class="desc"><?= $news['short_text'] ?>
            </div>
            <a href="<?= Url::to(['/news/view/', 'id' => $news['id'], 'alias' => $news['alias']]) ?>"
               class="btn btn-yellow more">Подробнее</a>
        </div>
    <?php endforeach; ?>
    <a href="/news" class="redirect text-uppercase">Перейти к другим новостям</a>
</div>
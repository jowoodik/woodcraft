<?php
/**
 * @var $model
 */

use app\lib\My;
use yii\helpers\Html;

use yii\helpers\Url;

$date = $model['created_at'];

?>
<div class="col-md-4 padding-less">
    <div class="item">
        <a href="<?= Url::to(['/news/view/', 'id' => $model['id'], 'alias' => $model['alias']]) ?>">
            <?php if (str_word_count($model['image'])){?>
            <img src="<?= '/' . $model['image'] . '-card.jpg' ?>" class="img-responsive news-img" alt="">
            <?php } else { ?>
                <img src="/uploads/no-image.jpg" class="img-responsive"/>
            <?php } ?>
        </a>
        <div class="article-title">
            <a href="<?= Url::to(['/news/view/', 'id' => $model['id'], 'alias' => $model['alias']]) ?>">
                <div class="news-title"><?= $model['title'] ?></div>
            </a>
            <div class="block-text"><?= Html::encode($model['short_text']); ?></div>
            <div class="article-date"> <?= Yii::$app->formatter->asDate($date); ?> </div>
        </div>
    </div>
</div>
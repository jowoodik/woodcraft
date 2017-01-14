<?php
/**
 * @var \app\models\News $model
 * @var $links
 */

use app\lib\My;
use app\widgets\popup\MagnificPopup;
use yii\helpers\Html;
use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    0       => [
        'label' => 'Новости',
        'url'   => Url::to(['/news/'])
    ],
    'label' => $this->title
];

$date = $model['created_at'];
//$this->registerMetaTag(['name' => 'title', 'content' => strip_tags($model['meta_title'])]);
$this->registerMetaTag(['name' => 'description', 'content' => strip_tags($model['meta_description'])]);
$this->registerMetaTag(['name' => 'keywords', 'content' => strip_tags($model['meta_keywords'])]);

?>
<div id="mpup">
    <div class="news">
        <div class="block-title border-no"><?= $this->title ?></div>
        <div class="border">
            <div class="row no-margin-row">
                <div class="block-image-news pull-left">
                    <a href="<?= '/' . $model['image'] . '.jpg' ?>" class="item">
                        <?php if (str_word_count($model['image'])){?>
                        <img src="<?= '/' . $model['image'] . '-card.jpg' ?>"/>
                        <?php } else { ?>
                            <img src="/uploads/no-image.jpg" class="img-responsive"/>
                        <?php } ?>
                    </a>
                </div>
                <?php echo MagnificPopup::widget(
                    [
                        'target'  => '#mpup',
                        'options' => [
                            'delegate' => 'a.item',
                            'gallery'  => ['enabled' => true]
                        ],
                        'effect'  => 'with-zoom' //for zoom effect
                    ]
                );
                ?>
                <div class="block-text"><?= Html::decode($model['text']); ?></div>
            </div>
            <div class="block-text pull-right"><em>Дата публикации: <?= Yii::$app->formatter->asDate($date); ?></em>
            </div>
        </div>
    </div>
</div>
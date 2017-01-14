<?php
/**
 * @var $this yii\web\View
 * @var EntityCatalog $model
 */

use app\models\EntityCatalog;
use app\widgets\popup\MagnificPopup;

//$this->registerMetaTag(['name' => 'title', 'content' => strip_tags($model['route']['meta_title'])]);
$this->registerMetaTag(['name' => 'description', 'content' => strip_tags($model['route']['meta_description'])]);
$this->registerMetaTag(['name' => 'keywords', 'content' => strip_tags($model['route']['meta_keywords'])]); 

$title = $model['route']['title'];
$this->title = $title;
$this->params['breadcrumbs'] = $model->breadcrumbs;

$gallery = $model['gallery'];
?>
<div id="mpup">
<div class="block-title"><?= $model['route']['title'] ?></div>
<div class="gallery">
    <?php
    if (empty($gallery['activeItems'])) {
        echo '<div class="box empty">В данной категории пока нет ни одной фотографии</div>';
    } else {
        echo $this->render('_items', ['gallery' => $gallery['activeItems']]);
        echo MagnificPopup::widget(
            [
                'target' => '#mpup',
                'options' => [
                    'delegate' => 'a.item',
                    'gallery' => ['enabled' => true]
                ],
                'effect' => 'with-zoom' //for zoom effect
            ]
        );
    }
    ?>
</div>
</div>
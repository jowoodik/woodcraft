<?php
use app\widgets\popup\MagnificPopup;

?>
<div class="row">
    <div class="col-md-8 col-sm-12">
        <div class="block-image pull-right">
            <?php
            /** @var \app\models\EntityCatalogCategories $model */
            if (str_word_count($model['page']['image']) != 0) { ?>
                <div id="mpup">
                    <a href="/<?= $model['page']['image'] . '.jpg' ?>" class="zoom">
                        <div class="img-wrapper">
                            <img src="/<?= $model['page']['image'] . '.jpg' ?>" class="product-image img-responsive img-thumbnail"/>
                        </div>
                    </a>
                </div>
                <?php echo MagnificPopup::widget(
                    [
                        'target' => '#mpup',
                        'options' => [
                            'delegate' => 'a.zoom',
                            'gallery' => ['enabled' => true]
                        ],
                        'effect' => 'with-zoom' //for zoom effect
                    ]
                );
                ?>
            <?php } else { ?>
                <img src="/uploads/no-image.jpg" class="product-image img-responsive"/>
            <?php } ?>

        </div>
    </div>
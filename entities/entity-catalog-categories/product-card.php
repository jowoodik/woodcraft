<?php
use app\widgets\popup\MagnificPopup;

?>
<div class="block-image pull-left">
    <?php
    if (str_word_count($model['page']['image']) != 0) { ?>
        <div id="mpup">
            <a href="/<?= $model['page']['image'] . '.jpg' ?>" class="item">
                <img src="/<?= $model['page']['image'] . '.jpg' ?>"
                     class="product-image img-responsive"/>
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
    <?php } else { ?>
        <img src="/uploads/no-image.jpg" class="product-image img-responsive"/>
    <?php } ?>

</div>
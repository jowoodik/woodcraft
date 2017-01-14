<?php

$i = 0;

/** @var \app\models\EntityGallery $gallery */
foreach ($gallery as $item) {
    if ($item['image']) {
        echo '<div class="col-md-3 col-xs-6">';
    }
    echo '<div class="image-block">';
    echo '<a href="' . $item['image'] . '.jpg" class="item">';
    echo '<img src="' . $item['image'] . '-preview.jpg" class="gallery-img"/>';
    echo '</a>';
    echo '</div>';
    echo '</div>';
}

<?php
/**
 * @var $this yii\web\View
 * @var \app\models\Route $route
 */
?>

<div class="col-md-4 col-sm-6">
<div class="item">
    <?php if (!empty($route['image'])) { ?>
        <a class="block" href="<?= $route['path'] ?>">
            <?= $route['title'] ?>
        </a>
        <a href="<?= $route['path'] ?>" class="img-href">
                <img src="/<?= $route['image'] . '.jpg' ?>" class="img-responsive img-thumbnail"/>
        </a>
    <?php } else { ?>
        <a href="<?= $route['path'] ?>" class="img-href">
                <img src="/uploads/no-image.jpg" class="img-responsive"/>
        </a>
    <?php } ?>
</div>
</div>
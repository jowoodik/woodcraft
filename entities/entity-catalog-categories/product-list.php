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
            <div class="img-wrapper">
                <img src="/<?= $route['image'] . '.jpg' ?>" class="img-responsive"/>
            </div>
        </a>
    <?php } else { ?>
        <a href="<?= $route['path'] ?>" class="img-href">
            <div class="img-wrapper">
                <img src="/uploads/no-image.jpg" class="my-thumb"/>
            </div>
        </a>
    <?php } ?>
</div>
</div>
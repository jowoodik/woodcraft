<?php
/**
 * @var $this \yii\web\View
 * @var $content string
 */

use app\assets\AppAsset;
use app\assets\FontAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;


AppAsset::register($this);
//FontAsset::register($this);

$bodyClass = ArrayHelper::getValue($this, 'params.bodyClass');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="Content-Type" content="text/html;">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="icon" href="http://www.yoursite.com/favicon.ico?v=2" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body<?/*= $bodyClass ? ' class="' . $bodyClass . '"' : null */?>>
<div class="wrapper">

    <?php $this->beginBody() ?>

    <?= $this->render('_header') ?>

    <?php if (isset($this->params['contentOnly'])): ?>
        <div id="content" class="content">
            <?= $content ?>
        </div>
    <?php else: ?>
        <div id="content" class="content">

            <div class="container">
                <?= $content ?>
            </div>
        </div>
    <?php endif ?>

    <?= $this->render('_footer') ?>

    <?= $this->render('_yandex')?>

    <?php $this->endBody() ?>
</div>
</body>
</html>
<?php $this->endPage() ?>

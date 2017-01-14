<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 24.03.2016
 * Time: 9:07
 * @var \yii\web\View $this
 * @var $content
 */

use app\modules\admin\assets\AdminAsset;
use yii\helpers\Html;

AdminAsset::register($this);

$this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <title><?= Html::encode($this->title) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>

    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->

    <!--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->

    <?php $this->head() ?>

    <!-- Ionicons -->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-purple sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">

    <?= $this->render('_admin-header') ?>

    <?= $this->render('_admin-aside') ?>

    <?= $this->render('_admin-content', [
        'content' => $content,
    ]) ?>

    <?= $this->render('_admin-footer') ?>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

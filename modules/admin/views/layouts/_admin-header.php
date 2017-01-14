<?php
use app\models\Applications;
use yii\helpers\Html;

$applications = Applications::find()->where(['status' => 0])->orWhere(['status'=> NULL])->count();

?>
<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo" target="_blank">
        <!-- mini logo for sidebar mini 50x50 pixels -->
<!--        <span class="logo-mini"><img src="/img/logo-mini.png" style="font-size: large"></span>-->
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><?= Yii::$app->params['siteName'] ?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="font-size: large">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/admin/mailbox">
                        <i class="fa fa-envelope" style="font-size: large"></i>
                        <span class="label label-danger" style="font-size: small;"><?= $applications ?></span>
                    </a>
                </li>
                <li>
                    <?= Html::a('<i class="fa fa-sign-out" style="font-size: large"></i>',
                        ['/site/logout'],
                        [
                            'data' => [
                                'method' => 'post',
                            ]
                        ]) ?>
                </li>
            </ul>
        </div>
    </nav>
</header>

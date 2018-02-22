<?php

use app\models\forms\SearchForm;
use app\models\Menu;
use app\models\SettingsMainPage;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$searchForm = new SearchForm();

$settingsMainPage = SettingsMainPage::find()
    ->where([
        'status' => 1,
    ])
    ->asArray()
    ->orderBy(['number' => SORT_ASC])
    ->all();
$settingsArr = [];
foreach ($settingsMainPage as $row) {
    $settingsArr[$row['position']][] = $row;
}

$is_main = Yii::$app->controller->action->id === 'index' && Yii::$app->controller->id === 'site';

$menus = Menu::find()
    ->asArray()
    ->select([
        'menu.*',
        'route_index.path AS path',
    ])
    ->where([
        'is_active' => 1,
    ])
    ->with('route')
    ->innerJoin('route_index', 'route_index.route_id = menu.route_id')
    ->orderBy(['sort' => SORT_ASC])
    ->all();
$menusArr = [];
foreach ($menus as $menu) {
    $menusArr[$menu['position']][] = $menu;
}
?>
<div id="header" class="header">
    <nav class="navbar navbar-default navigation top-navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" id="n-toggle" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="row">
                    <div class="col-md-2 col-xs-12 visible-md visible-lg">
                        <div class="logo">
                            <a href="/"><img src="/images/logo-new.png" alt=""></a>
                        </div>
                    </div>
                    <div class="navbar-left left-part">
                        <ul class="nav navbar-nav menu ">
                            <li class="menu-main">
                                <div class="down clearfix">
                                    <?php
                                    $form = ActiveForm::begin([
                                        'action' => ['search/index'],
                                        'method' => 'get',
                                        'options' => ['id' => 'header-search'],
                                        'fieldConfig' => [
                                            'template' => "{input}",
                                        ],
                                    ]);
                                    ?>
                                    <?= $form->field($searchForm, 'text', ['options' => ['class' => '']])->textInput(['placeholder' => 'Поиск...']); ?>
                                    <?= Html::submitInput(''); ?>
                                    <?php ActiveForm::end(); ?>
                                </div>
                            </li>
                            <li class="menu-main text-uppercase">
                                <a href="/about" class="button menu main-menu">О нас</a>
                            </li>
                            <li class="menu-main text-uppercase">
                                <a href="/contact" class="button menu main-menu"> Контакты</a>
                            </li>
                            <li>
                                <div class="top-header-info">
                                    <div class="all-hover">
                                        <div class="cont-pad">
                                            <div class="city">Екатеринбург</div>
                                            <div class="tel">8 (343) 386-19-65</div>
                                            <span class="date">Время работы: Пн-Сб 08:00-21:00</span>
                                        </div>
                                        <div class="hover-info-block">
                                            <div class="zvonok">
                                                <a href="#" data-toggle="modal" data-target="#mCall">Заказать звонок</a>
                                            </div>
                                            <div class="home">
                                                <span>Офис</span><br>
                                                <a href="/contact" data-pjax-yandex-map="">ул. Горнистов 10 А</a>
                                            </div>
                                            <div class="mail">
                                                <span> E-mail</span><br>
                                                <a href="#" data-pjax-yandex-map-two="">woodcraft-ural@yandex.ru</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-main text-uppercase visible-xs">
                                <a href="<?= Url::to('/') ?>" class="button menu main-menu ">Главная</a>
                            </li>

                            <?php foreach (ArrayHelper::getValue($menusArr, 'middle_menu', []) as $mItem) { ?>
                                <li class="menu-main text-uppercase visible-xs">
                                    <a href="<?= Url::to($mItem['path']) ?>"
                                       class="button menu main-menu "><?= $mItem['route']['title']; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

<!--    --><?php //if ($is_main): ?>
        <?= $this->render('_slider') ?>
<!--    --><?php //endif ?>

    <div class="middle-navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" id="middle-toggle" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-middle-navbar-collapse-2">
                <div class="row">
                    <div class="navbar-center">
                        <ul class="nav navbar-nav middle-menu">
                            <li class="menu-middle-item">
                                <a href="<?= Url::to('/') ?>" class="button">Главная</a>
                            </li>
                            <?php foreach (ArrayHelper::getValue($menusArr, 'middle_menu', []) as $mItem) { ?>
                                <li class="menu-middle-item">
                                    <a href="<?= Url::to($mItem['path']) ?>"
                                       class="button"><?= $mItem['route']['title']; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

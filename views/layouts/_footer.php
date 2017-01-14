<?php

use app\models\Menu;
use app\models\SettingsMainPage;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

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
<div id="footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 logo visible-md visible-lg">
                <a href="#"><img src="/images/footer-logo.png" alt=""></a>
                <div class="ooo">ООО “Завод-строй модуль” <?=date("Y");?>г</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-12 text-uppercase footer-menu">
                <a href="/#about">О Нас</a>
                <?php foreach (ArrayHelper::getValue($menusArr, 'footer_menu', []) as $mItem) { ?>
                        <a href="<?= Url::to($mItem['path']) ?>"><?= $mItem['route']['title']; ?></a>
                <?php } ?>
                    <a href="/#useful">Полезная информация</a>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 contact">
                <div>
                    <?php foreach (ArrayHelper::getValue($settingsArr, 'contacts_header', []) as $info_block) { ?>
                        <div>
                            <?= strip_tags($info_block['info_text']) ?>
                        </div>
                    <?php } ?>
                    <?php foreach (ArrayHelper::getValue($settingsArr, 'email_footer', []) as $info_block) { ?>
                        <div>
                            <?= strip_tags($info_block['info_text']) ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 icons">
                <div>
                    <?php foreach (ArrayHelper::getValue($settingsArr, 'social_buttons', []) as $info_block) { ?>
                        <a href="<?= strip_tags($info_block['info_text']) ?>">
                            <img src="<?= $info_block['image']?>" alt="">
                        </a>
                    <?php } ?>
                    <?php foreach (ArrayHelper::getValue($settingsArr, 'address_footer', []) as $info_block) { ?>
                        <div class="address">
                            <?= strip_tags($info_block['info_text']) ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="footer-building">
                <img src="/images/footer-building.png" class="img-responsive" alt="">
            </div>
        </div>
    </div>
    <div class="black-footer">
        <div class="container">
            <div class="row">
                <span>Все права защищены. Дизайн и разработка сайтов <a href="http://www.mediaten.ru">Mediaten.ru</a></span>
            </div>
        </div>
    </div>
</div>

<?php

use app\widgets\SideBar\SideBar;
use app\models\SettingsMainPage;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$this->title = 'WoodCraft';

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

foreach (ArrayHelper::getValue($settingsArr, 'meta_title', []) as $info_block) {
//    $this->registerMetaTag(['name' => 'title', 'content' => strip_tags($info_block['info_text'])]);
}
foreach (ArrayHelper::getValue($settingsArr, 'meta_description', []) as $info_block) {
    $this->registerMetaTag(['name' => 'description', 'content' => strip_tags($info_block['info_text'])]);
}
foreach (ArrayHelper::getValue($settingsArr, 'meta_keywords', []) as $info_block) {
    $this->registerMetaTag(['name' => 'keywords', 'content' => strip_tags($info_block['info_text'])]);
}

?>

<div class="container">
    <div class="row">
        <?php echo SideBar::widget([]); ?>
        <div class="col-md-9 col-xs-12 content-wrapper">
            <div class="about">
                <?php foreach (ArrayHelper::getValue($settingsArr, 'about_title', []) as $info_block) { ?>
                    <div id='about' class="title-page text-uppercase"><?= strip_tags($info_block['info_text']) ?></div>
                <?php } ?>
                <?php foreach (ArrayHelper::getValue($settingsArr, 'text_1', []) as $info_block) { ?>
                    <div class="text"><?= strip_tags($info_block['info_text']) ?></div>
                <?php } ?>
                <?php foreach (ArrayHelper::getValue($settingsArr, 'sign-1', []) as $info_block) { ?>
                    <div class="sign"><?= strip_tags($info_block['info_text']) ?></div>
                <?php } ?>
                <?php foreach (ArrayHelper::getValue($settingsArr, 'text_2', []) as $info_block) { ?>
                    <div class="text"><?= strip_tags($info_block['info_text']) ?></div>
                <?php } ?>
                <?php foreach (ArrayHelper::getValue($settingsArr, 'sign-2', []) as $info_block) { ?>
                    <div class="sign"><?= strip_tags($info_block['info_text']) ?></div>
                <?php } ?>
                <?php foreach (ArrayHelper::getValue($settingsArr, 'text_3', []) as $info_block) { ?>
                    <div class="text"><?= strip_tags($info_block['info_text']) ?></div>
                <?php } ?>
                <?php foreach (ArrayHelper::getValue($settingsArr, 'sign-3', []) as $info_block) { ?>
                    <div class="sign"><?= strip_tags($info_block['info_text']) ?></div>
                <?php } ?>
                <?php foreach (ArrayHelper::getValue($settingsArr, 'text_4', []) as $info_block) { ?>
                    <div class="text"><?= strip_tags($info_block['info_text']) ?></div>
                <?php } ?>
                <?php foreach (ArrayHelper::getValue($settingsArr, 'red-sign', []) as $info_block) { ?>
                    <div class="red-title"><?= strip_tags($info_block['info_text']) ?></div>
                <?php } ?>
            </div>
            <div class="advantages">
                <div class="image-section">
                    <?php foreach (ArrayHelper::getValue($settingsArr, 'main_page_image', []) as $info_block) { ?>
                        <img src="<?= $info_block['image'].'.jpg' ?>" class="img-responsive pull-right main-page-image" alt="">
                    <?php } ?>
                    <?php foreach (ArrayHelper::getValue($settingsArr, 'advantages_title', []) as $info_block) { ?>
                        <div class="advantages-title text-uppercase"><?= strip_tags($info_block['info_text']) ?></div>
                    <?php } ?>
                    <?php foreach (ArrayHelper::getValue($settingsArr, 'advantages-text-1', []) as $info_block) { ?>
                        <div class="text"><?= strip_tags($info_block['info_text']) ?></div>
                    <?php } ?>
                    <ul>
                        <?php foreach (ArrayHelper::getValue($settingsArr, 'advantages-list', []) as $info_block) { ?>
                            <li><?= strip_tags($info_block['info_text']) ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <?php foreach (ArrayHelper::getValue($settingsArr, 'advantages-text-2', []) as $info_block) { ?>
                    <div class="text"><?= strip_tags($info_block['info_text']) ?></div>
                <?php } ?>
            </div>
            <div id="useful" class="quality">
                <?php foreach (ArrayHelper::getValue($settingsArr, 'quality_title', []) as $info_block) { ?>
                    <div class="quality-title text-uppercase"><?= strip_tags($info_block['info_text']) ?></div>
                <?php } ?>
                <?php foreach (ArrayHelper::getValue($settingsArr, 'quality-subtitle', []) as $info_block) { ?>
                    <div class="quality-subtitle"><?= strip_tags($info_block['info_text']) ?></div>
                <?php } ?>
                <ol class="custom-num">
                    <?php foreach (ArrayHelper::getValue($settingsArr, 'quality-list', []) as $info_block) { ?>
                        <li><?= strip_tags($info_block['info_text'], '<strong>') ?></li>
                    <?php } ?>
                </ol>
            </div>
        </div>
    </div>
</div>
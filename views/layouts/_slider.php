<?php

use app\lib\My;
use app\models\Slider;
use app\modules\admin\models\SettingsMainPage;
use yii\helpers\ArrayHelper;

$settingsMainPage = SettingsMainPage::find()
    ->where([
        'status' => 1,
    ])
    ->asArray()
    ->orderBy(['sort' => SORT_ASC])
    ->all();
$settingsArr = [];
foreach ($settingsMainPage as $row) {
    $settingsArr[$row['position']][] = $row;
}

$slides = Slider::find()->asArray()->where(['status' => 1])->orderBy('sort')->all();

?>
<div class="slider-wrapper">
        <div class="row">
            <?php foreach (ArrayHelper::getValue($settingsArr, 'slider_title', []) as $info_block) { ?>
                <div class="title text-uppercase">
                    <?= $info_block['info_text'] ?>
                </div
            <?php } ?>
            <div id="owl-mp-slider">
                <?php foreach ($slides as $slide): ?>
                    <div class="item">
                        <a href="<?= $slide['link'] ?>">
                            <div  class="owl-img" style="background-image: url(<?= $slide['image'] . '.jpg' ?>)" > </div>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
</div>

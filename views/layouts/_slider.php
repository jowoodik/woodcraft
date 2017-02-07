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

</div>

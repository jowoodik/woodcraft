<?php
namespace app\widgets\YandexMap;

use yii\web\AssetBundle;

class YandexMapAsset extends AssetBundle
{
    public function init()
    {
        $this->js = [
            'https://api-maps.yandex.ru/2.1/?lang=ru_RU'
        ];
    }
}
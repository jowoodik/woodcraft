<?php
namespace app\widgets\YandexMap;

use yii\base\Widget;

class YandexMap extends Widget
{
    public $address = '';

    public function init()
    {
        $this->view->registerAssetBundle(YandexMapAsset::className());
    }

    public function run()
    {
        $js = <<<JS
        ymaps.ready(init) 
        function init(){
            var address = '$this->address';
            var label = '$this->address';
            ymaps.geocode(address, {
                    results: 1
                }).then(function (res) {
                var firstGeoObject = res.geoObjects.get(0),
                        coords = firstGeoObject.geometry.getCoordinates(),
                        bounds = firstGeoObject.properties.get('boundedBy');
                    firstGeoObject.properties.iconContent = '12';
                    var placemark = new ymaps.Placemark(coords, {
                        iconContent: label
                    }, {preset: "islands#blueStretchyIcon"});
                    var myMap = new ymaps.Map('map', {
                        center: bounds,
                        zoom: 9,
                        ScrollZoom: false
                    });
                    myMap.geoObjects.add(placemark);
                    myMap.setBounds(bounds, {
                        checkZoomRange: true
                    });
                    myMap.behaviors.disable('scrollZoom');
                });  
            }
JS;
        $view = $this->getView();
        $view->registerJs($js);
    }
}

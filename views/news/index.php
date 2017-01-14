<?php
/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 */

use app\widgets\popup\MagnificPopup;
use yii\widgets\LinkPager;

$this->params['breadcrumbs'] = ['label' => 'Новости'];
$this->title = 'Новости';
//$this->registerMetaTag(['name' => 'title', 'content' => 'Новости Завод СтройМодуль']);
$this->registerMetaTag(['name' => 'description', 'content' => 'Новости Завод СтройМодуль']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'Новости Завод СтройМодуль']);

?>
<div class="news-page">
    <div class="block-title">Новости</div>
    <?php foreach ($dataProvider->getModels() as $model) {
        echo $this->render('_post', ['model' => $model]);
    } ?>
    <div class="news-pag col-md-12 col-xs-12">
        <?= LinkPager::widget([
            'pagination' => $dataProvider->getPagination(),
        ]) ?>
    </div>
</div>

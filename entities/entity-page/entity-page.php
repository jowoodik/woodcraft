<?php
/**
 * @var $this yii\web\View
 * @var \app\models\EntityPage $model
 */

use app\models\Menu;
use app\widgets\SideBar\SideBar;

$this->params['breadcrumbs'] = $model->breadcrumbs;

$modulesMenu = Menu::find()
    ->andWhere([
        'is_active' => true,
    ])
    ->orderBy('sort')
    ->all();

$this->title = $model['route']['title'];
//$this->registerMetaTag(['name' => 'title', 'content' => strip_tags($model['route']['meta_title'])]);
$this->registerMetaTag(['name' => 'description', 'content' => strip_tags($model['route']['meta_description'])]);
$this->registerMetaTag(['name' => 'keywords', 'content' => strip_tags($model['route']['meta_keywords'])]);

?>
<div class="row">
    <?php if ($model['page']['is_sidebar'] == true): ?>
        <?php echo SideBar::widget([
            'id' => $model['route']['id'],
            'parent_id' => $model['route']['parent_id']
        ]); ?>
    <? endif; ?>
    <div class="col-md-9 col-xs-12">
        <div class="page-sidebar">
            <div class="block-title"><h1><a href="<?= $model['route']['path'] ?>"><?= $model['route']['title'] ?></a></h1></div>
            <div class="block-text">
                <?= $model['page']['text'] ?>
            </div>
            <?php if ($model['route']['alias'] === 'contact'): ?>
                <div class="map">
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=QyDutph03HIYZJt1IieyYVMeEAKQ0Bqt&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true"></script>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

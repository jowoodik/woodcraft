<?php

use app\models\Menu;
use app\models\SettingsMainPage;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
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
                <div class="logo">
<!--                    <a href="/"><img src="/images/logo2.png" alt=""></a>-->
                </div>
<!--                <div class="ooo">ООО “Woodcraft” --><?//=date("Y");?><!--г</div>-->
            </div>
            <div class="col-md-5 col-sm-4 col-xs-12 text-uppercase footer-menu">
                <a href="/#about">О Нас</a>
                <?php foreach (ArrayHelper::getValue($menusArr, 'footer_menu', []) as $mItem) { ?>
                        <a href="<?= Url::to($mItem['path']) ?>"><?= $mItem['route']['title']; ?></a>
                <?php } ?>
                    <a href="/#useful">Полезная информация</a>
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
        </div>
    </div>
    <div class="black-footer">
        <div class="container">
            <div class="row">
                <span>Все права защищены.</span>
            </div>
        </div>
    </div>
</div>
<div id="orderModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <?php $form = ActiveForm::begin([
            'action' => '/send-email',
            'layout'=>'horizontal',
            'options' => ['class' => 'signup-form form-register1'],
            'fieldConfig' => [
                'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => [
                    'label' => 'col-sm-4',
                    'offset' => 'col-sm-offset-4',
                    'wrapper' => 'col-sm-8',
                    'error' => '',
                    'hint' => '',
                ],
            ],
        ]);
        $model = new \app\models\Applications();
        ?>
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Заказ товара</h4>
            </div>
            <div class="modal-body">
                <p>Вы хотите заказать <span class="name"></span> стоимость <span class="price"></span></p>
                <p>Пожалуйста, введите Ваше имя, email, номер телефона и наши менеджеры Вам перезвонят!</p>
                <?= $form->field($model, 'user_name') ?>
                <?= $form->field($model, 'user_email') ?>
                <?= $form->field($model, 'user_telephone') ?>
                <?= $form->field($model, 'build_foundation')->textArea(['rows' => 6]) ?>
                <?= $form->field($model, 'outer_length')->hiddenInput()->label(false) ?>
                <?= $form->field($model, 'file_route')->hiddenInput()->label(false) ?>
            </div>
            <div class="modal-footer">
                <?= Html::submitButton(Yii::t('app', 'Отправить'), ['class' => 'btn btn-primary']) ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

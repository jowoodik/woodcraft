<?php
/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 */


use app\models\SettingsMainPage;
use app\widgets\popup\MagnificPopup;
use app\widgets\SideBar\SideBar;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->params['breadcrumbs'] = ['label' => 'Заявка'];
$this->title = 'Заявка';

/* @var $this yii\web\View */

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

$contact = new \app\models\Applications();
?>
<?php echo SideBar::widget([
]); ?>
<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
    <div class="col-md-4 col-xs-12">
        <div class="alert alert-success">
            Спасибо, что обратились к нам, вскоре мы Вам ответим!
        </div>
    </div>
    <p>
        <?php if (Yii::$app->mailer->useFileTransport): ?>
            Because the application is in development mode, the email is not sent but saved as
            a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>. Please configure the
            <code>useFileTransport</code> property of the <code>mail</code>
            application component to be false to enable email sending.
        <?php endif; ?>
    </p>
<?php endif; ?>


<div class="col-md-9 col-xs-12 content-wrapper">
    <?php $form = ActiveForm::begin(['id' => 'contact-form', 'fieldConfig' => [
        'options' => [
            'tag' => 'span'
        ],
    ], 'options' => ['enctype' => 'multipart/form-data', 'class' => 'contact-form']]); ?>
    <div class="col-md-8 col-xs-12 request-page">
        <h1 class="text-uppercase">Заявка</h1>
        <div class="user-info">
            <?= $form->field($contact, 'user_name')->textInput(['placeholder' => 'Контактное лицо'])->label(false); ?>
            <?= $form->field($contact, 'user_telephone')->textInput(['placeholder' => 'Контактный телефон'])->label(false); ?>
            <?= $form->field($contact, 'user_company')->textInput(['placeholder' => 'Наименование организации'])->label(false); ?>
            <?= $form->field($contact, 'user_email')->textInput(['placeholder' => 'Электронный адрес'])->label(false); ?>
            <?= $form->field($contact, 'build_appointment')->textInput(['placeholder' => 'Назначение здания'])->label(false); ?>
            <div class="warning">*Поля, обязательные для заполнения</div>
        </div>
        <div class="size-wrapper">
            <h4>внешние параметры модульного здания</h4>
            <?= Html::activeTextInput($contact, 'outer_length', ['placeholder' => 'длина(мм)']); ?>
            <?= Html::activeTextInput($contact, 'outer_width', ['placeholder' => 'ширина(мм)']); ?>
            <?= Html::activeTextInput($contact, 'outer_height', ['placeholder' => 'высота(мм)']); ?>
        </div>
        <div class="size-wrapper">
            <h4>внутренние размеры</h4>
            <?= Html::activeTextInput($contact, 'inner_length', ['placeholder' => 'длина(мм)']); ?>
            <?= Html::activeTextInput($contact, 'inner_width', ['placeholder' => 'ширина(мм)']); ?>
            <?= Html::activeTextInput($contact, 'inner_height', ['placeholder' => 'высота(мм)']); ?>
        </div>
        <div class="fundament-wrapper">
            <h3>фундамент</h3>
            <?= $form->field($contact, 'build_foundation')->checkboxList(['Винтовой' => 'Винтовой', 'Ленточный' => 'Ленточный', 'Столбчатый' => 'Столбчатый', 'Щебёночное основание'=>'Щебёночное основание', 'Асфальт'=>'Асфальт', 'Иное'=>'Иное']); ?>

            <label class="submit-img">
                <img src="/images/doc-icon.png" alt="">
                <?= $form->field($contact, 'file_route')->fileInput()->label('Прикрепить файл'); ?>
            </label>
            <input type="submit" value="Отправить заявку" class="btn btn-orange">
        </div>
    </div>
    <div class="col-md-2 visible-md visible-lg excel">
        <?php foreach (ArrayHelper::getValue($settingsArr, 'catalog-link', []) as $info_block) { ?>
            <a href="<?= ($info_block['image']).'.xls' ?>">
                <img src="/images/excel-icon.png" alt="">
                <div>скачать прайс</div>
            </a>
        <?php } ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

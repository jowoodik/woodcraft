<?php
/**
 * @var $this yii\web\View
 * @var $form yii\bootstrap\ActiveForm
 * @var \app\models\forms\LoginForm $model
 */

use app\modules\admin\assets\AdminAsset;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

AdminAsset::register($this);
?>
<div class="login-box">
    <div class="login-logo">
        <?= Html::encode($this->title) ?>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Введите логин и пароль</p>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'fieldConfig' => [
                'template' => '{input}',
                'options' => ['class' => 'form-group has-feedback'],
//                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]); ?>
        <?= $form->field($model, 'username', ['template' => '{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span>'])->textInput(['placeholder' => 'Логин']) ?>

        <?= $form->field($model, 'password', ['template' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>'])->passwordInput(['placeholder' => 'Пароль']) ?>


        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">

                    <?= $form->field($model, 'rememberMe')->checkbox([
//                                'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                        'label' => 'Запомнить',
                        'options' => ['class' => 'icheckbox_square-blue']
                    ]) ?>

                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>
        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-box-body -->
</div>

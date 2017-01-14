<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

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
<?php else: ?>

    <div class="col-md-4 col-xs-12">
        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

        <div class="row">
            <div class="col-md-6 col-xs-12">
                <?= $form->field($contact, 'name')->textInput(['autofocus' => false, 'placeholder' => 'Ваше Имя:', 'class' => 'form-control message'])->label(false); ?>
            </div>
            <div class="col-md-6 col-xs-12">
                <?= $form->field($contact, 'email')->textInput(['placeholder' => 'Ваш email:', 'class' => 'form-control message'])->label(false); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($contact, 'body')->textArea(['placeholder' => 'Сообщение', 'class' => 'form-control message', 'rows' => 2])->label(false); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <?= Html::submitButton('Отправить сообщение', ['class' => 'btn send']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

<?php endif; ?>
<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Контакт';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact row">
<div class="col-md-9">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Спасибо что воспользовались формой. Мы свяжемся как только будет возможно.
        </div>

        <p>
            Обратите внимание, что если вы включите отладчик Yii, вы сможете
             для просмотра почтового сообщения на панели почты отладчика.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Поскольку приложение находится в режиме разработки, электронное письмо не отправляется, а сохраняется как
                 файл под <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            Если у вас есть деловые запросы или другие вопросы, пожалуйста, заполните следующую форму, чтобы связаться с нами.
             Спасибо.
        </p>

        <div class="row">
		
            <div id="contact" class="col-10 col-md-6 col-lg-5 p-5 mx-auto mb-2">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                        'template' => '<div class="row"><div class="col-6">{image}</div><div class="col-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
<?= $this->render('_sidebar') ?>
</div>
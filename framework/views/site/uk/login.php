<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="site-login" class="col-10 col-md-6 col-lg-5 p-5 mx-auto my-2">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Заповнить, будь ласка, поля для вводу, щоб увийти:</p>
	
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        
	
        <div class="input-group">
            
				<?= $form->field($model, 'rememberMe')->checkbox([
				'template' => "<div class=\"offset-lg-1 col-lg-3 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>"]) ?>
                <?= Html::submitButton('Ввийти', ['id' => 'login-button', 'class' => 'btn btn-primary', 'name' => 'login-button']) ?>
           
        </div>

    <?php ActiveForm::end(); ?>

   
</div>

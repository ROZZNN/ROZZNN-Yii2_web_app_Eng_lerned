<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RegistrationForm $model */
/** @var ActiveForm $form */
?>
<div class="site-registration">

    <?php $form = ActiveForm::begin(); ?>

    <div class="mb-3">
        <?= $form->field($model, 'login')->textInput(['class' => 'form-control', 'aria-describedby' => 'loginHelp'])->label('Логин') ?>
        <div id="loginHelp" class="form-text">We'll never share your login with anyone else.</div>
    </div>


    <div class="mb-3">
        <?= $form->field($model, 'email')->textInput(['class' => 'form-control', 'aria-describedby' => 'emailHelp'])->label('Почта') ?>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control'])->label('Пароль') ?>
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Я соглашаюсь с пользовательским соглашением</label>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div><!-- site-registration -->
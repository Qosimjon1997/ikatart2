<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Change password';

?>
<h1>helooo</h1>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Saler Reset password</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'oldpassword')->input('password') ?>

                <?= $form->field($model, 'password1')->input('password') ?>

                <?= $form->field($model, 'password2')->input('password') ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

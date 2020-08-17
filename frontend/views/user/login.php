<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="fadeInDown m-auto">
      <div id="formContent">
        <div class="row form-header justify-content-around p-3 align-items-center">
            <div class="col">
                <?= Html::tag('h3', $this->title, ['class' => 'text-info text-decoration-none']) ?>
            </div>
            <div class="col">
                <span> <?= Yii::t('app', 'New user?') ?> </span>
                <?= Html::a(Yii::t('app', 'Register'), ['user/signup'], ['class' => 'text-info text-decoration-none']) ?>
            </div>
        </div>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'class' => 'form-signin',
            'fieldConfig' => [
                'template' => "<div class=\"p-1 col-12 form-label-group text-left\">{input}</div>\n<div>{error}</div>",
            ],
        ]); ?>
            <?= $form->field($model, 'email')->textInput([
              'autofocus' => true,
              'class' => 'form-control',
              'placeholder' => 'Email' ])?>
            <small><?= Html::a(Yii::t('app', 'Forgot password?'), ['user/request-password-reset'], ['class' => 'text-dark d-block text-right']) ?></small>
            <?= $form->field($model, 'password')->passwordInput([
              'class' => 'form-control',
              'placeholder' => 'Password']) ?>
            <div class="row my-2">
                <div class="col">
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>
                <div class="col">
                    <?= Html::a(Yii::t('app', 'Didn\'t get verification email?'), ['user/resend-verification-email'], ['class' => 'text-dark text-right']) ?>
                </div>
            </div>


            <div class="form-group">
                <div class="col-12">
                    <?= Html::submitButton($this->title, ['class' => 'btn btn-primary btn-block', 'name' => 'login_button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>

      </div>
    </div>
</div>


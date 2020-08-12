<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Staff Login';
?>
<div class="fadeInDown m-auto">
  <div id="formContent">
    <img src="/backend/web/img/logo.png" class="logo">
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'class' => 'form-signin',
        'fieldConfig' => [
            'template' => "<div class=\"p-1 col-12 form-label-group text-left\">{input}</div>\n<div>{error}</div>",
        ],
    ]); ?>
        <?= $form->field($model, 'username')->textInput([
          'autofocus' => true,
          'class' => 'form-control',
          'placeholder' => 'Username' ])?>

        <?= $form->field($model, 'password')->passwordInput([
          'class' => 'form-control',
          'placeholder' => 'Password']) ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div class="form-group">
            <div class="col-12">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login_button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

  </div>
</div>

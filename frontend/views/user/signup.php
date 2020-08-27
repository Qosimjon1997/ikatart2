<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = Yii::t('app', 'Register');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
  <div class="fadeInDown m-auto">
    <div id="formContent">
      <div class="row form-header justify-content-around p-3 align-items-center">
          <div class="col">
              <span> <?= Yii::t('app', 'I have an account.') ?> </span>
              <?= Html::a(Yii::t('app', 'Login'), ['user/login'], ['class' => 'text-info text-decoration-none']) ?>
          </div>
      </div>
      <?php $form = ActiveForm::begin([
          'id' => 'form-signup',
          'layout' => 'horizontal',
          'class' => 'form-signin',
          'fieldConfig' => [
              'template' => "<div class=\"p-1 col-12 form-label-group text-left\">{input}</div>\n<div>{error}</div>",
          ],
      ]); ?>
          <?= $form->field($model, 'email')->textInput([
            'autofocus' => true,
            'class' => 'form-control',
            'placeholder' => Yii::t('app', 'Email') ])?>
          <?= $form->field($model, 'password')->passwordInput([
            'class' => 'form-control',
            'placeholder' => Yii::t('app', 'Password')]) ?>

          <div class="form-group">
              <div class="col-12">
                  <?= Html::submitButton($this->title, ['class' => 'btn btn-primary btn-block', 'name' => 'login_button']) ?>
              </div>
          </div>

      <?php ActiveForm::end(); ?>

    </div>
  </div>
</div>

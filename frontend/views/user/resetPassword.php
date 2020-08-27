<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = Yii::t('app', 'Reset password');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="fadeInDown m-auto">
  <div id="formContent">
    <div class="row form-header justify-content-around p-3 align-items-center">
        <div class="col">
            <?= Html::tag('h3',  Html::encode($user->title), ['class' => 'text-info']) ?>
        </div>
    </div>
    <?php $form = ActiveForm::begin([
        'id' => 'reset-password',
        'layout' => 'horizontal',
        'class' => 'form-signin',
        'fieldConfig' => [
            'template' => "<div class=\"p-1 col-12 form-label-group text-left\">{input}</div>\n<div>{error}</div>",
        ],
    ]); ?>

        <?= $form->field($model, 'password')->passwordInput([
          'class' => 'form-control',
          'autofocus' => true,
          'placeholder' => Yii::t('app', 'Password')]) ?>

        <div class="form-group">
            <div class="col-12">
                <?= Html::submitButton($this->title, ['class' => 'btn btn-primary btn-block', 'name' => 'login_button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

  </div>
</div>


<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = Yii::t('app', 'Request password reset');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    <div class="fadeInDown m-auto">
      <div id="formContent">
        <div class="row form-header justify-content-around p-3 align-items-center">
            <div class="col">
                <?= Html::tag('h3',  Html::encode($this->title), ['class' => 'text-info']) ?>
            </div>
        </div>
        <?php $form = ActiveForm::begin([
            'id' => 'request-password-reset-form',
            'layout' => 'horizontal',
            'class' => 'form-signin',
            'fieldConfig' => [
                'template' => "<div class=\"p-1 col-12 form-label-group text-left\">{input}</div>\n<div>{error}</div>",
            ],
        ]); ?>

            <?= $form->field($model, 'email')->textInput([
                'autofocus' => true,
                'class' => 'form-control',
                'placeholder' => 'Email'
            ]) ?>

            <div class="form-group">
                <div class="col-12">
                    <?= Html::submitButton($this->title, ['class' => 'btn btn-primary btn-block', 'name' => 'login_button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>

      </div>
    </div>
</div>

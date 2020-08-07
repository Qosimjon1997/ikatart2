<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bajadev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Saler */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="saler-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <?= $form->field($model, 'secondname')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <?= $form->field($model, 'passport')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    </div>
    <?php
        foreach ($lang->info as $key => $value) {
            echo '<div class="form-group col-12" style="padding: 0 15px; clear: both">';
            echo $form->field($lang, 'info['.$key.']')
            ->textarea([
                'rows' => 6,
                'value' => $value,
                'required' => true,
                // 'class' => 'form-control',
            ])
            ->label(Yii::t('app', 'Info('.$key.')'));
            echo '</div>';
        }
    ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

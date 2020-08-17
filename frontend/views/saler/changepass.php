<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Mass;
use backend\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'oldpassword')->input('password') ?>

    <?= $form->field($model, 'newpassword')->input('password') ?>

    <?= $form->field($model, 'newpasswordconfirm')->input('password') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

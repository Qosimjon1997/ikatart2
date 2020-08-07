<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Topproduct */
/* @var $form yii\widgets\ActiveForm */
?>
<h1><?= Yii::t('app', 'Password Reset') ?></h1>
<div class="topproduct-form">
	<?php
		if($success) {
			echo '<div class="alert alert-success">'.Yii::t('app', 'Password has been changed successfuly!').'</div>';
		}
	?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'oldpassword')->textInput() ?>

    <?= $form->field($model, 'password')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

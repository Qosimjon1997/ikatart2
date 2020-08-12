<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

	<?php
		if($success) {
			echo '<div class="alert alert-success">'.Yii::t('app', 'Password has been changed successfuly!').'</div>';
		}
	?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'oldpassword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

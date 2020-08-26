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

	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>

	<fieldset class="shadow-sm p-3 mb-5 bg-white rounded">
		<legend class="text-primary"><?= Yii::t('app', 'User information') ?></legend>
		<div class="row">
			<div class="col-12 form-group">
				<?= $form->field($user, 'firstname')->textInput() ?>

				<?= $form->field($user, 'secondname')->textInput() ?>

				<?= $form->field($user, 'zipcode')->textInput() ?>

				<?= $form->field($user, 'phone')->textInput() ?>

			</div>
		</div>
	</fieldset>

	<fieldset class="shadow-sm p-3 mb-5 bg-white rounded">
		<legend class="text-primary"><?= Yii::t('app', 'Password change') ?></legend>
		<div class="row">
			<div class="col-12 form-group">
				<?= $form->field($model, 'oldpassword')->passwordInput() ?>
			</div>
			<div class="col-12 form-group">
				<?= $form->field($model, 'newpassword')->passwordInput() ?>
			</div>
			<div class="col-12 form-group">
				<?= $form->field($model, 'newpasswordconfirm')->passwordInput() ?>
			</div>
		</div>
	</fieldset>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

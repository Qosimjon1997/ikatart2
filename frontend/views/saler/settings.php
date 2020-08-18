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
		<legend class="text-primary"><?= Yii::t('app', 'Personal information') ?></legend>
		<div class="row">
			<div class="col-12 form-group">
				<?= $form->field($saler, 'firstname')->textInput() ?>

				<?= $form->field($saler, 'secondname')->textInput() ?>

				<?= $form->field($saler, 'phone')->textInput() ?>

				<?= $form->field($saler, 'passport')->textInput() ?>

				<?= $form->field($saler, 'inn')->textInput() ?>
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

	<fieldset class="shadow-sm p-3 mb-5 bg-white rounded">
		<legend class="text-primary"><?= Yii::t('app', 'My history') ?></legend>
		<div class="row justify-content-between">
			<div class="col-12 form-group">
				<?= $form->field($history[0], 'name')->textarea(['rows' => 6]) ?>
			</div>
	    	<div class="col-12 col-md-4">
	    	<?= $form->field($img, 'imageFile')->fileInput([
	            'class' => 'col-12',
	            'onchange' => "loadFile(event)",
	            // 'required' => true,
	        ])->label('') ?>
			</div>

			<div class="col-12 col-md-4 preview">
	            <?php
	                if(isset($image[0])) {
	                    echo '<img id="img" src="/backend/web/upimages/' . $image[0]->path . '">';
	                }
	                else {
	                    echo '<img id="img" src="/backend/web/img/upload.png">';
	                }
	            ?>
			</div>
		</div>
	</fieldset>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

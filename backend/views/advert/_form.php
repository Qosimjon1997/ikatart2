<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Advert */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advert-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	<div class="row">
		<div class="col-12">
 		   	<?= $form->field($model, 'link')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
    	</div>

    	<div class="custom-file col-12 col-md-4 form-group m-3">
    	<?= $form->field($img, 'imageFile')->fileInput(['class' => 'col-12 custom-file-input'])
    		->label('Choose file...', ['class' => 'custom-file-label']) ?>
		</div>

		<div class="form-group col-12 col-8" style="background-size: contain; height: 250px; background-image: url(<?= '/backend/web/img/upload.png' ?>)">
		</div>

	</div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

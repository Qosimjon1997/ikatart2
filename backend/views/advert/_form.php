<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Advert */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advert-form">
    <?php
        print_r($image->getErrors());
        print_r($img->getErrors());
    ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	<div class="row justify-content-between">
		<div class="col-12">
 		   	<?= $form->field($model, 'link')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
    	</div>

    	<div class="col-12 col-md-4">
    	<?= $form->field($img, 'imageFile')->fileInput([
            'class' => 'col-12',
            'onchange' => "loadFile(event)"])->label('') ?>
		</div>

		<div class="col-12 col-md-4 preview">
            <img id="img" src=" <?= '/backend/web/img/upload.png' ?>">
		</div>

	</div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



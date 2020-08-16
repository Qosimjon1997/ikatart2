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

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(),'id','name'),['prompt'=>'Categories']) ?>

    <?= $form->field($model, 'info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mass_id')->dropDownList(ArrayHelper::map(Mass::find()->all(),'id','mass'),['prompt'=>'Massa ']) ?>
    <div class="custom-file col-12 col-md-4 form-group m-3">
        <?= $form->field($modelimage, 'imageFile')->fileInput(['class' => 'col-12 custom-file-input'])
    		->label('Choose file...', ['class' => 'custom-file-label']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

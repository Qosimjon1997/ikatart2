<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Cards;
use backend\models\Address;
use backend\models\Category;
use yii\helpers\ArrayHelper;

?>
<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model1, 'address')->textInput() ?>

    <?= $form->field($model2, 'number')->textInput() ?>

    <?= $form->field($model3, 'name')->textInput() ?>

    <div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Save1'), ['class' => 'btn btn-success','name'=>'submit','value'=>'1']) ?>
    </div>
    <div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Save2'), ['class' => 'btn btn-success','name'=>'submit','value'=>'2']) ?>
    </div>
    <div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Save3'), ['class' => 'btn btn-success','name'=>'submit','value'=>'3']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>

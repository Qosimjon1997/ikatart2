<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Zone;
use backend\models\Posttype;
use backend\models\Mass;

/* @var $this yii\web\Vxiew */
/* @var $model app\models\Pricelist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pricelist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'zone_id')->dropDownList(ArrayHelper::map(Zone::find()->all(),'id','zone')) ?>

    <?= $form->field($model, 'mass_id')->dropDownList(ArrayHelper::map(Mass::find()->all(),'id','mass')) ?>

    <?= $form->field($model, 'posttype_id')->dropDownList(ArrayHelper::map(Posttype::find()->all(),'id','name')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Zone;
use backend\models\Posttype;

/* @var $this yii\web\View */
/* @var $model backend\models\Duration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="duration-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'day')->textInput() ?>

    <?= $form->field($model, 'zone_id')->dropDownList(ArrayHelper::map(Zone::find()->all(),'id','zone'),) ?>

    <?= $form->field($model, 'posttype_id')->dropDownList(ArrayHelper::map(Posttype::find()->all(),'id','name'),) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

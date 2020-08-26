<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Cardtype;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Cards */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cards-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'expirationdate')->textInput() ?>

    <?= $form->field($model, 'cardtype_id')->dropDownList(ArrayHelper::map(Cardtype::find()->all(), 'id', 'name'), ['prompt' => 'Card type']) ?>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\Product;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Images */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="images-form">

    <?php $form = ActiveForm::begin(); ?>



    <div class="row justify-content-between">
        <div class="col-12">
            <?= $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Product::find()->all(), 'id', 'name')) ?>
        </div>

        <div class="col-12 col-md-4 row flex-column justify-content-between p-3 form-group">
            <?= $form->field($img, 'imageFile')->fileInput([
                'class' => 'col-12',
                'onchange' => "loadFile(event)",
                // 'required' => true,
            ])->label('') ?>
            <?= $form->field($model, 'main')->checkbox(['class' => 'm-3']) ?>
        </div>

        <div class="col-12 col-md-4 preview">
            <?php
                if(isset($model->path)) {
                    echo '<img id="img" src="/backend/web/upimages/' . $model->path . '">';
                }
                else {
                    echo '<img id="img" src="/backend/web/img/upload.png">';
                }
            ?>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

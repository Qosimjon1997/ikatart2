<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin();
        print_r($lang->Errors);
        print_r($model->Errors);
        foreach ($lang->names as $key => $value) {
            echo '<div class="form-group float-left col-12 col-md-6">';
            echo $form->field($lang, 'names['.$key.']')
            ->textInput([
                'value' => $value,
                'required' => true,
                'class' => 'form-control',
            ])->label(Yii::t('app', 'Name ('.$key.')'));
            echo '</div>';
        }

        foreach ($lang->info as $key => $value) {
            echo '<div class="form-group col-12" style="padding: 0 15px; clear: both">';
            echo $form->field($lang, 'info['.$key.']')
            ->textarea([
                'rows' => 6,
                'value' => $value,
                'required' => true,
            ])
            ->label(Yii::t('app', 'Info ('.$key.')'));
            echo '</div>';
        }
    ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

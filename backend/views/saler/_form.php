<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bajadev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Saler */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="saler-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>
    <div class="row">
    <?php
        foreach ($lang->info as $key => $value) {
            echo '<div class="col-12">';
            echo $form->field($lang, 'info['.$key.']')
            ->textarea([
                'rows' => 6,
                'value' => $value,
            ])
            ->label(Yii::t('app', 'Info('.$key.')'));
            echo '</div>';
        }
    ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

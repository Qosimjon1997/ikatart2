<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">
    <?php
    	$categories = Category::find()->all();
    	$category = [null => ''];
	    foreach ($categories as $categ) {
	    	$category[$categ['id']] = $categ->name;
	    }

    	$form = ActiveForm::begin();

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
    ?>

    <?= '<div class="form-group col-lg-12">'.$form->field($model, 'category_id')->dropDownList($category, ['options' => ['class' => 'form-control']]).'</div>' ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

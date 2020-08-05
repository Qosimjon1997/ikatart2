<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Productlanguages */

$this->title = Yii::t('app', 'Create Productlanguages');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productlanguages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productlanguages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

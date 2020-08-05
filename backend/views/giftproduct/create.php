<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Giftproduct */

$this->title = Yii::t('app', 'Create Giftproduct');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Giftproducts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giftproduct-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

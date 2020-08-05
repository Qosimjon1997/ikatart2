<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Topproduct */

$this->title = Yii::t('app', 'Create Topproduct');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Topproducts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topproduct-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mass */

$this->title = Yii::t('app', 'Create Mass');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Masses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mass-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

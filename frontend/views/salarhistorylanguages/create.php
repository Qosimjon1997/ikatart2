<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Salarhistorylanguages */

$this->title = Yii::t('app', 'Create Salarhistorylanguages');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salarhistorylanguages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salarhistorylanguages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

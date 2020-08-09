<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Productnamelanguages */

$this->title = Yii::t('app', 'Create Productnamelanguages');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productnamelanguages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productnamelanguages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

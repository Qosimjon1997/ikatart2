<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cardtype */

$this->title = Yii::t('app', 'Create Cardtype');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cardtypes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cardtype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

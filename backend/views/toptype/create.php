<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Toptype */

$this->title = Yii::t('app', 'Create Toptype');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Toptypes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="toptype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

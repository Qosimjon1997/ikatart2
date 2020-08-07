<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Saler */

$this->title = Yii::t('app', 'Create Saler');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saler-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'lang' => $lang,
    ]) ?>

</div>

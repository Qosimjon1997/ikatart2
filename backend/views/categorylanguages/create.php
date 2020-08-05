<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categorylanguages */

$this->title = Yii::t('app', 'Create Categorylanguages');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categorylanguages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorylanguages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

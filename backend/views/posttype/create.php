<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Posttype */

$this->title = Yii::t('app', 'Create Posttype');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posttypes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posttype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

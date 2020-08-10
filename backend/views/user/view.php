<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            // 'auth_key',
            // 'password',
            // 'password_reset_token',
            'email:email',
            'status',
            'created_at',
            'updated_at',
            // 'verification_token',
            'firstname',
            'secondname',
            'zipcode',
            'phone',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Saler */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="saler-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'firstname',
            'secondname',
            'passport',
            'inn',
            'email:email',
            // 'password',
            'phone',
            // 'auth_key',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'verification_token',
            // 'password_reset_token',
        ],
    ]) ?>

    <div class="row">
        <?php
            foreach ($lang->info as $key => $value) {
        ?>
        <div class="col-12 col-md-6 form-group">
            <label class="col-12 d-block" for="<?= $key ?>"><?= Yii::t('app', 'Info('. $key .')') ?></label>
            <textarea class="form-control" style="resize: none" class=" p-2 col-12" id="<?= $key ?>" rows="6" cols="74" readonly><?=$value?></textarea>
        </div>
        <?php } ?>
    </div>

</div>

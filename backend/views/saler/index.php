<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Salers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saler-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'firstname',
            'secondname',
            // 'passport',
            // 'inn',
            'email:email',
            //'password',
            'phone',
            //'auth_key',
            //'status',
            //'created_at',
            //'updated_at',
            //'verification_token',
            //'password_reset_token',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="fa fa-pen"></span>', $url, [
                                    'title' => Yii::t('app', 'Update'),
                        ]);
                    },

                    'view' => function ($url, $model) {
                        return Html::a('<span class="fa fa-eye"></span>', $url, [
                                    'title' => Yii::t('app', 'View'),
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>


</div>

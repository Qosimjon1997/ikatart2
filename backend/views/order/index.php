<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'basket.product.name',
            'basket.user.email',
            'basket.count',
            'date',
            'basket.product.saler.email',
            'totalcost',
            'zipcode',
            'address.address',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ($isActive == 0 ? '{accept}' : ''),
                'buttons' => [
                    'accept' => function ($url, $model) {
                        return Html::a('<span class="fa fa-check"></span>', $url, [
                                    'title' => Yii::t('app', 'Accept'),
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>


</div>

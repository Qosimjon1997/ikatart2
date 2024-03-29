<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MainproductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Main Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainproduct-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product.name',

            [
                'attribute' => 'product.image.path',
                'format' => 'html',
                'value' => function($data) {
                    return Html::img('/backend/web/upimages/'. $data->product->images[0]->path, ['alt' => $data->product->name, 'class' => 'index-image']);
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="fa fa-trash"></span>', $url, [
                                    'title' => Yii::t('app', 'Delete'), 'data-method' => 'post',
                        ]);
                    }
                ],
            ],
        ],
    ]); ?>


</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'price',
            'saler.email',
            'category.name',
            // 'isActive',
            'info:ntext',
            'mass',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{main} {view} {update} '. ($isActive === 1 ? '{delete}': '{activate}'),
                'buttons' => [

                    'main' => function ($url, $model) {
                        return Html::a('<span class="fas fa-home"></span>', $url, [
                                    'title' => Yii::t('app', 'Main'),
                        ]);
                    },

                    'view' => function ($url, $model) {
                        return Html::a('<span class="far fa-eye"></span>', $url, [
                                    'title' => Yii::t('app', 'View'),
                        ]);
                    },

                    'update' => function ($url, $model) {
                        return Html::a('<span class="fa fa-pen"></span>', $url, [
                                    'title' => Yii::t('app', 'Update'),
                        ]);
                    },

                    'delete' => function ($url, $model) {
                        return Html::a('<span class="fa fa-trash"></span>', $url, [
                                    'title' => Yii::t('app', 'Delete'), 'data-method' => 'post',
                        ]);
                    },

                    'activate' => function ($url, $model) {
                        return Html::a('<span class="fa fa-plus"></span>', $url, [
                                    'title' => Yii::t('app', 'Activate'), 'data-method' => 'post',
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>


</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ZoneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Zones');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zone-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Zone'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'zone',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    //view button
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
                                    'title' => Yii::t('app', 'Delete'), 'data-method' => 'post'
                        ]);
                    }
                ],
            ],
        ],
    ]); ?>


</div>

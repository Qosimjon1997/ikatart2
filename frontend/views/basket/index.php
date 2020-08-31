

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BasketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Baskets');
$this->params['breadcrumbs'][] = $this->title;
?>

 
<div class="container my-5 py-5 m-auto">

<?php
    foreach ($model as $value) {

        ?>

    <div class="row m-0 p-4 box-shadow-light product-item">
        <div class="col-12 col-sm-3">
            <?= Html::img('/backend/web/upimages/' . $value->product->images[0]->path, ['class' => 'product-image', 'alt' => $value->product->name ]); ?>
        </div>
        <div class="col-12 col-sm-9">
            <h3 class=""><?php echo $value->product->name ?></h3>
            <p class="text-justify"><?php echo $value->product->info ?></p>
            <div>
                <i class="text-danger">Price:</i>
                <b>$ <?php echo $value->product->price ?></b>
            </div>
            <div>
                <i class="text-danger"><?= Yii::t('app', 'Shipping for each product')?> :</i>
                <b>10.00$</b>
                <i class="text-success">by post service <?php echo $posttype->name?> express</i>
            </div>
            <!-- <button class="btn del-btn d-none d-sm-block"><i class="far fa-trash-alt"></i></button> -->
            <?= Html::a('<i class="far fa-trash-alt"></i>', Url::to(['basket/remove', 'id' => $value->id]), ['class' => 'btn del-btn d-none d-sm-block']) ?>
            <div class="text-right my-3">
                <!-- <button class="btn btn-danger float-left d-inline-block d-sm-none"><i class="far fa-trash-alt"></i></button> -->
                <?= Html::a('<i class="far fa-trash-alt"></i>', Url::to(['basket/remove', 'id' => $value->id]), ['class' => 'btn btn-danger float-left d-inline-block d-sm-none']) ?>
                <?= Html::a('<i class="btn">' . Yii::t('app', 'Buy') . '</i>', Url::to(['product/buy', 'id' => $value->product_id]), ['class' => 'btn px-5 btn-outline-success float-right']) ?>
            </div>
        </div>
    </div>

<?php
    }
    ?>
</div>
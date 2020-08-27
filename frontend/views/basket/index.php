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
<?php foreach ($model as $variable){

    ?>
    <div class="row m-0 p-4 box-shadow-light product-item">
        <div class="col-12 col-sm-3">
            <?= Html::img('/backend/web/upimages/'.$modelimgs->path, ['alt' => ''.$variable->product->name, 'class' => 'product-image']) ?>
        </div>
        <div class="col-12 col-sm-9">
            <h3 class=""><?php echo $variable->product->name;?></h3>
            <p class="text-justify"><?php echo $variable->product->info;?></p>
            <div>
                <i class="text-danger">Price:</i>
                <b><?php echo $variable->product->price;?>$</b>
            </div>
            <div>
                <i class="text-danger">Shipping for each product:</i>
                <b>10.00$</b>
                <i class="text-success">by post service <?php echo $postType->name?> express</i>
            </div>
                <?= Html::a('<i class="far fa-trash-alt"></i>', Url::to(['basket/remove', 'id' => $variable->id]), ['class' => 'btn del-btn d-none d-sm-block']) ?>
            <div class="text-right my-3">
                <button class="btn btn-danger float-left d-inline-block d-sm-none"><i class="far fa-trash-alt"></i></button>
                <!-- <button class="btn px-5 btn-outline-success float-right">
                    <?= Yii::t('app', 'Buy')?>

                </button> -->
                <?= Html::a('<i class="btn">' . Yii::t('app', 'Buy') . '</i>', Url::to(['product/buy', 'id' => $variable->id]), ['class' => 'btn px-5 btn-outline-success float-right']) ?>
            </div>
        </div>
    </div>
    <?php   }  ?>
</div>
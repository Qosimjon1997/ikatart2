<?php
use frontend\assets\CategoryAsset;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
CategoryAsset::register($this);
?>

<h2 class="text-blue text-center m-1"><?php Yii::t('app', 'Works by regions')?></h2>

<div class="row mx-sm-4">
    <?php foreach ($model as $value) { ?>
        <div class="col-6 col-md-4 col-lg-3 my-2">
            <div class="card-item bg-light box-shadow-blue">
                <?= Html::a(Html::img('/backend/web/upimages/' . $value->images[0]->path, ['alt' => $value->name, 'class' => 'card-image']), Url::to(['product/buy', 'id' => $value->id]), []) ?>
                <div class="card-label p-2">
                    <div class="card-name"><?php $value->name?></div>
                    <div class="card-price text-success">$<?php $value->price?></div>
                </div>
                <div class="card-pane m-0">
                    <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => $value->id]), ['class' => 'btn btn-block text-center btn-blue']) ?>
                </div>
            </div>
        </div>  
    <?php } ?>
    

</div>
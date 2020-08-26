<?php
use yii\helpers\Html;
?>


<div class="container my-5 py-5 m-auto">
    <div class="row m-0 p-4 box-shadow-light product-item">
        <div class="col-12 col-sm-3">
            <?= Html::img('/frontend/web/img/1.jpg', ['alt' => 'Product name', 'class' => 'product-image']) ?>
        </div>
        <div class="col-12 col-sm-9">
            <h3 class="">Product name</h3>
            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <div>
                <i class="text-danger">Price:</i>
                <b>40.00$</b>
            </div>
            <div>
                <i class="text-danger">Shipping for each product:</i>
                <b>10.00$</b>
                <i class="text-success">by post service EMS express</i>
            </div>
            <button class="btn del-btn d-none d-sm-block"><i class="far fa-trash-alt"></i></button>
            <div class="text-right my-3">
                <button class="btn btn-danger float-left d-inline-block d-sm-none"><i class="far fa-trash-alt"></i></button>
                <button class="btn px-5 btn-outline-success float-right"><?= Yii::t('app', 'Buy')?></button>
            </div>
        </div>
    </div>
</div>
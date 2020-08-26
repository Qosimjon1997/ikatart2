<?php

use yii\helpers\Html;
use frontend\assets\HeroAsset;
HeroAsset::register($this);

?>

<div class="row m-0">
  <div class="col-12 col-md-9 p-0">
    <div id="carouselExampleIndicators" class="carousel slide row" data-ride="carousel">
      <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3" class=""></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4" class=""></li>
      </ol>
      <div class="carousel-inner w-100 p-0">
          <div class="carousel-item w-100 p-0 position-relative active">
              <img class="d-block w-100" src="/frontend/web/img/hero/1.1.jpg" alt="slider-1">
              <div class="carousel-text"><?= Yii::t('app', 'Only Natural Materials') ?></div>
          </div>
          <div class="carousel-item w-100 p-0  position-relative">
              <img class="d-block w-100" src="/frontend/web/img/hero/1.2.jpg" alt="slider-2">
              <div class="carousel-text"><?= Yii::t('app', 'Delivery to anywhere in the world') ?></div>
          </div>
          <div class="carousel-item w-100 p-0  position-relative">
              <img class="d-block w-100" src="/frontend/web/img/hero/1.3.jpg" alt="slider-3">
              <div class="carousel-text"><?= Yii::t('app', 'Our craftsmen') ?></div>
          </div>
          <div class="carousel-item w-100 p-0  position-relative">
              <img class="d-block w-100" src="/frontend/web/img/hero/1.4.jpg" alt="slider-4">
              <div class="carousel-text"><?= Yii::t('app', 'Fast delivery service') ?></div>
          </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-3 row m-0 p-0"  style="overflow: hidden">
    <div class="col-6 col-md-12 advert p-0">
      <?= Html::img('/frontend/web/img/hero/top/1.jpg', ['alt' => 'advert']) ?>
    </div>
    <div class="col-6 col-md-12 advert p-0">
      <?= Html::img('/frontend/web/img/hero/top/2.jpg', ['alt' => 'advert']) ?>
    </div>
  </div>
</div>

  <?php
$script = <<< JS
    $(document).ready(function() {
        $('.carousel').carousel({
          interval: 3000
        })
    });
JS;
$this->registerJs($script);
?>
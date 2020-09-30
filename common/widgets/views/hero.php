<?php

use yii\helpers\Html;
use frontend\assets\HeroAsset;
HeroAsset::register($this);

?>

<div class="row m-auto hero">
  <div class="col-12 h-100 col-md-9 p-0">
    <div id="carouselExampleIndicators" class="h-100 carousel slide row" data-ride="carousel">
      <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3" class=""></li>
		  <li data-target="#carouselExampleIndicators" data-slide-to="4" class=""></li>
      </ol>
      <div class="carousel-inner h-100 w-100 p-0">
          <div class="carousel-item h-100 w-100 p-0 position-relative active hero">
              <img class="d-block w-100 h-100" src="/frontend/web/img/hero/1.1.jpg" alt="slider-1">
              <div class="carousel-text"><?= Yii::t('app', 'From the hands of the master into your hands') ?></div>
          </div>
          <div class="carousel-item h-100 w-100 p-0  position-relative">
              <img class="d-block w-100 h-100" src="/frontend/web/img/hero/1.2.jpg" alt="slider-2">
              <div class="carousel-text"><?= Yii::t('app', 'The silk road works!') ?></div>
          </div>
          <div class="carousel-item h-100 w-100 p-0  position-relative">
              <img class="d-block w-100 h-100" src="/frontend/web/img/hero/1.3.jpg" alt="slider-3">
              <div class="carousel-text"><?= Yii::t('app', 'Beauty in the eyes') ?></div>
          </div>
          <div class="carousel-item h-100 w-100 p-0  position-relative">
              <img class="d-block w-100 h-100" src="/frontend/web/img/hero/1.4.jpg" alt="slider-4">
              <div class="carousel-text"><?= Yii::t('app', 'From Uzbekistan with love ') ?></div>
          </div>
		  <div class="carousel-item h-100 w-100 p-0  position-relative">
              <img class="d-block w-100 h-100" src="/frontend/web/img/hero/1.5.jpg" alt="slider-4">
              <div class="carousel-text"><?= Yii::t('app', 'Fast worldwide delivery') ?></div>
          </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-3 row m-2 h-100 p-0 m-md-0" >
    <div class="col-6 h-50 col-md-12 advert">
      <?= Html::img('/frontend/web/img/hero/top/1.jpg', ['alt' => 'advert', 'class' => 'h-100']) ?>
    </div>
    <div class="col-6 h-50 col-md-12 advert">
      <?= Html::img('/frontend/web/img/hero/top/2.jpg', ['alt' => 'advert', 'class' => 'h-100']) ?>
    </div>
  </div>
</div>
<div class="space d-block d-md-none">

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
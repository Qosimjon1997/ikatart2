<?php
use frontend\assets\CaruselAsset;
use yii\helpers\Html;

CaruselAsset::register($this);
?>

<h2 class="text-center text-blue mt-5"> New Collection</h2>
<div class="owl-slide owl-carousel owl-theme owl-carousel-blog row justify-content-center m-auto p-0">
  <div class="card-item bg-light">
    <?= Html::a(Html::img('/frontend/web/img/slide/1.jpg', ['alt' => 'product name', 'class' => 'card-image']), ['/'], []) ?>
    <div class="card-label p-2">
        <div class="card-name">Pillow</div>
        <div class="card-price text-success">$40.00</div>
    </div>

    <div class="card-pane m-0">
        <?= Html::a('<i class="fas fa-shopping-cart"></i>', ['/'], ['class' => 'btn btn-block text-center btn-blue']) ?>
    </div>
  </div>
  <div class="card-item bg-light">
    <?= Html::a(Html::img('/frontend/web/img/slide/1.jpg', ['alt' => 'product name', 'class' => 'card-image']), ['/'], []) ?>
    <div class="card-label p-2">
        <div class="card-name">Pillow</div>
        <div class="card-price text-success">$40.00</div>
    </div>

    <div class="card-pane m-0">
        <?= Html::a('<i class="fas fa-shopping-cart"></i>', ['/'], ['class' => 'btn btn-block text-center btn-blue']) ?>
    </div>
  </div>
</div>

<?php

$script = <<< JS
    $(document).ready(function() {
      $('.owl-slide').owlCarousel(
      {
        items: 4,
        loop: true,
        rewindNav: false,
        autoplay:true,
        autoplayTimeout: 3000,
        autoplayHoverPause: false,
        margin: 20,
        dots: false,
        responsive:{
            0:{ // breakpoint from 0 up - small smartphones
                items:2,
                nav:true,
                loop:true
            },
            570:{  // breakpoint from 480 up - smartphones // landscape
                items:3,
                nav:true,
                loop:true
            },
            990:{ // breakpoint from 768 up - tablets
                items:4,
                nav:true,
                loop:true
            },
            1130:{ // breakpoint from 992 up - desktop
                items:4,
                nav:true,
                loop:true
            }
        }
      })
    });
JS;
$this->registerJs($script);

?>
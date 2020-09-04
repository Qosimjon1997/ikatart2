<?php
use frontend\assets\CaruselAsset;
use backend\models\Category;
use backend\models\Product;
use backend\models\Topproduct;
use yii\helpers\Html;
use yii\helpers\Url;

CaruselAsset::register($this);
?>

<h2 class="text-center text-blue mt-5"><?= Yii::t('app', 'New Collection') ?></h2>
<div class="owl-slide owl-carousel owl-theme owl-carousel-blog row justify-content-center m-auto">


<?php
    $model = Topproduct::find()->where(['isActive'=>1])->all();
    foreach ($model as $value) {
        

        ?>

  <div class="card-item bg-light">
  <?= Html::a(Html::img('/backend/web/upimages/' . $value->product->images[0]->path, ['alt' => $value->product->name, 'class' => 'card-image']), Url::to(['/product/buy', 'id' => $value->product_id]), []) ?>
  <div class="card-label p-2">
          <div class="card-name"><?php echo $value->product->name?></div>
          <div class="card-price text-success">$<?php echo $value->product->price?></div>
      </div>

      <div class="card-pane m-0">
          <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => $value->product_id]), ['class' => 'btn btn-block text-center btn-blue']) ?>
      </div>
  </div>



  <?php
      }

?>

</div>

<?php

$script = <<< JS
    $(document).ready(function() {
      $('.owl-slide').owlCarousel(
      {
        items: 5,
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
                nav:false,
                loop:true
            },
            570:{  // breakpoint from 480 up - smartphones // landscape
                items:3,
                nav:false,
                loop:true
            },
            990:{ // breakpoint from 768 up - tablets
                items:4,
                nav:false,
                loop:true
            },
        }
      })
    });
JS;
$this->registerJs($script);

?>
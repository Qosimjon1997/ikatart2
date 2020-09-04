<?php
use frontend\assets\CaruselAsset;
use backend\models\Category;
use backend\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;

CaruselAsset::register($this);
?>

<h2 class="text-center text-blue mt-5"><?= Yii::t('app', 'New Collection') ?></h2>
<div class="owl-slide owl-carousel owl-theme owl-carousel-blog row justify-content-center m-auto">


<?php
    $parentCategory = Category::find()->where(['category_id'=>null])->all();
    foreach ($parentCategory as $value) {
      $childCategory = Category::find()->where(['category_id'=>$value->id])->all();
      foreach ($childCategory as $valueProduct) {
        $prod = Product::find()->where(['category_id'=>$valueProduct->id,'isActive'=>1])->one();

        ?>

  <div class="card-item bg-light">
  <?= Html::a(Html::img('/backend/web/upimages/' . $prod->images[0]->path, ['alt' => $name, 'class' => 'card-image']), Url::to(['/product/buy', 'id' => $prod->id]), []) ?>
  <div class="card-label p-2">
          <div class="card-name"><?php echo $prod->name?></div>
          <div class="card-price text-success">$<?php echo $prod->price?></div>
      </div>

      <div class="card-pane m-0">
          <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => $prod->id]), ['class' => 'btn btn-block text-center btn-blue']) ?>
      </div>
  </div>



  <?php
      }

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
        }
      })
    });
JS;
$this->registerJs($script);

?>
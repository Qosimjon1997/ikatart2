<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\BuyAsset;
BuyAsset::register($this);

$val = Yii::$app->language;
?>



<?php if($one == false) { 
	foreach($model as $seller) {
		if(isset($seller->images[0]))
		{
?>
<a href="/site/craftsman?id=<?php echo $seller->id?>" class="text-decoration-none text-dark">
<div class="container my-4 py-4 m-auto">
    <div class="row m-0 p-4 box-shadow-light product-item">
        <div class="col-12 col-sm-8">
			<?php if(isset($seller->images[0]->path)) { ?>
            <?= Html::img('/backend/web/upimages/' . $seller->images[0]->path, ['alt' => $seller->email, 'class' => 'product-image']) ?>
			<?php } ?>
        </div>
        <div class="col-12 col-sm-4">
            <h3 class="text-center"><?= $seller->firstname . ' ' . $seller->secondname ?></h3>
			<?php 
				$info = '';
				foreach($seller->salarhistorylanguages as $history) {
				  if($history->language->shortname == $val) {
					$info = $history->name;
				  }
        		}
			?>
			<p class="text-justify"><?= $info ?></p>
        </div>
    </div>
</div>
	</a>
<?php } }}
if($one == true) { ?>
<div class="container my-4 py-4 m-auto">
	<div class="row m-0 p-4 box-shadow-light product-item">
        <div class="col-12 col-sm-5">
			<?php if(isset($model[0]->images[0]->path)) { ?>
            <?= Html::img('/backend/web/upimages/' . $model[0]->images[0]->path, ['alt' => $model->email, 'class' => 'product-image']) ?>
			<?php } ?>
        </div>
		
        <div class="col-12 col-sm-7">
            <h3 class="text-center"><?= $model[0]->firstname . ' ' . $model[0]->secondname ?></h3>
			<?php 
				$info = '';
				foreach($model[0]->salarhistorylanguages as $history) {
				  if($history->language->shortname == $val) {
					$info = $history->name;
				  }
        		}
			?>
			<p class="text-justify"><?= $info ?></p>
        </div>
    </div>
</div>

<h2 class="text-blue text-center m-0 pt-3"><?= Yii::t('app', 'Master\'s Products') ?></h2>
<div class="container-fluid p-5 m-auto w-100">
	
  <div class="owl-slide owl-carousel owl-theme owl-carousel-blog row justify-content-center m-auto">
    <?php
	foreach ($model[0]->products as $item){
            $name;
            foreach($item->productnamelanguages as $name_lan) {
              if($name_lan->language->shortname == $val) {
                $name = $name_lan->name;
              }
            }
      ?>
    <div class="card-item bg-light">
      <?= Html::a(Html::img('/backend/web/upimages/' . $item->images[0]->path, ['alt' => $name, 'class' => 'card-image']), Url::to(['/product/buy', 'id' => $item->id]), []) ?>
      <div class="card-label p-2">
          <div class="card-name"><?= $name ?></div>
          <div class="card-price text-success"><?= Yii::$app->currency->convert('dollar', $item->price)?></div>
      </div>

      <div class="card-pane m-0">
          <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['/basket/add', 'id' => $item->id]), ['class' => 'btn btn-block text-center btn-blue']) ?>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<?php }
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
        margin: 30,
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
                items:5,
                nav:true,
                loop:true
            }
        }
      });
	  });
JS;
$this->registerJs($script);
?>

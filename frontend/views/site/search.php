<?php

use frontend\assets\CategoryAsset;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;

CategoryAsset::register($this);

$this->title = 'ikat-art';
?>
<p style="margin: auto; color: rgb(8, 2, 83); font-size: 30px;
    text-align: center; font-weight: 500; text-shadow: rgb(128, 253, 11);"><?= Yii::t('app', 'Search results')?></p>
<?php Pjax::begin(['enablePushState' => false]); ?>
<div class="row">
	<?php
		foreach ($products as $product) {
			echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 ml-5 ml-sm-0 blogBox moreBox">
			        <div class="slider-box1">
			                    <div class="img-box1">'
			                    . Html::a(
			                    	Html::img('/backend/web/upimages/' . $product->product->images[0]->path)
			                    	. '<p>Uzbek picture</p>', Url::to(['product/view2', 'id' => $product->product_id]))
			                    . ' </div>
			                     <div class="product1">
			                      <p>' . $product->product->price . '$</p>
			                    </div>
			                    <div class="icon-panel">
			                      <div class="cart1">'
			                      . Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => $product->product_id]))
			                      . '</div>
			                      <div class="heart1">'
			                      . Html::a('<i class="far fa-heart"></i>', Url::to(['basket/add', 'id' => $product->product_id]))
			                      . '</div>
			                      <div class="buy1">'
				                    . Html::a(Yii::t('app', 'Buy'), Url::to(['product/view2', 'id' => $product->product_id]))
				                    . '</div>
			                     </div>
			                    </div>
			        </div>';
		}
	?>
</div>
<?php Pjax::end(); ?>
<?php

use frontend\assets\CategoryAsset;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;

CategoryAsset::register($this);

$this->title = Yii::t('app', 'Search');
?>
<h2 class="text-center text-blue my-5"><?= Yii::t('app', 'Search results')?></h2>
<?php Pjax::begin(['enablePushState' => false]); ?>
<div class="row">
	<?php
		foreach ($products as $product) {
			echo '<div class="col-6 col-md-4 col-lg-3 mb-2 ml-sm-0">
					<div class="card-item bg-light">'
						. Html::a(Html::img('/backend/web/upimages/' . $product->product->images[0]->path, ['alt' => $product->name, 'class' => 'card-image']), Url::to(['/product/buy', 'id' => $product->product->id]), []) . '
				      <div class="card-label p-2">
				          <div class="card-name">' . $product->name . '</div>
				          <div class="card-price text-success">'. $product->product->price .'$</div>
				      </div>
				      <div class="card-pane m-0">'
				          . Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['/basket/add', 'id' => $product->product->id]), ['class' => 'btn btn-block text-center btn-blue']) .'
				      </div>
				    </div></div>';
		}
	?>
</div>
<?php Pjax::end(); ?>
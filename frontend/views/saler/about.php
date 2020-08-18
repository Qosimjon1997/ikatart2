<?php

use yii\helpers\Html;

$lan = Yii::$app->language;
?>

<div class="row m-0 p-0">
	<div class="col-12 col-sm-4">
		<?php
		if($image)
		echo Html::img('/backend/web/upimages/' . $image, ['alt' => $image, 'style' => 'width: 100%; object-fit: contain;']) ?>
	</div>
	<div class="col-12 col-sm-8">
		<p style = "text-indent: 25px" class="text-justify">
			<?php if($history) echo $history ?>
		</p>
		<div class="text-right">
		<?= Html::a( '<i class = "fa fa-pen mr-1"></i>' . Yii::t('app', 'Edit'), ['saler/settings'], ['class' => 'btn btn-success px-3 m-3']); ?>
		</div>
	</div>
</div>

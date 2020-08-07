<div class="row">
	<?php
	use yii\helpers\Url;
		foreach($images as $image) {
			echo '<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">';
			echo '<img src="../common/uploads/2/' . end( explode( '/', $image->path )) . '"class="col-12">';
			echo '</div>';
		}
	?>
</div>
<?php

/* @var $this yii\web\View */
use common\widgets\HeroWidget;
use common\widgets\CaruselWidget;
use common\widgets\CategoryWidget;

$this->title = 'ikat-art';
?>
<div class="site-index">

<?php
    	HeroWidget::begin();
	    HeroWidget::end();

	    CaruselWidget::begin();
	    CaruselWidget::end();

	    CategoryWidget::begin();
	    CategoryWidget::end();
    ?>
</div>

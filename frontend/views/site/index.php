<?php

/* @var $this yii\web\View */
use common\widgets\HeroWidget;
use common\widgets\CaruselWidget;
use common\widgets\CategoryWidget;
// use common\widgets\UserWidget;
use common\widgets\BuyWidget;

$this->title = 'ikat-art';
?>

<?php
	
	// BuyWidget::begin();
	// BuyWidget::end();

	    HeroWidget::begin();
	    HeroWidget::end();

	    CaruselWidget::begin();
	    CaruselWidget::end();

	    CategoryWidget::begin();
	    CategoryWidget::end();
    ?>

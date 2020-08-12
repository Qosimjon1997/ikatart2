<?php

/* @var $this yii\web\View */
use common\widgets\HeroWidget;
use common\widgets\CaruselWidget;
use common\widgets\CategoryWidget;
// use common\widgets\UserWidget;
// use common\widgets\CartWidget;

$this->title = 'ikat-art';
?>

<?php
	
	// CartWidget::begin();
	// CartWidget::end();

	    HeroWidget::begin();
	    HeroWidget::end();

	    CaruselWidget::begin();
	    CaruselWidget::end();

	    CategoryWidget::begin();
	    CategoryWidget::end();
    ?>

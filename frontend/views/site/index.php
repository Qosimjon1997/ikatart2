<?php

/* @var $this yii\web\View */
use common\widgets\HeroWidget;
use common\widgets\CaruselWidget;
use common\widgets\CategoryWidget;
// use common\widgets\UserWidget;
use common\widgets\BuyWidget;
use common\widgets\CartWidget;
use common\widgets\SearchWidget;
use common\widgets\SettingsWidget;

$this->title = 'ikat-art';
?>

<?php
		// SettingsWidget::begin();
		// SettingsWidget::end();


		// CartWidget::begin();
		// CartWidget::end();

	// BuyWidget::begin();
	// BuyWidget::end();


	// SearchWidget:: begin();
	// SearchWidget:: end();


	    HeroWidget::begin();
	    HeroWidget::end();


	    CaruselWidget::begin();
	    CaruselWidget::end();

	    CategoryWidget::begin();
	    CategoryWidget::end();
    ?>

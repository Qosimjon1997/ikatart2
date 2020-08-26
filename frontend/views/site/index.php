<?php

use common\widgets\HeroWidget;
use common\widgets\CaruselWidget;
use common\widgets\CategoryWidget;
use common\widgets\BuyWidget;
use common\widgets\CartWidget;
use common\widgets\SearchWidget;
use common\widgets\SettingsWidget;

$this->title = 'ikat-art';
?>

<?php

	HeroWidget::begin();
	HeroWidget::end();

	CaruselWidget::begin();
	CaruselWidget::end();

	CategoryWidget::begin();
	CategoryWidget::end();
?>
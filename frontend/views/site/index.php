<?php

use common\widgets\HeroWidget;
use common\widgets\CaruselWidget;
use common\widgets\CategoryWidget;
use common\widgets\BuyWidget;
use common\widgets\CartWidget;
use common\widgets\SearchWidget;
use common\widgets\SettingsWidget;

$this->title = 'Ikat-art';
?>

<?php

	HeroWidget::begin();
	HeroWidget::end();
	echo '<div class="container-fluid">';
	CaruselWidget::begin();
	CaruselWidget::end();
	echo '</div>';
	echo '<div class="container-fluid p-5">';
	CategoryWidget::begin();
	CategoryWidget::end();
	echo '</div>';
?>
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\widgets\HeaderWidget;
use common\widgets\FooterWidget;
use common\widgets\NavigationWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
	<?php
        HeaderWidget::begin();
        HeaderWidget::end();
    ?>

	<div class="row py-3 m-0">
        <?php if(!Yii::$app->saler->isGuest) {?>
            <ul class="list-group col-12 col-md-3">
                <li class="list-group-item">
                <?= Html::a(Yii::t('app', 'Seller history') . '<span class="fa fa-chevron-right"></span>', ['saler/history'], ['class' => 'd-flex justify-content-between align-items-center text-decoration-none']) ?>
                </li>
                <li class="list-group-item">
                <?= Html::a(Yii::t('app', 'Settings') . '<span class="fa fa-chevron-right"></span>', ['saler/history'], ['class' => 'd-flex justify-content-between align-items-center text-decoration-none']) ?>
                </li>
            </ul>
            <div class="container m-0 p-0 col-12 col-md-9 col-lg-9 m-auto">
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        <?php }
            if(Yii::$app->saler->isGuest) {
        ?>
        <div class="container m-auto">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
        <?php } ?>
	</div>



</div>

<footer class="footer">
<?php
        FooterWidget::begin();
        FooterWidget::end();
    ?>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

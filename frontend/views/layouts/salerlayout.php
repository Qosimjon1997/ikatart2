<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\widgets\FooterWidget;
use common\widgets\NavigationWidget;
use common\widgets\Alert;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use frontend\models\Search;

$search = new Search();
$lan = Yii::$app->params['languages'];
$val = strtolower(Yii::$app->language);


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
<body class="m-0 p-0">
<?php $this->beginBody() ?>
<!-- Header -->
<div class="wrapper">
    <header class="row justify-content-between align-items-center w-100 m-0 p-0">
        <div class=" col-12 col-sm-4 text-center">
            <a href="/"><img class="logo" src="/frontend/web/img/logo/logo.png" alt="logo"></a>
        </div>
        <div class="text-center col-12 col-sm-8 col-md-7 col-lg-6 small row m-0 justify-content-around align-items-center">
            <div class="row col-8 justify-content-around m-0">
                <div class="col-6">
                    <a syle="color: rgb(103, 3, 128);" href="#" class="text-primary text-decoration-none header-collor"><i class="fa fa-user-cog" aria-hidden="true" ></i><?= Yii::t('app', 'Contacts')?></a>
                </div>
                <div class="col-6">
                    <?php
                    if(Yii::$app->user2->isGuest) {
                        echo Html::a('<i class="fa fa-sign-in-alt" aria-hidden="true"></i>
                        '. Yii::t('app', 'Login'), ['saler/login'], ['class' => 'text-primary text-decoration-none header-collor']);
                    } else {
                        echo '<div class="btn-group">
                                <a class="btn dropdown-toggle p-0 text-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <button type="submit" class="dropdown-item" name="lan" value = "button"></button>
                                    <button type="submit" class="dropdown-item" name="lan" value = "button"></button>
                                    <button type="submit" class="dropdown-item" name="lan" value = "button"></button>
                                </div>
                            </div>';
                    } ?>
                </div>
            </div>

            <div class="col-4 row justify-content-around m-0 align-items-center">
                <div class="btn-group col-6">
                    <!-- CONVERT MONEY -->
                    <a class="btn dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= '<img src="/frontend/web/img/mony.png" class="icons"> $' ?>
                    </a>
                    <div class="dropdown-menu">
                    <?php
                        $form = ActiveForm::begin(['action' => '/money/index']);

                        foreach ($lan as $key => $value) {
                            echo '
                            <button type="submit" class="dropdown-item" name="lan" value = "'.$key.'">$</button>';
                        }
                        ActiveForm::end();
                    ?>
                    </div>
                </div>
                <div class="btn-group col-6">
                    <a class="btn dropdown-toggle p-0 " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= '<img src="/frontend/web/img/'.$val. '.png" class="icons"> ' . $lan[$val] ?>
                    </a>
                    <div class="dropdown-menu">
                    <?php
                        $form = ActiveForm::begin(['action' => '/language/index']);


                        foreach ($lan as $key => $value) {
                            echo '
                            <button type="submit" class="dropdown-item" name="lan" value = "'.$key.'"><img src="/frontend/web/img/'.$key.'.png" class="icons"> '.$value.'</button>';
                        }
                        ActiveForm::end();
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

	<div class="row py-3 m-0">
        <?php if(!Yii::$app->saler->isGuest) {?>
            <ul class="list-group col-12 col-md-3">
                <li class="list-group-item">
                <?= Html::a(Yii::t('app', 'My products') . '<span class="fa fa-chevron-right"></span>', ['product/index'], ['class' => 'd-flex justify-content-between align-items-center text-decoration-none']) ?>
                </li>
                <li class="list-group-item">
                <?= Html::a(Yii::t('app', 'Seller history') . '<span class="fa fa-chevron-right"></span>', ['saler/history'], ['class' => 'd-flex justify-content-between align-items-center text-decoration-none']) ?>
                </li>
                <li class="list-group-item">
                <?= Html::a(Yii::t('app', 'Settings') . '<span class="fa fa-chevron-right"></span>', ['saler/settings'], ['class' => 'd-flex justify-content-between align-items-center text-decoration-none']) ?>
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

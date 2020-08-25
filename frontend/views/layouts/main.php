<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
// use yii\bootstrap4\Nav;
// use yii\bootstrap4\NavBar;
// use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
// use common\widgets\Alert;
// use common\widgets\HeaderWidget;
// use common\widgets\FooterWidget;
use common\widgets\NavigationWidget;
// use common\widgets\UserWidget;

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
                    <a href="#" class="text-primary"><i class="fa fa-user-cog" aria-hidden="true" ></i><?= Yii::t('app', 'Contacts')?></a>
                </div>
                <div class="col-6">
                    <?php
                    if(Yii::$app->user2->isGuest) {
                        echo Html::a('<i class="fa fa-sign-in-alt" aria-hidden="true"></i>
                        '. Yii::t('app', 'Login'), ['user/login'], ['class' => 'text-primary']);
                    } else {
                        echo '<div class="btn-group">
                                <a class="btn dropdown-toggle p-0 " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

<<<<<<< HEAD
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
    <!-- Header /- -->

    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-light w-100 m-0">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-block d-md-none">
            <div class="row justify-content-end align-items-center m-0">
                <div class="col p-1">
                    <?= Html::a('<i class="fas fa-shopping-cart"></i>', ['/'], ['class' => 'text-primary']) ?>
                </div>

                <div class="form-box col form-inline my-2 my-lg-0 border-danger">
                    <?php $form = ActiveForm::begin(['action' => '/site/search']) ?>
                    <?= $form->field($search, 'search')->textInput(['placeholder' => Yii::t('app', 'Search here'), 'class' => 'search-input border border-primary mt-3 mt-sm-0'])->label(false) ?>
                    <div class="search-icon mt-3 mt-sm-0">
                        <?= Html::submitButton('<i class="fas fa-search special-tag"></i>', ['class' => 'position-absolute']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown 1</a>
                    <ul class="dropdown-menu bg-secondary row" aria-labelledby="navbarDropdownMenuLink">
                        <li class="col-12 col-md-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-light">
                                    11
                                </li>
                                <li class="list-group-item bg-light">
                                    12
                                </li>
                                <li class="list-group-item bg-light">
                                    13
                                </li>
                                <li class="list-group-item bg-light">
                                    14
                                </li>
                                <li class="list-group-item bg-light">
                                    15
                                </li>
                            </ul>
                        </li>
                        <li class="col-12 col-md-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-light">
                                    21
                                </li>
                                <li class="list-group-item bg-light">
                                    22
                                </li>
                                <li class="list-group-item bg-light">
                                    23
                                </li>
                                <li class="list-group-item bg-light">
                                    24
                                </li>
                                <li class="list-group-item bg-light">
                                    25
                                </li>
                            </ul>
                        </li>
                        <li class="col-12 col-md-6">
                            <div class="row m-0">
                                <div class="col-4">
                                    <div class="card-item bg-light">
                                        <?= Html::img('/frontend/web/img/menu/1.jpg', ['class' => 'card-image']) ?>
                                        <div class="card-label p-2">
                                            <div class="card-name">Pillow</div>
                                            <div class="card-price text-success">$40.00</div>
                                        </div>

                                        <div class="card-pane m-0">
                                            <?= Html::a('<i class="fas fa-shopping-cart"></i>', ['/'], ['class' => 'btn btn-success btn-block text-center']) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card-item bg-light">
                                        <?= Html::img('/frontend/web/img/menu/1.jpg', ['class' => 'card-image']) ?>
                                        <div class="card-label p-2">
                                            <div class="card-name">Pillow</div>
                                            <div class="card-price text-success">$40.00</div>
                                        </div>

                                        <div class="card-pane m-0">
                                            <?= Html::a('<i class="fas fa-shopping-cart"></i>', ['/'], ['class' => 'btn btn-success btn-block text-center']) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card-item bg-light">
                                        <?= Html::img('/frontend/web/img/menu/1.jpg', ['class' => 'card-image']) ?>
                                        <div class="card-label p-2">
                                            <div class="card-name">Pillow</div>
                                            <div class="card-price text-success">$40.00</div>
                                        </div>

                                        <div class="card-pane m-0">
                                            <?= Html::a('<i class="fas fa-shopping-cart"></i>', ['/'], ['class' => 'btn btn-success btn-block text-center']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown2 </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action2</a></li>
                        <li><a class="dropdown-item" href="#">Another action2</a></li>
                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="http://google.com">Google</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Submenu22</a></li>
                                <li><a class="dropdown-item" href="#">Submenu022</a></li>
                                <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Submenu 1</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Subsubmenu122</a></li>
                                        <li><a class="dropdown-item" href="#">Subsubmenu122</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Submenu 2</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Subsubmenu2222</a></li>
                                        <li><a class="dropdown-item" href="#">Subsubmenu2222</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

         <div class="d-none d-md-block">
            <div class="row justify-content-end align-items-center">
                <div class="col p-1">
                    <?= Html::a('<i class="far fa-heart"></i>', ['/'], ['class' => 'text-danger']) ?>
                </div>
                <div class="col p-1">
                    <?= Html::a('<i class="fas fa-shopping-cart"></i>', ['/'], ['class' => 'text-primary']) ?>
                </div>

                <div class="form-box col form-inline my-2 my-lg-0 border-danger">
                    <?php $form = ActiveForm::begin(['action' => '/site/search']) ?>
                    <?= $form->field($search, 'search')->textInput(['placeholder' => Yii::t('app', 'Search here'), 'class' => 'search-input border border-primary mt-3 mt-sm-0'])->label(false) ?>
                    <div class="search-icon mt-3 mt-sm-0">
                        <?= Html::submitButton('<i class="fas fa-search special-tag"></i>', ['class' => 'position-absolute']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navigation /- -->
=======
        // NavigationWidget::begin();
        // NavigationWidget::end();
    ?>
>>>>>>> a2eb718a7090088036344de2bae1b7c268a27ccf

</div>

<footer class="footer">
<?php
        // FooterWidget::begin();
        // FooterWidget::end();
    ?>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

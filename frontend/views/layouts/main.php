<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\widgets\FooterWidget;
use common\widgets\NavigationWidget;

use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use frontend\models\Search;
use backend\models\Category;
use backend\models\Product;
use backend\models\Language;

$search = new Search();
$lan = Yii::$app->params['languages'];

$lan_id;
$val = strtolower(Yii::$app->language);
$languages = Language::find()->all();

foreach ($languages as $language) {
    if($language->shortname == $val) {
        $lan_id = $language->id;
    }
}

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
    <header class="row justify-content-between align-items-center m-auto p-0 header-w">
        <div class=" col-12 col-sm-4 col-lg-7 col-md-4 text-center text-md-left ">
            <a href="/"><img class="logo" src="/frontend/web/img/logo/logo.png" alt="logo"></a>
        </div>
        <div class="text-center col-12 col-sm-8 col-lg-5 col-md-8 small row m-0 p-0 pt-sm-5 justify-content-around align-items-center">
            <div class="row col-8 justify-content-around m-0 p-0">
                <div class=" d-none m-0 p-0 d-lg-block">
                    <a syle="color: rgb(103, 3, 128);" href="#" class="text-primary text-decoration-none header-collor head-info">
                        <i class="fa fa-phone" aria-hidden="true" ></i><?= Yii::t('app', '+998 (90)-212-92-88')?></a>
                </div>
                <div class=" m-0 p-0 ">
                    <a syle="color: rgb(103, 3, 128);" href="#" class="text-primary text-decoration-none header-collor head-info">
                        <i class="fa fa-user-cog" aria-hidden="true" ></i><?= Yii::t('app', 'Contacts')?></a>
                </div>
                <div class=" m-0 p-0 ">
                    <?php
                    if(Yii::$app->user2->isGuest) {
                        echo Html::a('<i class="fa fa-sign-in-alt" aria-hidden="true"></i>
                        '. Yii::t('app', 'Login'), ['user/login'], ['class' => 'text-primary text-decoration-none header-collor head-info']);
                    } else {
                        echo '<div class="btn-group p-0 m-0">
                                <a style="font-size: 25px;" class="btn dropdown-toggle p-0 text-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle"></i>
                                </a>
                                <div class="dropdown-menu">' .
                                    Html::a('My basket', Url::to(['basket/list']), ['class' => 'btn btn-block text-center btn-blue dropdown-item']).
                                    Html::a('Settings', Url::to(['user/settings']), ['class' => 'btn btn-block text-center btn-blue dropdown-item']).
                                    Html::a('Log out', Url::to(['user/logout']), ['class' => 'btn btn-block text-center btn-blue dropdown-item'])

                                . '</div>
                            </div>';
                    } ?>
                </div>
            </div>

            <div class="col-4  justify-content-around m-0 p-0 align-items-center">
                <div class="btn-group  m-0 p-2 ">
                    <!-- CONVERT MONEY -->
                    <a class="btn dropdown-toggle p-0 head-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <div class="btn-group  m-0 p-2 ">
                    <a class="btn dropdown-toggle p-0 head-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    <!-- Header /- -->

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light w-100 m-auto">
        <button class="navbar-toggler p-0 border-0" style="outline: 0 none" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-block d-lg-none">
            <div class="row justify-content-end align-items-center m-0">
                <div class="form-box col form-inline my-2 my-lg-0 border-danger">
                    <?php $form = ActiveForm::begin(['action' => '/site/search']) ?>
                    <?= $form->field($search, 'search')->textInput(['placeholder' => Yii::t('app', 'Search here'), 'class' => 'search-input border border-primary mt-3 mt-sm-0'])->label(false) ?>
                    <div class="search-icon mt-3 mt-sm-0">
                        <?= Html::submitButton('<i class="fas fa-search special-tag"></i>', ['class' => 'position-absolute']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <?= Html::a('<i class="fas fa-shopping-cart shop-cart"></i>', Url::to(['basket/index']), ['class' => 'text-primary']) ?>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                <?php

                    $model = Category::find()->with('categories.categorylanguages', 'categorylanguages')->where(['category_id' => null])->all();
                    foreach ($model as $value) {
                        $parent_cateogry_name;
                        foreach ($value->categorylanguages as $category_lang) {
                            if($category_lang->language_id == $lan_id){
                                $parent_cateogry_name = $category_lang->name;
                                break;
                            }
                        }
                        ?>

                        <li class="nav-item">

                            <a class="dropdown-toggle" href="/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $parent_cateogry_name?></a>


                            <ul class="dropdown-menu bg-light row" aria-labelledby="navbarDropdownMenuLink">
                                <div class="line"></div>
                                <li class="col-12 col-md-6">
                                    <ul class="list-group list-group-flush">
                                    <?php


                                        foreach ($value->categories as $sub_category) {
                                            foreach ($sub_category->categorylanguages as $category_lang) {
                                                $child_cateogry_name;
                                                if($category_lang->language_id == $lan_id){
                                                    $child_cateogry_name = $category_lang->name;
                                                    break;
                                                }
                                            }

                                            ?>
                                        <li class="list-group-item bg-light">
                                            <?= Html::a('<i class="nav-link">' . $child_cateogry_name . '</i>', Url::to(['product/scategory', 'id' => $sub_category->id])) ?>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </li>


                                <li class="col-12 col-md-6 d-none d-md-block">
                                    <div class="row m-0">

                                    <?php
                                        $valueProduct = $value->categories[0];
                                        $prods = Product::find()->with('productnamelanguages')->where(['category_id'=>$valueProduct->id,'isActive'=>1])->limit(2)->all();
                                        foreach ($prods as $prod) {
                                            $product_name;
                                            foreach($prod->productnamelanguages as $name_lan) {
                                              if($name_lan->language_id == $lan_id) {
                                                $product_name = $name_lan->name;
                                              }
                                            }
                                          ?>

                                        <div class="col-6">
                                            <div class="card-item bg-light">
                                            <?= Html::a(Html::img('/backend/web/upimages/' . $prod->images[0]->path, ['alt' => $product_name, 'class' => 'card-image']), Url::to(['/product/buy', 'id' => $prod->id]), []) ?>
                                            <div class="card-label p-2">
                                                <div class="card-name"><?php echo $product_name?></div>
                                                <div class="card-price text-success">$<?php echo $prod->price?></div>
                                            </div>

                                                <div class="card-pane m-0">
                                                <?= Html::a('<i class="fas fa-shopping-cart"></i>', Url::to(['basket/add', 'id' => $prod->id]), ['class' => 'btn btn-block text-center btn-blue']) ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>

                                    </div>
                                </li>

                            </ul>

                        </li>
                    <?php } ?>
            </ul>
        </div>



         <div class="d-none d-lg-block">
            <div class="row justify-content-end align-items-center">
                <div class="form-box col form-inline my-2 my-lg-0 border-danger">
                    <?php $form = ActiveForm::begin(['action' => '/site/search']) ?>
                    <?= $form->field($search, 'search')->textInput(['placeholder' => Yii::t('app', 'Search here ....'), 'class' => 'search-input border border-primary mt-3 mt-sm-0'])->label(false) ?>
                    <div class="search-icon mt-3 mt-sm-0">
                        <?= Html::submitButton('<i class="fas fa-search special-tag"></i>', ['class' => 'position-absolute']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="cart">
                     <?= Html::a('<i class="fas fa-shopping-cart shop-cart"></i>', Url::to(['basket/index']), ['class' => 'text-primary']) ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navigation /- -->

    <!-- Content -->
    <div class="m-0 p-0 w-100 m-auto">
        <?= $content ?>
    </div>
    <!-- Content /- -->
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

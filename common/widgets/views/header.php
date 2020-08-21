<?php
use frontend\assets\HeaderAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
$lan = Yii::$app->params['languages'];
$val = strtolower(Yii::$app->language);


HeaderAsset::register($this);
?>
<div class="header-new m-0 p-0">
    <div class="row  justify-content-between align-items-center m-0 p-0">
        <div class="col-12 col-md-4">
            <a><img class="logo" src="/frontend/web/img/logo/logo.png" alt="logo"></a>
        </div>
        <div class="header-info col-12 col-sm-8 col-lg-6 row justify-content-end align-items-center">
            <div class="col">
                <?= Html::a('<i class="fa fa-sign-in-alt" aria-hidden="true" style="margin-right: 5px;" ></i>
                    '. Yii::t('app', 'Sign in'), ['user/login']) ?>
            </div>
            <div class="col">
                <?= Html::a('<i class="fa fa-user-plus mr-1" aria-hidden="true"></i>'. Yii::t('app', 'Sign up'), ['user/signup']) ?>
            </div>
            <div class="col">
                <a href="#"><i class="fa fa-user-cog" aria-hidden="true" style="margin-right: 5px;" ></i><?= Yii::t('app', 'Contacts')?></a>
            </div>
            <div class="col">
                <!-- CONVERT MONEY -->
                <a class="btn dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= '<img src="/frontend/web/img/mony.png" class="icons"> $' ?>
                </a>
                <div class="dropdown-menu">
                <?php
                    $form = ActiveForm::begin(['action' => '/language/change']);

                    foreach ($lan as $key => $value) {
                        echo '
                        <button type="submit" class="dropdown-item" name="lan" value = "'.$key.'"><img src="/frontend/web/img/'.$key.'.png" class="icons"> '.$value.'</button>';
                    }
                    ActiveForm::end();
                ?>
                </div>
            </div>
            <div class="btn-group col">
                <a class="btn dropdown-toggle p-0 " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= '<img src="/frontend/web/img/'.$val. '.png" class="icons"> ' . $lan[$val] ?>
                </a>
                <div class="dropdown-menu">
                <?php
                    $form = ActiveForm::begin();

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
</div>

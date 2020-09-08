<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use common\widgets\SidebarWidget;

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
        NavBar::begin([
            'brandLabel' => '',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand navbar-dark m-0 w-100 justify-content-end bg-primary',
            ],
        ]);
        $menuItems [] = '<li class="nav-item">'
            . Html::a(Yii::t('app', 'Home'), ['/workers'], ['class' => 'text-white nav-link p-3'])
            . '</li>';
            // ['label' => 'Home', 'url' => ['/workers'], 'class' => 'nav-link'],
        $menuItems[] = '<li class="nav-item">'
            . Html::beginForm(['comp/workers/logout'], 'post')
            . Html::submitButton(
                'Logout',
                ['class' => 'text-white nav-link btn btn-link logout p-3']
            )
            . Html::endForm()
            . '</li>';
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ml-auto'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>
        <div>
            <?= SidebarWidget::widget([
                'header' => Yii::t('app', Yii::$app->workers->identity->username),
                'items' => [
                    [
                        'label' => Yii::t('app', 'category'),
                        'icon' => 'fa fa-list',
                        'url' => 'category/index',
                    ],
                    [
                        'label' => Yii::t('app', 'product'),
                        'icon' => 'fa fa-list',
                        'url' => 'product/index',
                        'params' => [
                            'isActive' => 1,
                        ]
                    ],
                    [
                        'label' => Yii::t('app', 'top products'),
                        'icon' => 'fa fa-list',
                        'url' => 'topproduct/index',
                    ],
                    [
                        'label' => Yii::t('app', 'main products'),
                        'icon' => 'fa fa-list',
                        'url' => 'mainproduct/index',
                    ],
                    [
                        'label' => Yii::t('app', 'currency'),
                        'icon' => 'fa fa-list',
                        'url' => 'currency/index',
                    ],
                    [
                        'label' => Yii::t('app', 'toptypes'),
                        'icon' => 'fa fa-list',
                        'url' => 'toptype/index',
                    ],
                    [
                        'label' => Yii::t('app', 'adverts'),
                        'icon' => 'fa fa-list',
                        'url' => 'advert/index',
                    ],
                    [
                        'label' => Yii::t('app', 'customers'),
                        'icon' => 'fa fa-list',
                        'url' => 'user/index',
                    ],
                    [
                        'label' => Yii::t('app', 'salers'),
                        'icon' => 'fa fa-list',
                        'url' => 'saler/index',
                    ],
                    [
                        'label' => Yii::t('app', 'orders'),
                        'icon' => 'fa fa-list',
                        'url' => 'order/index',
                        'params' => [
                            'isActive' => 0,
                        ]
                    ],
                    [
                        'label' => Yii::t('app', 'delivery'),
                        'icon' => 'fa fa-list',
                        'url' => 'order/index',
                        'params' => [
                            'isActive' => 1,
                        ]
                    ],
                    [
                        'label' => Yii::t('app', 'archive products'),
                        'icon' => 'fa fa-list',
                        'url' => 'product/index',
                        'params' => [
                            'isActive' => 0,
                        ]
                    ],
                    [
                        'label' => Yii::t('app', 'product images'),
                        'icon' => 'fa fa-list',
                        'url' => 'images/index',
                    ],
                    [
                        'label' => Yii::t('app', 'settings'),
                        'icon' => 'fa fa-list',
                        'url' => 'comp/workers/settings',
                        'params' => [
                            'id' => Yii::$app->workers->identity->id,
                        ]
                    ],
                ]
            ]) ?>
            <div class="content">
                <div class="container">
                    <?= $content ?>
                </div>
            </div>
        </div>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-inverse navbar-fixed-top p-1',
            ],
        ]);
        $menuItems = [
            ['label' => 'Home', 'url' => ['/workers']],
        ];
        $menuItems[] = '<li>'
            . Html::beginForm(['comp/workers/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->workers->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>
        <div>
            <?= SidebarWidget::widget([
                'header' => Yii::t('app', 'header'),
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
                    ],
                    [
                        'label' => Yii::t('app', 'topproducts'),
                        'icon' => 'fa fa-list',
                        'url' => 'topproduct/index',
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
                        'label' => Yii::t('app', 'languages'),
                        'icon' => 'fa fa-list',
                        'url' => 'language/index',
                    ],
                    [
                        'label' => Yii::t('app', 'salers'),
                        'icon' => 'fa fa-list',
                        'url' => 'saler/index',
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
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                        <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>
        </div>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

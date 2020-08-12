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
            . Html::a(Yii::t('app', 'Home'), ['/admin'], ['class' => 'text-white nav-link p-3'])
            . '</li>';
        $menuItems[] = '<li class="nav-item">'
            . Html::beginForm(['comp/admin/logout'], 'post')
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

                'header' => Yii::t('app', Yii::$app->admin->identity->username),

                'items' => [
                    [
                        'label' => Yii::t('app', 'ishchilar'),
                        'icon' => 'fa fa-list',
                        'url' => 'comp/workers/index',


                    ],
                    [
                        'label' => Yii::t('app', 'statistika'),
                        'icon' => 'fa fa-list',
                        'url' => 'product/index',

                    ],
                    [
                        'label' => Yii::t('app', 'nastroyka'),
                        'icon' => 'fa fa-list',
                        'url' => 'comp/admin/update'
                    ],
                ]
            ]) ?>
            <div class="content">
                <div class="container">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => [],
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

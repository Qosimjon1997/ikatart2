<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/header.css',
        'css/nav.css',
        'css/list.css',
        'css/fontawesome-all.min.css',
        "library/owl-carousel/owl.carousel.min.css",
        "library/owl-carousel/owl.theme.css",
        'css/easyzoom.css',
    ];
    public $js = [
        'js/preview.js',
        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js',
        'js/bootstrap.min.js',
        'js/easyzoom.js',
        "library/owl-carousel/owl.carousel.min.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'backend\assets\FontAwesomeAsset',
    ];
}

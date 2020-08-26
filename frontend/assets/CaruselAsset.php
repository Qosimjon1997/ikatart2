<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class CaruselAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/carusel.css',
        "library/owl-carousel/owl.carousel.min.css",
        "library/owl-carousel/owl.theme.css",
    ];
    public $js = [
        "library/owl-carousel/owl.carousel.min.js",
    ];
    public $depends = [
    ];
}
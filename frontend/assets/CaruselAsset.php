<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class CaruselAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/carusel.css',
        'css/owl.carousel.min.css',
        'css/nice-select.css',
        'css/themify-icons.css',
        'css/fontawesome-all.min.css',
    ];
    public $js = [

    ];
    public $depends = [
    ];
}
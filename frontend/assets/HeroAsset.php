<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class HeroAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/hero.css',
        'css/swiper.min.css',
        'css/nice-select.css',
        'css/themify-icons.css',
    ];
    public $js = [
        // 'js/jquery.slicknav.min.js.download' ,
        // 'js/owl.carousel.min.js.download',
        // 'js/jquery.nicescroll.min.js.download',
        // 'js/main.js.download',
    ];
    public $depends = [
    ];
}

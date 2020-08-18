<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class SearchAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/search.css',
        'css/category.css',
        'css/fontawesome-all.min.css',
        'css/load-more-button.css',
    ];
    public $js = [
        'js/owl.carousel.min.js',
        'js/jquery-3.2.1.min.js.download',
        'js/jquery.slicknav.min.js.download',
        'js/owl.carousel.min.js.download',
        'js/jquery.nicescroll.min.js.download',
    ];
    public $depends = [
    ];
}
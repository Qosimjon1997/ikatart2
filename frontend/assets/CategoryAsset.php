<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class CategoryAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/category.css',
        'css/fontawesome-all.min.css',
        'css/load-more-button.css',
    ];
    public $js = [
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class HeaderAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/header.css',
        'css/fontawesome-all.min.css',
        'https://use.fontawesome.com/releases/v5.8.1/css/all.css'
    ];
    public $js = [
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

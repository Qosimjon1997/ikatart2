<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class BuyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/buy.css',
    ];
    public $js = [
    ];
    public $depends = [
    ];
}
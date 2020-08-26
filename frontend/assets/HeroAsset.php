<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class HeroAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/hero.css',
    ];
    public $js = [
    ];
    public $depends = [
    ];
}

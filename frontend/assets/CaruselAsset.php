<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class CaruselAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/carusel.css',
    ];
    public $js = [

    ];
    public $depends = [
    ];
}
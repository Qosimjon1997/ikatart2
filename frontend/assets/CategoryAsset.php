<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class CategoryAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/category.css',
    ];
    public $js = [
    ];
    public $depends = [
    ];
}
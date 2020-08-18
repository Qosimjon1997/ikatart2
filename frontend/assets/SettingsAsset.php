<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class SettingsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/settings.css',
    ];
    public $js = [
       
    ];
    public $depends = [
    ];
}
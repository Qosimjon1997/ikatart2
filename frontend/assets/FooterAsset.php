<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class FooterAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/footer.css',
        'css/fontawesome-all.min.css',
    ];
    public $js = [
      
       ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

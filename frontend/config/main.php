<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'name' => 'Ikat-art',
    'language' => 'en',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        [
            'class' => 'frontend\components\LanguageSelector',
            'supportedLanguages' => ['ru', 'en', 'uz', 'it', 'sp', 'fr'],
        ],
    ],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            //'baseUrl' => '',
        ],
        'user' => [
            'class'=>'yii\web\User',
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'authTimeout' => 60*30,
            'loginUrl' => ['dashboard/login'],
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'user2' => [
            'class'=>'yii\web\User',
            'identityClass' => 'backend\models\User',
            'enableAutoLogin' => false,
            'authTimeout' => 60*30,
            'loginUrl' => ['user/login'],
            'identityCookie' => ['name' => '_identity-frontend-user2', 'httpOnly' => true],
        ],
        'saler' => [
            'class'=>'yii\web\User',
            'identityClass' => 'backend\models\Saler',
            'enableAutoLogin' => false,
            'authTimeout' => 60*30,
            'loginUrl' => ['saler/login'],
            'identityCookie' => ['name' => '_identity-frontend-saler', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<alias:\w+>' => 'site/<alias>',
            ],
        ],*/
    ],
    'params' => $params,
];

<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'language' => 'en',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/comp',
        ],
        'admin' => [
            'class' => 'yii\web\User',
            'identityClass' => 'backend\models\Admin',
            'enableAutoLogin' => false,
            'authTimeout' => 60*30,
            'loginUrl' => ['comp/admin/login'],
            'identityCookie' => ['name' => '_identity-backend-admin'],
        ],
        'workers' => [
            'class' => 'yii\web\User',
            'identityClass' => 'backend\models\Workers',
            'enableAutoLogin' => false,
            'authTimeout' => 60*30,
            'loginUrl' => ['comp/workers/login'],
            'identityCookie' => ['name' => '_identity-backend-workers'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'comp/workers/login',
                'admin' => 'comp/admin/index',
                'workers' => 'comp/workers/login',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],

    ],
    'params' => $params,
];

<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru',
    'sourceLanguage' => 'ru-RU',
    'aliases' => [
//        '@bower' => '@vendor/bower-assets',
//        '@npm'   => '@vendor/npm-assets',
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'layout' => '@app/modules/adminable/views/layouts/main',
            'modelMap' => [
                'User' => 'app\models\user\User',
                'Profile' => 'app\models\user\Profile',
                'Token' => 'app\models\user\Token',
            ],
            'controllerMap' => [
                'security' => 'app\modules\adminable\controllers\SecurityController',
                'registration' => 'app\modules\adminable\controllers\RegistrationController',
                'recovery' => 'app\modules\adminable\controllers\RecoveryController',
                'admin' => 'app\modules\adminable\controllers\UserController',
            ],
        ],
        'rbac' => [
            'class' => 'dektrium\rbac\RbacWebModule',
            'layout' => '@app/modules/adminable/views/layouts/main',
            'controllerMap' => [
                'role' => 'app\modules\adminable\controllers\RoleController',
                'permission' => 'app\modules\adminable\controllers\PermissionController',
                'rule' => 'app\modules\adminable\controllers\RuleController',
            ],
        ],
        'adminable' => [
            'class' => 'app\modules\adminable\Module',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '5wF-LYT6jxVc3lfc3ytHCXNpHXQBU-JG',
        ],
        'authManager' => [
            'class' => 'dektrium\rbac\components\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\user\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => require __DIR__ . '/mailer.php',
        'formatter' => 'microinginer\humanFormatter\HumanFormatter',
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require __DIR__ . '/db.php',
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/modules/adminable/views/user',
                    '@dektrium/user/views/admin' => '@app/modules/adminable/views/users',
                    '@dektrium/rbac/views/role' => '@app/modules/adminable/views/rbac/role',
                    '@dektrium/rbac/views/permission' => '@app/modules/adminable/views/rbac/permission',
                    '@dektrium/rbac/views/rule' => '@app/modules/adminable/views/rbac/rule',
                ],
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;

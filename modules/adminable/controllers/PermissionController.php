<?php

namespace app\modules\adminable\controllers;

use yii\filters\AccessControl;

class PermissionController extends \dektrium\rbac\controllers\PermissionController
{
    public function init()
    {
        parent::init();
        \Yii::$app->getModule('rbac')->detachBehavior('access');
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'index',
                            'create',
                            'update',
                            'delete',
                        ],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }
}

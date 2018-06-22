<?php

namespace app\modules\adminable\controllers;

use Yii;
use yii\filters\AccessControl;
use dektrium\rbac\controllers\RuleController as BaseRuleController;

/**
 * Class RuleController
 * @package app\modules\adminable\controllers
 */
class RuleController extends BaseRuleController
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        Yii::$app->getModule('rbac')->detachBehavior('access');
    }

    /**
     * @inheritdoc
     */
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

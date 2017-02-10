<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

/**
 * Class RbacController
 * @package app\commands
 */
class RbacController extends Controller
{
    /**
     * @param $name
     */
    public function actionCreateRole($name)
    {
        $role = Yii::$app->authManager->createRole($name);
        $role->description = Yii::t('app', 'Administrator');
        Yii::$app->authManager->add($role);
    }
}

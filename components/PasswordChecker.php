<?php

namespace app\components;


use app\models\UserPasswordHistory;
use yii\base\Application;
use yii\base\BootstrapInterface;

/**
 * Class PasswordChecker
 * @package app\components
 */
class PasswordChecker implements BootstrapInterface
{
    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        if (null !== $app->user->identity) {

            $passwordHistory = UserPasswordHistory::find()
                ->where(['created_by' => $app->user->id])
                ->orderBy(['id' => SORT_DESC])
                ->one();

            if (null === $passwordHistory || $passwordHistory->created_at < (time() - 86400 * 30)) {
                if (false === strrpos($app->request->pathInfo, 'change-password')) {
                    $app->response->redirect(['/user/admin/change-password']);
                }
            }
        }
    }
}

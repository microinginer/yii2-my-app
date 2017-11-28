<?php

namespace app\components;

use yii\base\Application;
use yii\base\BootstrapInterface;
use app\models\user\UserPasswordHistory;

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

            /** @var UserPasswordHistory $passwordHistory */
            $passwordHistory = UserPasswordHistory::find()
                ->where(['created_by' => $app->user->id])
                ->orderBy(['id' => SORT_DESC])
                ->one();

            if (null === $passwordHistory || $passwordHistory->created_at < (time() - 86400 * 30)) {
                if (false === strrpos($app->getRequest()->getPathInfo(), 'change-password')) {
                    $app
                        ->getResponse()
                        ->redirect(['/user/admin/change-password']);
                }
            }
        }
    }
}

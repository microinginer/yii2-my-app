<?php

namespace app\modules\adminable\controllers;

use app\models\User;
use app\models\UserPasswordHistory;
use dektrium\user\controllers\AdminController;
use dektrium\user\helpers\Password;
use yii\base\DynamicModel;
use yii\filters\AccessControl;

class UserController extends AdminController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'index', 'update', 'create', 'block',
                            'delete', 'info', 'update-profile', 'assignments', 'confirm',
                        ],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => [
                            'change-password',
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     *
     * @return mixed
     * @throws \yii\base\InvalidParamException
     * @throws \yii\base\ExitException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionCreate()
    {
        /** @var User $user */
        $user = \Yii::createObject([
            'class' => User::className(),
            'scenario' => 'create',
        ]);
        $event = $this->getUserEvent($user);

        $this->performAjaxValidation($user);

        $this->trigger(self::EVENT_BEFORE_CREATE, $event);
        if ($user->load(\Yii::$app->request->post()) && $user->create()) {
            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'User has been created'));
            $this->trigger(self::EVENT_AFTER_CREATE, $event);
            return $this->redirect(['update', 'id' => $user->id]);
        }

        return $this->render('create', [
            'user' => $user,
        ]);
    }

    public function actionChangePassword()
    {
        $dynamicChangePassword = new DynamicModel(['old_password', 'new_password']);
        $dynamicChangePassword->addRule(['old_password', 'new_password'], 'required');

        /**
         * @var $userModel User
         */
        $userModel = \Yii::$app->user->identity;

        if ($dynamicChangePassword->load(\Yii::$app->request->post())) {
            if (\Yii::$app->security->compareString(
                $dynamicChangePassword->old_password,
                $dynamicChangePassword->new_password)
            ) {
                $dynamicChangePassword->addError('new_password', 'Новый пароль не может совподать с текущим паролем');
            }

            if (!Password::validate($dynamicChangePassword->old_password, $userModel->password_hash)) {
                $dynamicChangePassword->addError('old_password', 'Текущий пароль введен неверно');
            }

            if (!$dynamicChangePassword->hasErrors()) {

                $userPasswordHistory = new UserPasswordHistory(['old_password' => $userModel->password_hash]);

                $userModel->password_hash = \Yii::$app->security->generatePasswordHash(
                    $dynamicChangePassword->new_password
                );

                if ($userModel->save(false)) {
                    \Yii::$app->session->setFlash('success', 'Ваш пароль успешно изменен');
                    \Yii::$app->user->login($userModel);
                    $userPasswordHistory->save();

                    return $this->redirect(['/adminable']);
                }
            }
        }

        return $this->render('change_password', [
            'model' => $dynamicChangePassword
        ]);
    }
}

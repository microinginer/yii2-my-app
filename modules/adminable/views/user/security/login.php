<?php

use app\modules\adminable\widgets\social\SocialConnect;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module $module
 */

$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="login-box">
    <div class="login-logo">
        <a href="<?= Url::to(['/']) ?>"><b>Admin</b>able</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><?= $this->title ?></p>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => false,
            'validateOnBlur' => false,
            'validateOnType' => false,
            'validateOnChange' => false,
        ]) ?>
        <?= $form->field($model, 'login', [
            'inputOptions' => [
                'autofocus' => 'autofocus',
                'class' => 'form-control',
                'tabindex' => '1'
            ]]) ?>

        <?= $form
            ->field($model, 'password', ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])
            ->passwordInput()
            ->label(
                Yii::t('user', 'Password')
                . ($module->enablePasswordRecovery ?
                    ' (' . Html::a(
                        Yii::t('user', 'Forgot password?'),
                        ['/user/recovery/request'],
                        ['tabindex' => '5']
                    )
                    . ')' : '')
            )  ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '4']) ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton(Yii::t('app', 'Войти'), ['class' => 'btn btn-default btn-block', 'tabindex' => '3']) ?>
            </div>
            <!-- /.col -->
        </div>
        <div class="clearfix"></div>
        <?= SocialConnect::widget([
            'baseAuthUrl' => ['/user/security/auth'],
        ]) ?>
        <?php ActiveForm::end(); ?>
        <p>&nbsp;</p>

        <?php if ($module->enableConfirmation): ?>
            <p class="text-center">
                <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
            </p>
        <?php endif ?>
        <?php if ($module->enableRegistration): ?>
            <p class="text-center">
                <?= Html::a(Yii::t('user', 'Don\'t have an account? Sign up!'), ['/user/registration/register']) ?>
            </p>
        <?php endif ?>
    </div>
</div>
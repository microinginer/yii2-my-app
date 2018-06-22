<?php
/**
 * @var $content string
 * @var $this yii\web\View
 */

use yii\helpers\Url;
use yii\widgets\Menu;
use yii\bootstrap\Html;
use app\models\user\User;
use yii\widgets\Breadcrumbs;
use kartik\alert\AlertBlock;
use app\modules\adminable\assets\AdminableAsset;

AdminableAsset::register($this);

/** @var User $userIdentity */
$userIdentity = Yii::$app->user->identity;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="<?= Url::to(['/adminable']) ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b><?= Yii::$app->name[0] ?></b></span>
            <!-- logo for regular state and mobile devices -->
            <?php if (Yii::$app->user->can('admin')): ?>
                <span class="logo-lg"><b><?= Yii::$app->name ?></b></span>
            <?php else: ?>
                <span class="logo-lg"><b>Adminable
                                                <small style="font-size: 9px;">yashr<i class="ion ion-social-sass"></i></small>
                    </b></span>
            <?php endif; ?>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img
                                    src="<?= $userIdentity->profile->getAvatarUrl(50) ?>"
                                    class="user-image" alt="User Image">
                            <span
                                    class="hidden-xs">
                                <?= $userIdentity->profile->name ?: $userIdentity->username ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img
                                        src="<?= $userIdentity->profile->getAvatarUrl(240) ?>"
                                        class="img-circle" alt="User Image">
                                <p>
                                    <?= $userIdentity->profile->name ?: $userIdentity->username ?>
                                    <br>
                                    <small>Участник
                                        с <?= Yii::$app->formatter->asDatetime($userIdentity->created_at) ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?= Url::to(['/user/settings/']) ?>" class="btn btn-default btn-flat">Профиль</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?= Url::to(['/user/security/logout']) ?>" data-method="post"
                                       class="btn btn-default btn-flat">Выход</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar" style="height: auto;">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $userIdentity->profile->getAvatarUrl(150) ?>"
                         class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?= $userIdentity->profile->name ?: $userIdentity->username ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Поиск...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                    <i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <?= Menu::widget([
                'options' => ['class' => 'sidebar-menu'],
                'activateParents' => true,
                'items' => [
                    ['label' => 'Навигация', 'options' => ['class' => 'header']],
                    [
                        'label' => Html::tag('i', '', ['class' => 'ion-ios-people']) . ' &nbsp; ' .
                            Html::tag('span', Yii::t('app', 'Пользователи')),
                        'url' => ['/user/admin'],
                        'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                        'visible' => Yii::$app->user->can('admin'),
                        'options' => ['class' => 'treeview'],
                        'items' => [
                            ['label' => Yii::t('app', 'Список пользователей'), 'url' => ['/user/admin/index'],],
                            ['label' => Yii::t('rbac', 'Roles'), 'url' => ['/rbac/role/index'],],
                            ['label' => Yii::t('rbac', 'Permissions'), 'url' => ['/rbac/permission/index'],],
                            ['label' => Yii::t('rbac', 'Rules'), 'url' => ['/rbac/rule/index'],],
                        ],
                    ],

                ],
                'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
                'encodeLabels' => false, //allows you to use html in labels
            ]);
            ?>
        </section>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>&nbsp;</h1>
            <?= Breadcrumbs::widget([
                'homeLink' => [
                    'label' => 'Главная',
                    'url' => ['/adminable/default/index'],
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </section>
        <section class="content">
            <?= AlertBlock::widget([
                'type' => AlertBlock::TYPE_ALERT,
                'useSessionFlash' => true
            ]); ?>
            <?= $content ?>
            <div class="clearfix"></div>
        </section>
    </div>
    <footer class="main-footer">
        Создано <?= Html::a('yashr team', 'http://yashr.ru') ?>
    </footer>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

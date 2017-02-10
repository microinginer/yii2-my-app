<?php
/**
 * @var $content string
 * @var $this yii\web\View
 */

use app\modules\adminable\assets\AdminableAsset;

AdminableAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?= yii\bootstrap\Html::csrfMetaTags() ?>
    <title><?= yii\bootstrap\Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-purple sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="<?= \yii\helpers\Url::to(['/adminable']) ?>" class="logo">
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
                                    src="<?= Yii::$app->user->identity->profile->getAvatarUrl(50) ?>"
                                    class="user-image" alt="User Image">
                            <span
                                    class="hidden-xs">
                                <?= Yii::$app->user->identity->profile->name ?: Yii::$app->user->identity->username ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img
                                        src="<?= Yii::$app->user->identity->profile->getAvatarUrl(240) ?>"
                                        class="img-circle" alt="User Image">
                                <p>
                                    <?= Yii::$app->user->identity->profile->name ?: Yii::$app->user->identity->username ?>
                                    <br>
                                    <small></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <!--                                <div class="pull-left">-->
                                <!--                                    <a href="#" class="btn btn-default btn-flat">Профиль</a>-->
                                <!--                                </div>-->
                                <div class="pull-right">
                                    <a href="<?= yii\helpers\Url::to(['/user/security/logout']) ?>" data-method="post"
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
                    <img src="<?= Yii::$app->user->identity->profile->getAvatarUrl(150) ?>"
                         class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?= Yii::$app->user->identity->profile->name ?: Yii::$app->user->identity->username ?></p>
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
            <?= yii\widgets\Menu::widget([
                'options' => ['class' => 'sidebar-menu'],
                'activateParents' => true,
                'items' => [
                    ['label' => 'Навигация', 'options' => ['class' => 'header']],
//                    [
//                        'label' => yii\bootstrap\Html::tag('i', '', ['class' => 'fa fa-file']) . ' &nbsp; ' .
//                            yii\bootstrap\Html::tag('span', Yii::t('app', 'Заявки')),
//                        'url' => ['/adminable/request/index'],
//                    ],
                ],
                'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
                'encodeLabels' => false, //allows you to use html in labels
            ]);
            ?>
        </section>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <h1><?= $this->title ?></h1>
            <?= yii\widgets\Breadcrumbs::widget([
                'homeLink' => [
                    'label' => 'Главная',
                    'url' => ['/admin/default/index'],
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </section>
        <section class="content">
            <?= \kartik\alert\AlertBlock::widget([
                'type' => \kartik\alert\AlertBlock::TYPE_ALERT,
                'useSessionFlash' => true
            ]); ?>
            <?= $content ?>
            <div class="clearfix"></div>
        </section>
    </div>
    <footer class="main-footer">
        Создано <?= yii\bootstrap\Html::a('yashr team', 'http://yashr.ru') ?>
    </footer>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

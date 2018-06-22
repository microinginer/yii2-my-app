<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'My App';
?>
<div class="site-index">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <h1>
                <?= $this->title ?><br>
                <?php if (Yii::$app->getUser()->getIsGuest()): ?>
                    <small><a href="<?= Url::to(['/user/login']) ?>">Войти</a></small>
                    <small><a href="<?= Url::to(['/user/register']) ?>">Зарегистрироваться</a></small>
                <?php else: ?>
                    <small><a href="<?= Url::to(['/adminable']) ?>">Панель управления</a></small>
                    <small><a href="<?= Url::to(['/user/logout']) ?>" data-method="post">Выйти</a></small>
                <?php endif; ?>
            </h1>
        </div>
    </div>
</div>

<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/**
 * @var $model \dektrium\rbac\models\Rule
 * @var $this  \yii\web\View
 */

$this->title = Yii::t('rbac', 'Update rule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="box box-primary">
    <div class="box-body">
        <?php $this->beginContent('@dektrium/rbac/views/layout.php') ?>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
        <?php $this->endContent() ?>
    </div>
</div>

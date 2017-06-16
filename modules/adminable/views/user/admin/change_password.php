<?php
/**
 * @var $this yii\web\View
 * @var $model \yii\base\DynamicModel
 */
$this->title = 'Изменить пароль';
?>
<div class="row">
    <div class="col-md-12">
        <p class="alert alert-warning">Пароль нужно поменять обязательно!</p>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <?php $form = \yii\bootstrap\ActiveForm::begin([]) ?>
        <div class="box box-default">
            <div class="box-header with-border">
                <h2 class="box-title"><?= $this->title ?></h2>
            </div>
            <div class="box-body">
                <?= $form->errorSummary($model, ['class' => 'callout callout-danger']) ?>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'old_password')->passwordInput()->label('Текущий пароль') ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'new_password')->passwordInput()->label('Новый пароль') ?>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <?= \yii\bootstrap\Html::submitButton('Изменить', ['class' => 'btn btn-primary pull-right']) ?>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php \yii\bootstrap\ActiveForm::end(); ?>
    </div>
</div>

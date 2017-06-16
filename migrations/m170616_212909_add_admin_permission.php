<?php

use yii\db\Migration;

class m170616_212909_add_admin_permission extends Migration
{
    public function up()
    {
        $role = Yii::$app->authManager->createRole('admin');
        $role->description = Yii::t('app', 'Administrator');
        Yii::$app->authManager->add($role);
    }

    public function down()
    {

    }
}

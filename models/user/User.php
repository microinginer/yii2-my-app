<?php

namespace app\models\user;

use yii\helpers\ArrayHelper;
use dektrium\user\models\User as BaseUser;

/**
 * Class User
 * @package app\models\user
 */
class User extends BaseUser
{
    /**
     * @return string
     */
    public function getCorrectName()
    {
        return $this->profile->name ?: $this->username;
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'correctName' => 'Имя',
        ]);
    }
}

<?php

namespace app\models;

use dektrium\user\models\User as BaseUser;
use yii\helpers\ArrayHelper;

/**
 * Class User
 * @package app\models
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

<?php

namespace app\models;

use dektrium\user\models\User as BaseUser;

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
}

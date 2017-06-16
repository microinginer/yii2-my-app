<?php

namespace app\modules\adminable\controllers;


use dektrium\user\controllers\RegistrationController as BaseRegistrationController;

/**
 * Class RegistrationController
 * @package app\modules\adminable\controllers
 */
class RegistrationController extends BaseRegistrationController
{
    public $layout = '@app/modules/adminable/views/layouts/sign';
}

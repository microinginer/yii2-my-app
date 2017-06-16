<?php

namespace app\modules\adminable\controllers;

use dektrium\user\controllers\SecurityController as BaseSecurityController;


/**
 * Class SecurityController
 * @package app\modules\adminable\controllers
 */
class SecurityController extends BaseSecurityController
{
    public $layout = '@app/modules/adminable/views/layouts/sign';
}

<?php

namespace app\modules\adminable\controllers;

use dektrium\user\controllers\RecoveryController as BaseRecoveryController;


/**
 * Class SecurityController
 * @package app\modules\adminable\controllers
 */
class RecoveryController extends BaseRecoveryController
{
    public $layout = '@app/modules/adminable/views/layouts/sign';
}

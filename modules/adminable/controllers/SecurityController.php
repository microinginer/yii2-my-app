<?php

namespace app\modules\adminable\controllers;


/**
 * Class SecurityController
 * @package app\modules\adminable\controllers
 */
class SecurityController extends \dektrium\user\controllers\SecurityController
{
    public $layout = '@app/modules/adminable/views/layouts/sign';
}

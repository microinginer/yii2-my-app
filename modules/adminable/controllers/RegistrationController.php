<?php
/**
 * Created by PhpStorm.
 * User: inginer
 * Date: 20.05.16
 * Time: 20:10
 */

namespace app\modules\adminable\controllers;


class RegistrationController extends \dektrium\user\controllers\RegistrationController
{
    public $layout = '@app/modules/adminable/views/layouts/sign';
}

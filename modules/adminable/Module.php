<?php

namespace app\modules\adminable;

/**
 * adminable module definition class
 *
 * Class Module
 * @package app\modules\adminable
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\adminable\controllers';

    public $layout = 'main';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }
}

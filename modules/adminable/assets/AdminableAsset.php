<?php

namespace app\modules\adminable\assets;

use yii\web\AssetBundle;

/**
 * Class AdminableAsset
 * @package app\modules\adminable\assets
 */
class AdminableAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@app/modules/adminable/public';

    /**
     * @var string
     */
    public $baseUrl = '@web';

    /**
     * @var array
     */
    public $depends = [
        'app\modules\adminable\assets\AdminLteAsset',
    ];
}

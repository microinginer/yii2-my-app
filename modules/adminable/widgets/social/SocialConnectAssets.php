<?php

namespace app\modules\adminable\widgets\social;

use yii\web\AssetBundle;

/**
 * Class SocialConnectAssets
 * @package app\modules\adminable\widgets\social
 */
class SocialConnectAssets extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@app/modules/adminable/widgets/social/assets';

    /**
     * @var array
     */
    public $css = [
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
        'styles.css',
    ];

    /**
     * @var array
     */
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];
}

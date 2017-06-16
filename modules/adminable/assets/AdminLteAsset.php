<?php

namespace app\modules\adminable\assets;

use yii\web\AssetBundle;

/**
 * Class AdminLteAsset
 * @package app\modules\adminable\assets
 */
class AdminLteAsset extends AssetBundle
{
    /**
     * @var array
     */
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
        'adminlte/dist/css/skins/skin-blue.css',
        'adminlte/dist/css/AdminLTE.min.css',
    ];

    /**
     * @var string
     */
    public $sourcePath = '@vendor/almasaeed2010';

    /**
     * @var array
     */
    public $js = [
        'adminlte/dist/js/app.min.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}

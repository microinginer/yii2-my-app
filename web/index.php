<?php

// comment out the following two lines when deployed to production

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../env.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';


// debug tools
function d()
{
    foreach (func_get_args() as $val) {
        \yii\helpers\VarDumper::dump($val, 10, true);
    }
}

function dx()
{
    foreach (func_get_args() as $val) {
        d($val);
    }
    exit;
}

function br()
{
    echo '<br><br>';
}

(new yii\web\Application($config))->run();

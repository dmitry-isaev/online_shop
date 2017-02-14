<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use \yii\web\View;

/**
 * IE frontend application asset bundle.
 */
class IEAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/html5shiv.js',
        'js/respond.min.js',
    ];
    public $jsOptions = [
        'condition' => 'lt IE 9',
        'position' => View::POS_HEAD,
    ];
}

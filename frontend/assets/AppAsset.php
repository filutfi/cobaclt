<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Quattrocento:400,700%7COswald:300,400,500,600,700',
        'css/corporate-classic.css',
        'css/jquery.cslider.css',
        'css/jquery.bxslider.css',
        'css/animate.css',
        'css/styleku.css',

    ];
    public $js = [
      'js/corporate-classic.min.js',
      'js/jquery.js',
      'js/bootstrap.js',
      'js/modernizr.custom.js',
      'js/jquery.cslider.js',
      'js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

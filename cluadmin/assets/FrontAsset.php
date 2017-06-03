<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FrontAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
      '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
      'css/cssFront/frontend-render.css',
      'css/cssFront/hovercard.css',
      'css/cssFront/jetpack.css',
      'css/cssFront/magnific-popup.css',
      'css/cssFront/mediaelementplayer.min.css',
      'css/cssFront/services.css',
      'css/cssFront/style.css',
      'css/cssFront/styles.min.css',
      'css/cssFront/wp-mediaelement.css'
    ];
    public $js = [
      //'js/jsFront/jquery.js',
//      'js/jsFront/243437.js',
      'js/jsFront/api.js',
      'js/jsFront/colormag-custom.js',
      'js/jsFront/colormag-slider-setting.js',
      'js/jsFront/cta-variation.js',
      'js/jsFront/devicepx-jetpack.js',
//      'js/jsFront/e-201609.js',
      'js/jsFront/fitvids-setting.js',
      'js/jsFront/gprofiles.js',
      'js/jsFront/image-popup-setting.js',
//      'js/jsFront/inboundAnalytics.min.js',
      'js/jsFront/jquery-migrate.min.js',
      'js/jsFront/jquery.bxslider.min.js',
      'js/jsFront/jquery.fitvids.js',
      'js/jsFront/jquery.magnific-popup.min.js',
      'js/jsFront/jquery.newsTicker.min.js',
      'js/jsFront/jquery.sticky.js',
      'js/jsFront/mediaelement-and-player.min.js',
      'js/jsFront/navigation.js',
//      'js/jsFront/recaptcha__en.js',
      'js/jsFront/script.min.js',
      'js/jsFront/sticky-setting.js',
      'js/jsFront/ticker-setting.js',
      // 'js/jsFront/wp-embed.min.js',
      // 'js/jsFront/wp-emoji-release.min.js',
      // 'js/jsFront/wp-mediaelement.js',
      // 'js/jsFront/wpgroho.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

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
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
      '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
      'css/AdminLTE.min.css',
      'css/bootstrap.min.css',
      'css/site.css',
      'css/skins/_all-skins.min.css',
      'plugins/icheck/flat/blue.css'
    ];
    public $js = [
      'js/app.js',
      'js/app.min.js',
      'js/bootsrap.min.js',
      'js/dashboard.js',
      'js/dashboard2.js',
      'js/demo.js',
      'plugins/sparkline/jquery.sparkline.min.js',
      'plugins/slimscroll/jquery.slimscroll.min.js',
      'plugins/fastclick/fastclick.min.js',
      '//code.jquery.com/ui/1.11.2/jquery-ui.min.js',
      '//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
    ];
    public $depends = [
      'http://code.jquery.com/ui/1.11.2/jquery-ui.min.js',
      'yii\web\YiiAsset',
      //'yii\bootstrap\BootstrapAsset',
    ];
}

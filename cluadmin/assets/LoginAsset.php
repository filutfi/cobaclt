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
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
      'css/AdminLTE.min.css',
      'css/bootstrap.min.css',
    ];
    public $js = [
      'js/bootsrap.min.js',
    ];
    public $depends = [
      //'http://code.jquery.com/ui/1.11.2/jquery-ui.min.js',
      'yii\web\YiiAsset',
      //'yii\bootstrap\BootstrapAsset',
    ];
}

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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    		'css/mdb.css',
        'css/site.css'
    	
    ];
    public $js = [
    		
    		'js/jquery.min.js',
    		'js/bootstrap.min.js',
    		'js/mdb.js',
    		'js/app/controllers.js',
    		'js/app/app.js'
    		
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    	'app\assets\AngularAsset',
    ];
}

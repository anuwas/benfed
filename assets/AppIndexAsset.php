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
class AppIndexAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets/css/bootstrap.min.css',
    	'assets/css/font-awesome.min.css',
    		'assets/css/superslides.css',
    		'assets/css/slick.css',
    		'assets/css/animate.css',
    		'assets/css/jquery.tosrus.all.css',
    		'assets/css/themes/default-theme.css',
    		'assets/css/style.css',
    		'assets/css/owl.carousel.css',
    		'assets/css/owl.theme.css',
    		'assets/css/responsive.css',
    ];
    public $js = [
    		'assets/js/jquery.bootstrap.newsbox.min.js',
    		'assets/js/queryloader2.min.js',
    		'assets/js/wow.min.js',
    		'assets/js/bootstrap.min.js',
    		'assets/js/slick.min.js',
    		'assets/js/jquery.easing.1.3.js',
    		'assets/js/jquery.animate-enhanced.min.js',
    		'assets/js/jquery.superslides.min.js',
    		'assets/js/circliful.js',
    		'assets/js/jquery.tosrus.min.all.js',
    		'assets/js/owl.carousel.js',
    		'assets/js/jquery.prettyPhoto.js',
    		'assets/js/custom.js',
    		'assets/js/main.js',
    		
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
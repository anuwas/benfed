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
class AppAdminAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
			//'css/site.css',
			'assets/admin/vendor/bootstrap/css/bootstrap.css',
			'assets/admin/vendor/font-awesome/css/font-awesome.css',
			'assets/admin/vendor/magnific-popup/magnific-popup.css',
			'assets/admin/vendor/bootstrap-datepicker/css/datepicker3.css',
			'assets/admin/vendor/select2/select2.css',
			'assets/admin/vendor/jquery-datatables-bs3/assets/css/datatables.css',
			'assets/admin/stylesheets/theme.css',
			'assets/admin/stylesheets/skins/default.css',
			'assets/admin/stylesheets/theme-custom.css',
	];
	public $js = [
	];
	public $depends = [
			'yii\web\YiiAsset',
			//'yii\bootstrap\BootstrapAsset',
	];
}

<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="ie ie6 lte9 lte8 lte7 no-js"> <![endif]-->
<!--[if IE 7]>     <html class="ie ie7 lte9 lte8 lte7 no-js"> <![endif]-->
<!--[if IE 8]>     <html class="ie ie8 lte9 lte8 no-js">      <![endif]-->
<!--[if IE 9]>     <html class="ie ie9 lte9 no-js">           <![endif]-->
<!--[if gt IE 9]>  <html class="no-js">                       <![endif]-->
<!--[if !IE]><!--> <html class="no-js">                       <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title> <?php $settingRecord = $common->getAdminSetting(); 
				if(isset($settingRecord['Setting']['title']))echo $settingRecord['Setting']['title'];
				 ?></title>
    
    <?php echo $this->fetch('script'); ?>
	
	<script type="text/javascript"> 
    var WEBROOT = "<?php echo Helper::webroot(''); ?>";
    </script>
    <script src="<?php echo Helper::webroot(''); ?>js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo Helper::webroot(''); ?>js/jquery-ui-1.8.22.min.js"></script> 
    <!-- // Mobile meta/files // -->

	<!-- For third-generation iPad with high-resolution Retina display: -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo Helper::webroot(''); ?>apple-touch-icon-144x144-precomposed.png">
    <!-- For iPhone 4with high-resolution Retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Helper::webroot(''); ?>img/mobile/apple-touch-icon-114x114.png" />
    <!-- For first-generation iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Helper::webroot(''); ?>img/mobile/apple-touch-icon-72x72.png" />
    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo Helper::webroot(''); ?>img/mobile/apple-touch-icon.png" />
    <!-- For nokia devices: -->
    <link rel="shortcut icon" href="<?php echo Helper::webroot(''); ?>img/apple-touch-icon.png" />
    <!-- 320x460 for iPhone 3GS -->
    <link rel="apple-touch-startup-image" media="(max-device-width: 480px) and not (-webkit-min-device-pixel-ratio: 2)" href="<?php echo Helper::webroot(''); ?>img/mobile/splash-320x460.png" />
    <!-- 640x920 for retina display -->
    <link rel="apple-touch-startup-image" media="(max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2)" href="<?php echo Helper::webroot(''); ?>img/mobile/splash-640x920-retina.png" />
    <!-- iPad Portrait 768x1004 -->
    <link rel="apple-touch-startup-image" media="(min-device-width: 768px) and (orientation: portrait)" href="<?php echo Helper::webroot(''); ?>img/mobile/splash-768x1004.png" />
    <!-- iPad Landscape 1024x748 -->
    <link rel="apple-touch-startup-image" media="(min-device-width: 768px) and (orientation: landscape)" href="<?php echo Helper::webroot(''); ?>img/mobile/splash-1024x748.png" />
    <!-- iPad 3 Portrait 1536x2008 -->
    <link rel="apple-touch-startup-image" media="(min-device-width: 1536px) and (orientation: portrait)" href="<?php echo Helper::webroot(''); ?>img/mobile/splash-1536x2008-retina.png" />
    <!-- iPad 3 Landscape 2048x1536 -->
    <link rel="apple-touch-startup-image" media="(min-device-width: 2048px) and (orientation: landscape)" href="<?php echo Helper::webroot(''); ?>img/mobile/splash-2048x1496-retina.png" />
    <!-- Transform to webapp: -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fullscreen mode: -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- Viewport for older phones - http://davidbcalhoun.com/tag/handheldfriendly -->
    <meta name="HandheldFriendly" content="true"/>   
    <!-- Viewport - http://davidbcalhoun.com/tag/handheldfriendly -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
    <!-- This file contains some fixes, splash screen and web app code --> 
    <script src="<?php echo Helper::webroot(''); ?>js/mobiledevices.js"></script>
    
    <!-- // Internet Explore // -->
    
    <!-- IE9 Pinned Sites: http://msdn.microsoft.com/en-us/library/gg131029.aspx -->
    <meta name="application-name" content="Elite Admin Skin">
    <meta name="msapplication-tooltip" content="Cross-platform admin skin.">
    <meta name="msapplication-starturl" content="http://themes.creativemilk.net/elite/html/index.html">
    <!-- These custom tasks are examples, you need to edit them to show actual pages -->
    <meta name="msapplication-task" content="name=Home;action-uri=http://themes.creativemilk.net/elite/html/index.html;icon-uri=http://themes.creativemilk.net/elite/html/<?php echo Helper::webroot(''); ?>img/favicons/favicon.ico">
    <meta http-equiv="cleartype" content="on" /> 
    
    <!--[if lt IE 8]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
    <![endif]-->
            
    <!-- // Stylesheets // -->

    <!-- Framework -->
    <link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>css/framework.css"/>
   	<?php echo $this->fetch('css_head'); ?>
    <!-- Styling -->
    <link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>css/theme/lightgrey1.css" id="themesheet"/>
    
	
    
	<!--[if IE 7]>
	<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>css/destroy-ie6-ie7.css"/>
    <![endif]-->
      
    <!-- // Misc // -->
    
    <link rel="shortcut icon" href="<?php echo Helper::webroot(''); ?>img/favicons/favicon.ico">
    
   
                
</head>


<?php if(false){ ?>
<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->css('/usermgmt/css/umstyle');
	?>
</head>
<?php } ?>
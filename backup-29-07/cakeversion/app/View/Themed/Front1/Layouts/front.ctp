<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="<?php echo isset($meta_tags) ? $meta_tags : ''; ?>" />
<meta name="description" content="<?php echo isset($meta_description) ? $meta_description : ''; ?>" />
<title><?php echo isset($meta_title) ? $meta_title : ''; ?>- Mahima Group</title>  

<?php 
	echo $this->Html->css('style.css'); 
	echo $this->Html->css('reset.css');
	
?><?php 	echo $this->Html->css('colorbox.css');  ?>
<script src="<?php echo Helper::webroot(''); ?>js/jquery.js"></script>
<script src="<?php echo Helper::webroot(''); ?>js/script.js"></script>
<script src="<?php echo Helper::webroot(''); ?>js/jquery.ui.js"></script>
<script src="<?php echo Helper::webroot(''); ?>js/jquery.tabify.js"></script>

<script type="text/javascript">
$(document).ready(function () {
$(".slideshow > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 4000, true);
$('.menu_tab').tabify();
$('.inner_tab').tabify();
});
</script>

<script src="<?php echo Helper::webroot(''); ?>js/jquery.cycle.all.js"></script>
<script src="<?php echo Helper::webroot(''); ?>js/animatedcollapse.js"></script>
<script src="<?php echo Helper::webroot(''); ?>js/panel-slider.js"></script>
<script src="<?php echo Helper::webroot(''); ?>js/border-radius.js"></script>

<script src="<?php echo Helper::webroot(''); ?>js/jquery.colorbox.js"></script>

<script>
$(document).ready(function(){
$(".plan_map").colorbox({rel:'plan_map'});				
});
</script>

<script src="<?php echo Helper::webroot(''); ?>js/css3.js"></script>
<script src="<?php echo Helper::webroot(''); ?>js/html5.js"></script>
<script src="<?php echo Helper::webroot(''); ?>js/IE9.js"></script>
</head>
<body onLoad="DrawCaptcha();DrawCaptchaEn();load();"  onunload="GUnload()">
<!--start header-->
<?php $page="home" ?>
<?php //include("includes/header.php");?>



<?php echo $this->element('Header_inner'); ?>

<!--end header-->
<!--start slideshow-->
<?php echo $this->element('Header_Home'); ?>
<!--end slideshow-->
<!--start middle-->
<!---->
 <?php echo $this->fetch('content'); ?>
<!--end middle-->
<!--start footer-->
<?php echo $this->element('footer'); ?>
<!--end footer-->
</body>
</html>
 <?php echo $this->element('sql_dump'); ?> 
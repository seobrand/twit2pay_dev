<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="keywords" content="<?php echo isset($meta_tags) ? $meta_tags : ''; ?>" />
<meta name="description" content="<?php echo isset($meta_description) ? $meta_description : ''; ?>" />
<title><?php echo isset($meta_title) ? $meta_title. " - " : ''; ?>Twit2Pay</title>  

<?php 
	echo $this->Html->css('style.css'); 
	echo $this->Html->css('reset.css');
	
?>
<script src="<?php echo Helper::webroot(''); ?>js/jquery.js"></script>
<script src="<?php echo Helper::webroot(''); ?>js/jquery.cycle.all.min.js"></script>
<script src="<?php echo Helper::webroot(''); ?>js/script.js"></script>

<!--[if lt IE 9]>
<script src="<?php echo Helper::webroot(''); ?>js/border-radius.js"></script>
<script src="<?php echo Helper::webroot(''); ?>js/css-support-script.js"></script>
<script src="<?php echo Helper::webroot(''); ?>js/html5.js"></script>
<script src="<?php echo Helper::webroot(''); ?>js/IE9.js"></script>
<![endif]-->

</head>
<body>
<!--start header-->
<?php $page="home" ?>

<?php echo $this->element('header'); ?>
<!--end header-->
<!--start slideshow-->
<?php echo $this->element('slider'); ?>
<!--end slideshow-->
<!--start middle-->
<!---->
<!--start middle-->
<section class="middle">
  <div class="wrapper">
 <?php echo $this->fetch('content'); ?>
    <?php echo $this->element('middle_content'); ?>
  </div>
</section>
<!--end middle-->
<!--start footer-->
<?php echo $this->element('footer'); ?>
<!--end footer-->
</body>
</html>
 <?php //echo $this->element('sql_dump'); ?> 
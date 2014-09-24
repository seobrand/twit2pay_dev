<?php // add some css here ?>
<?php $this->start('css_head'); ?>
<!-- Core -->
<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>css/login.css"/>
<!-- Core -->
<link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>css/enotify.css"/>

<?php $this->end(); ?>


<?php // add some js here ?>
<?php $this->start('footer_js'); ?>
<!-- Checkbox solution -->
<script src="<?php echo Helper::webroot(''); ?>js/e_checkbox.1.0.min.js"></script>
<!-- Tabs -->
<script src="<?php echo Helper::webroot(''); ?>js/e_tabs.1.0.min.js"></script>
<!-- Menu -->
<script src="<?php echo Helper::webroot(''); ?>js/e_menu.1.0.min.js"></script>
<!-- Contact form with validation -->
<script src="<?php echo Helper::webroot(''); ?>js/e_contactform.1.0.min.js"></script>
<!-- Show password -->
<script src="<?php echo Helper::webroot(''); ?>js/e_showpassword.1.0.min.js"></script>
<!-- Tooltip -->
<script src="<?php echo Helper::webroot(''); ?>js/tipsy.js"></script>
<!-- Plugins and custom code -->
<script src="<?php echo Helper::webroot(''); ?>js/login.js"></script>
<!-- Notify -->
<script src="<?php echo Helper::webroot(''); ?>js/e_notify.1.0.min.js"></script>
<?php $this->end(); ?>


<?php echo $this->element('head'); ?>

<body>
<?php echo $this->element('style_switcher'); ?>
<div id="login"> 
  
  <!-- Put your logo here -->
  <div id="logo">
    <h1>Twit2pay</h1>
  </div>
  
  <!-- Show a dialog -->
  <div class="g_1">
   <?php  echo $this->Session->flash('dialogs_basic'); ?>
  </div>
  <?php echo $this->fetch('content'); ?> 
  
  <!-- place your copyright text here -->
  <footer id="footer"> Copyright © 2012</footer>
</div>
<!-- End "#login" -->
<div class="g_3_4_last"> 
	<?php  echo $this->Session->flash('dialogs_big'); ?>                                       
</div>

<?php echo $this->element('footer_js'); ?> 
<?php echo $this->element('Dialogs/enotify/notification/default'); ?>
</body>
</html>

<?php //echo $this->element('sql_dump'); ?> 
<?php // add some css here ?>
<?php $this->start('css_head'); ?>
    <!-- Main -->
    <link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>css/style.css"/>
    <!-- jQuery UI --> 
    <link rel="stylesheet" href="<?php echo Helper::webroot(''); ?>css/ui/jquery.ui.base.css"/>

<?php $this->end(); ?>


<?php // add some js here ?>
<?php $this->start('footer_js'); ?>
<!-- // Thirdparty plugins // -->
    
    <!-- MouseWheel -->  
    <script src="<?php echo Helper::webroot(''); ?>js/jquery.mousewheel.min.js"></script>
    <!-- UI Spinner -->
	<script src="<?php echo Helper::webroot(''); ?>js/jquery.ui.spinner.js"></script>
    <!-- Tooltip -->               
    <script src="<?php echo Helper::webroot(''); ?>js/tipsy.js"></script>
    <!-- Treeview -->                         
    <script src="<?php echo Helper::webroot(''); ?>js/treeview.js"></script>
    <!-- Calendar -->                         
    <script src="<?php echo Helper::webroot(''); ?>js/fullcalendar.min.js"></script> 
    <!-- selectToUISlider -->                
    <script src="<?php echo Helper::webroot(''); ?>js/selectToUISlider.jQuery.js"></script> 
    <!-- context Menu -->         
    <script src="<?php echo Helper::webroot(''); ?>js/jquery.contextMenu.js"></script> 
    <!-- File Explore -->              
    <script src="<?php echo Helper::webroot(''); ?>js/elfinder.min.js"></script> 
    <!-- AutoGrow Textarea -->                   
    <script src="<?php echo Helper::webroot(''); ?>js/autogrow-textarea.js"></script> 
    <!-- Resizable Textarea -->               
    <script src="<?php echo Helper::webroot(''); ?>js/textarearesizer.min.js"></script>
    <!-- HTML5 WYSIWYG -->  
    <script src="<?php echo Helper::webroot(''); ?>wysiwyghtml5/parser_rules/advanced.js"></script>
	<script src="<?php echo Helper::webroot(''); ?>wysiwyghtml5/dist/wysihtml5-0.3.0.js"></script>    
    <!-- Lightbox -->                      
    <script src="<?php echo Helper::webroot(''); ?>js/jquery.colorbox-min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo Helper::webroot(''); ?>js/jquery.dataTables.min.js"></script>            
    <!-- Masked inputs -->
    <script src="<?php echo Helper::webroot(''); ?>js/jquery.maskedinput-1.3.min.js"></script> 
    <!-- IE7 JSON FIX -->
    <script src="<?php echo Helper::webroot(''); ?>js/json2.js"></script>
    <!-- HTML5 audio player -->
    <script src="<?php echo Helper::webroot(''); ?>audiojs/audiojs/audio.min.js"></script> 
             
    <!-- // Custom theme plugins // -->
    
	<!-- Widgets -->
    <script src="<?php echo Helper::webroot(''); ?>js/powerwidgets.1.1.min.js"></script>
    <!-- Widgets panel -->
    <script src="<?php echo Helper::webroot(''); ?>js/powerwidgetspanel.1.1.min.js"></script>
    <!-- Select styling -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_select.1.0.min.js"></script>    
    <!-- Checkbox solution -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_checkbox.1.0.min.js"></script>
    <!-- Radio button replacement -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_radio.1.0.min.js"></script>    
    <!-- Tabs -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_tabs.1.0.min.js"></script>
    <!-- File styling -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_file.1.0.min.js"></script>    
    <!-- MainMenu -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_mainmenu.1.0.min.js"></script>
    <!-- Menu -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_menu.1.0.min.js"></script>
    <!-- Input popup box -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_inputexpand.1.0.min.js"></script>
    <!-- Progressbar -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_progressbar.1.0.min.js"></script>
    <!-- Scrollbar replacemt -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_scrollbar.1.0.min.js"></script> 
    <!-- Onscreen keyboard -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_oskeyboard.1.0.min.js"></script>
    <!-- Textarea limiter -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_textarealimiter.1.0.min.js"></script>
    <!-- Contact form with validation -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_contactform.1.0.js"></script>
    <!-- Responsive table helper -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_responsivetable.1.0.min.js"></script>
    <!-- Gallery -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_gallery.1.0.min.js"></script>
    <!-- Live search -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_livesearch.1.0.min.js"></script>
    <!-- Notify -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_notify.1.0.min.js"></script>  
    <!-- Countdown -->  
    <script src="<?php echo Helper::webroot(''); ?>js/e_countdown.1.0.min.js"></script> 
    <!-- Clone script -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_clone.1.0.min.js"></script> 
    <!-- Chained inputs -->
    <script src="<?php echo Helper::webroot(''); ?>js/e_chainedinputs.1.0.min.js"></script>
    <!-- Show password -->     
    <script src="<?php echo Helper::webroot(''); ?>js/e_showpassword.1.0.min.js"></script>        
    <!-- All plugins are set here -->
    <script src="<?php echo Helper::webroot(''); ?>js/plugins.js"></script>
    <!-- Custom code -->
    <script src="<?php echo Helper::webroot(''); ?>js/main.js"></script>
   
   <script type="text/javascript"> 
   //  use to hide success msg 
    $(document).ready(function () {
    //hide a div after 3 seconds
	 setTimeout( "$('.e-growl-wrapper').hide(2000);",5000 );
	});
    </script>
    
     <script src="<?php echo Helper::webroot(''); ?>js/tiny_mce/tiny_mce.js"></script>
     
	 <script language="javascript" type="text/javascript">
	<?php 
	if($preset = "basic")
	{
		$options = '
		mode : "textareas",
		elements : "ajaxfilemanager",
		theme : "advanced",
		editor_deselector : "mceNoEditor",
		plugins : "advimage,advlink,table,media,contextmenu",    
		theme_advanced_buttons1 : "bold,italic,underline,separator,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink,outdent,indent,image,code,cut,copy,paste",
		theme_advanced_buttons2 : "fontselect,fontsizeselect,forecolor,backcolor,cleanup,removeformat",
		theme_advanced_buttons3 : "tablecontrols",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_path_location : "bottom",
		file_browser_callback : "ajaxfilemanager",
		extended_valid_elements : "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
		content_css : "/css/'.$this->layout.'.css"    
		';
	}
	?>

		tinyMCE.init({<?php echo($options); ?>});
		function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = "<?php echo FULL_BASE_URL.Router::url('/', false);?>js/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";
			switch (type) {
				case "image":
					break;
				case "media":
					break;
				case "flash": 
					break;
				case "file":
					break;
				default:
					return false;
			}
            tinyMCE.activeEditor.windowManager.open({
                url: "<?php echo FULL_BASE_URL.Router::url('/', false);?>js/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php",
                width: 752,
                height: 500,
                inline : "yes",
                close_previous : "no"
            },{
                window : win,
                input : field_name
            });
            
		}

</script>


<link rel="stylesheet" type="text/css" href="">
	
		
		
    
<?php


 $this->end(); ?>


<?php echo $this->element('head'); ?>

<body class="layout_fluid layout_responsive"> 

<?php echo $this->element('style_switcher'); ?>


	<div id="container">
    
<?php echo $this->element('header_main'); ?>
        
        <!-- CONTENT -->
                 
        <div id="content">
            <div id="content-border">
            
            <?php echo $this->element('header_content'); ?>
                                
                <div id="content-inner">
                    
                 <?php echo $this->element('customer_sidebar'); ?>
                     
                    <!-- CONTENT -->
                    
					<div id="content-main">
                        <div id="content-main-inner">
                        
                        <?php echo $this->element('widget_settings'); ?>
                            
                            <?php echo $this->fetch('content'); ?>
                               
                                                                           
							<div class="clear"><!-- New row --></div>
                            
                            <!-- End grid -->
                            
                       </div><!-- End #content-main-inner --> 
                    </div><!-- End #content-main --> 
                </div><!-- End #content-inner --> 
                
               <?php echo $this->element('footer_content'); ?>  
            </div><!-- End #content-border --> 
        </div><!-- End #content --> 
            
    </div><!-- End #container -->
    
    <!-- scroll to top link -->
    <div id="scrolltotop"><span></span></div> 

<?php echo $this->element('sql_dump'); ?> 
<?php echo $this->element('footer_js'); ?> 
<?php echo $this->element('Dialogs/enotify/notification/default'); ?>
<?php echo $this->element('Dialogs/enotify/growl/default'); ?>

<!-- Js writeBuffer -->

<?php
	if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
	// Writes cached scripts
	?>
</body>
</html>
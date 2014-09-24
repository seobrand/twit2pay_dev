<!-- // jQuery/UI core // -->


<?php /*?><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>!window.jQuery && document.write('<script src="<?php echo Helper::webroot(''); ?>js/jquery-1.7.2.min.js"><\/script>')</script>
    <script src="http://code.jquery.com/ui/1.8.22/jquery-ui.min.js"></script>
    <script>!window.jQueryUI && document.write('<script src="<?php echo Helper::webroot(''); ?>js/jquery-ui-1.8.22.min.js"><\/script>')</script><?php */?>

<!-- // Plugins // -->

<!-- Touch helper -->
<script src="<?php echo Helper::webroot(''); ?>js/jquery.ui.touch-punch.min.js"></script>
<!-- Stylesheet switcher -->
<script src="<?php echo Helper::webroot(''); ?>js/e_styleswitcher.1.0.min.js"></script>
<!-- // HTML5/CSS3 support // -->
<script src="<?php echo Helper::webroot(''); ?>js/modernizr.min.js"></script>


<?php echo $this->fetch('footer_js'); ?>
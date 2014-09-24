<?php $this->start('footer_js'); ?>
<script type="text/javascript">
$(document).ready(function($){
/**
	 * Name        : eContactForm
	 * Description : Easy contact form with AJAX and validation
	 * File Name   : e_contactform.js
	 * Plugin Url  :  
	 * Version     : 1.0	
	 * Updated     : --/--/---
	 * Dependency  :
	 * Developer   : Mark
	**/	
		
	$('#form-validation').eContactForm({
		labelError: 'This field is required!',
		labelSuccess: 'not in use',
		labelFail: 'The form has not been submitted, please try it again!',
		keydown: true,
		useAjax: true,
		before: function(){ },
		after: function(){ }		
	});
});
</script>
<?php $this->end();?>
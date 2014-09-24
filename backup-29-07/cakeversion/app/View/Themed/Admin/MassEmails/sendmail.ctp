<?php if(isset($enableAjax) && $enableAjax == 'yes'){ ?>
<?php echo $this->element('ajax_form_default'); ?>
<?php } ?>
<?php  $this->start('footer_js'); ?>
<script type="text/javascript">
$(document).ready(function(){
			
			
				$("#category_id").change(function(){
					
					var email_template_id =$("#category_id").val();
					//alert(email_template_id); return false;
					//$('#project_image_category_id').html(''); 	
        			$.ajax({
					  type: "POST",
					  url: "<?php echo $this->webroot; ?>MassEmails/gettemplate",
					  data: { email_template_id: email_template_id },
					  success: function(data) {
						 	 tinyMCE.activeEditor.setContent(data);
							   
                            }
						})
 				   });
				
				});
		</script>

<?php echo  $this->end(); ?>

<br/>
<section class="g_1"> 
  
  <!-- New widget -->
  
  <div class="powerwidget" id="widget1">
    <header>
      <h2> Mass Email  </h2>
    </header>
    <div>
    <?php 
/*	echo $this->Ajax->observeField( 'project_category_id', 
    array(
        'url' => array( 'action' => 'addProject' ),
        'complete' => 'alert(hello project)'
    ) 
); */
?>
      <div class="inner-spacer"> <?php echo $this->Form->create('MassEmails', array('action' => 'sendmail', 'enctype' => 'multipart/form-data','id'=>'form-validation')); ?>
        <?php //echo $this->Session->flash(); ?>
        <fieldset>
          <legend contenteditable="true">Here you select email template and manage emails.</legend>
          
          <div class="g_1_4">
            <label for="af-present"> Email Category:</label>
          </div>
          <div class="g_3_4_last"> <?php echo $this->Form->input("email_category_id" ,array('type' => 'select','options'=>$emailCategory,'empty'=>'Select Template' ,'label' => false,'div' => false,'id'=>'category_id','data-validation-type'=>'present' ))?> </div>
          <div class="spacer-20"></div>
          
         
         
          <div class="g_1_4">
          <label for="af-present">Message:</label>
          </div>
          <div class="g_3_4_last"> 
    	  <?php echo $this->Form->input("message" ,array('type'=>'textarea','label' => false, 'div' => false,'id'=>'message_template','data-validation-type'=>'present' ))?>
         </div>
          <div class="spacer-20"><!-- spacer 20px --></div>
          
          
          <div class="g_1_4">
          <label for="af-present">Subject:</label>
          </div>
          <div class="g_3_4_last"> 
          <?php echo $this->Form->input("subject" ,array('label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?>    </div>
          <div class="spacer-20"><!-- spacer 20px --></div>
          
          
           <div class="g_1_4">
            <label for="af-present"> Email Category:</label>
          </div>
          <div class="g_3_4_last"> <?php 
		  $mailOption = array('users'=>'All Users');
		  echo $this->Form->input("mailto_category" ,array('type' => 'select','options'=>$mailOption,'empty'=>'Select Category For Mail Send' ,'label' => false,'div' => false,'id'=>'mailto_category','data-validation-type'=>'present' ))?> </div>
          <div class="spacer-20"></div>
          
         
        
          <div class="g_3_4_last">
            <input type="submit" value="Submit" class="button-text"/>
          </div>
        </fieldset>
        <?php echo $this->Form->end(); ?> </div>
    </div>
  </div>
  <?php /* 
echo $this->Ajax->observeField( 'category_id', 
    array(
        'url' => array( 'action' => 'subcategoryList' ),
        'complete' => 'alert(request.responseText)'
    ) 
); */
?>
  <!-- End .powerwidget --> 
  
</section>
<div class="clear"><!-- New row --></div>

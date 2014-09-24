<?php if(isset($enableAjax) && $enableAjax == 'yes'){ ?>
<?php echo $this->element('ajax_form_default'); ?>
<?php } ?>
<?php  $this->start('footer_js'); ?>
<script type="text/javascript">
$(document).ready(function(){
			
				$("#project_image_patent_id").change(function(){
					var project_image_id =$("#project_image_patent_id").val();
					$('#project_image_category_id').html(''); 	
        			$.ajax({
					  type: "POST",
					  url: "<?php echo $this->webroot; ?>ProjectImages/projectImgCategory",
					  data: { projectImageId: project_image_id },
					  success: function(data) {
						 
 							 $('#project_image_category_id').append(data);
							   
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
      <h2> Add Email Template </h2>
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
      <div class="inner-spacer"> <?php echo $this->Form->create('EmailTemplate', array('action' => 'addEmailTemplate', 'enctype' => 'multipart/form-data','id'=>'form-validation')); ?>
        <?php //echo $this->Session->flash(); ?>
        <fieldset>
          <legend contenteditable="true">Here you add email template to manage emails.</legend>
          
          <div class="g_1_4">
          <label for="af-present">Message:</label>
          </div>
          <div class="g_3_4_last"> 
    	  <?php echo $this->Form->input("message" ,array('type'=>'textarea','label' => false, 'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?>
         </div>
          <div class="spacer-20"><!-- spacer 20px --></div>
          
          
          
          
          <div class="g_1_4">
          <label for="af-present">Template Name:</label>
          </div>
          <div class="g_3_4_last"> 
           <?php echo $this->Form->input("template_name" ,array('type'=>'text','label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?>     </div>
          <div class="spacer-20"><!-- spacer 20px --></div>
          
      <!--    <div class="g_1_4">
            <label for="af-present"> Email Category:</label>
          </div>
          <div class="g_3_4_last"> <?php echo $this->Form->input("email_category_id" ,array('type' => 'select','options'=>$emailCategory,'empty'=>'Select Project' ,'label' => false,'div' => false,'id'=>'category_id','data-validation-type'=>'present' ))?> </div>
          <div class="spacer-20"></div>-->
          
          <div class="g_1_4">
          <label for="af-present">Subject:</label>
          </div>
          <div class="g_3_4_last"> 
          <?php echo $this->Form->input("subject" ,array('label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?>    </div>
          <div class="spacer-20"><!-- spacer 20px --></div>
          
          
          
         
        
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

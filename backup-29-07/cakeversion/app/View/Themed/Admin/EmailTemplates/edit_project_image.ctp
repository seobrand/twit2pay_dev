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
      <h2> Edit Project Image </h2>
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
      <div class="inner-spacer"> <?php echo $this->Form->create('ProjectImage', array('action' => 'editProjectImage', 'enctype' => 'multipart/form-data','id'=>'form-validation')); ?>
        <?php //echo $this->Session->flash(); ?>
        <fieldset>
          <legend contenteditable="true">Here you add project image.</legend>
          <div class="g_1_4">
          <label for="af-present">Project Image Name:</label>
          </div>
          <div class="g_3_4_last"> 
           <?php echo $this->Form->input("name" ,array('label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?>     </div>
          <div class="spacer-20"><!-- spacer 20px --></div>
          
          <div class="g_1_4">
            <label for="af-present"> Project:</label>
          </div>
          <div class="g_3_4_last"> <?php echo $this->Form->input("project_id" ,array('type' => 'select','options'=>$projectList,'empty'=>'Select Project' ,'label' => false,'div' => false,'id'=>'category_id','data-validation-type'=>'present' ))?> </div>
          <div class="spacer-20"><!-- spacer 20px --></div>
          
          <div class="g_1_4">
          <label for="af-present">Project Image Category:</label>
          </div>
          <div class="g_3_4_last"> 
           <?php echo $this->Form->input("project_image_category" ,array('type' => 'select','options'=>$projectImgCatLists,'empty'=>'Select Project Image Category' ,'label' => false,'div' => false,'id'=>'project_image_patent_id','data-validation-type'=>'present' ))?>     </div>
          <div class="spacer-20"><!-- spacer 20px --></div>
          
          <div class="g_1_4">
          <label for="af-present">Project Sub Image Category:</label>
          </div>
          <div class="g_3_4_last"> 
         <?php echo $this->Form->input("project_image_category_id" ,array('type' => 'select','options'=>$projectImgSubCatLists,'empty'=>'Select Project Image sub Category' ,'label' => false,'div' => false,'id'=>'project_image_category_id','data-validation-type'=>'present' ))?>   
         </div>
          <div class="spacer-20"><!-- spacer 20px --></div>
          
          
          
          <div class="g_1_4">
          <label for="af-present">Project Image:</label>
          </div>
          <div class="g_3_4_last"> 
           <?php echo $this->Form->input("project_image" ,array('type'=>'file','label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?>   
                 <?php if(!empty($this->request->data['ProjectImage']['project_image'])){  ?>
            <div class="media-minimal">
            <a href="<?php echo $this->webroot.'project/project_'.$this->request->data['ProjectImage']['project_id'].'/'.$this->request->data['ProjectImage']['project_image']; ?>" class="group3">   
             <img src="<?php echo $this->webroot.'project/project_'.$this->request->data['ProjectImage']['project_id'].'/150x80_'.$this->request->data['ProjectImage']['project_image'];?>" alt="" /> </a>
                     </div>
              <?php } ?>   
             </div>
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

<?php if(isset($enableAjax) && $enableAjax == 'yes'){ ?>
<?php echo $this->element('ajax_form_default'); ?>
<?php } ?>

<br/>
<section class="g_1"> 
  
  <!-- New widget -->
  
  <div class="powerwidget" id="widget1">
    <header>
      <h2> Settings </h2>
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
      <div class="inner-spacer"> <?php echo $this->Form->create('Setting', array('action' => 'adminSetting', 'enctype' => 'multipart/form-data','id'=>'form-validation')); ?>
        <?php // pr($this->request->data); ?>
        <fieldset>
          <legend contenteditable="true">Here you set CMS settings.</legend>
          <div class="g_1_4">
          <label for="af-present">Title:</label>
          </div>
          <div class="g_3_4_last"> 
           <?php echo $this->Form->input("title" ,array('type'=>'text','label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?>     </div>
          <div class="spacer-20"><!-- spacer 20px --></div>
          
           <div class="g_1_4">
          <label for="af-present">Copyright:</label>
          </div>
          <div class="g_3_4_last"> 
           <?php echo $this->Form->input("copyright" ,array('label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?>     </div>
          <div class="spacer-20"><!-- spacer 20px --></div>
          
           <div class="g_1_4">
          <label for="af-present">Facebook Link:</label>
          </div>
          <div class="g_3_4_last"> 
           <?php echo $this->Form->input("facebook" ,array('label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?>     </div>
          <div class="spacer-20"><!-- spacer 20px --></div>
          
            <div class="g_1_4">
          <label for="af-present">Twitter Link:</label>
          </div>
          <div class="g_3_4_last"> 
           <?php echo $this->Form->input("twitter" ,array('label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?>     </div>
          <div class="spacer-20"><!-- spacer 20px --></div>
          
            <div class="g_1_4">
          <label for="af-present">Google Plus:</label>
          </div>
          <div class="g_3_4_last"> 
           <?php echo $this->Form->input("googleplus" ,array('label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?>     </div>
          <div class="spacer-20"><!-- spacer 20px --></div>
          
            <div class="g_1_4">
          <label for="af-present">Address:</label>
          </div>
          <div class="g_3_4_last"> 
           <?php echo $this->Form->input("address" ,array('label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?>     </div>
          <div class="spacer-20"><!-- spacer 20px --></div>
        
          <div class="g_3_4_last">
            <input type="submit" value="Submit" class="button-text"/>
          </div>
        </fieldset>
        <?php echo $this->Form->end(); ?> </div>
    </div>
  </div>

  <!-- End .powerwidget --> 
  
</section>
<div class="clear"><!-- New row --></div>

<?php if(isset($enableAjax) && $enableAjax == 'yes'){ ?>
<?php echo $this->element('ajax_form_default'); ?>
<?php } ?>

<br/>
<section class="g_1"> 
  
  <!-- New widget -->
  
  <div class="powerwidget" id="widget1">
    <header>
      <h2><?php echo $tableName; ?></h2>
    </header>
    <div>
      <div class="inner-spacer"> <?php echo $this->Form->create('UserGroup', array('id'=>'form-validation')); ?> <?php echo $this->Form->hidden('id')?> <?php echo $this->Session->flash(); ?>
        <fieldset>
          <legend contenteditable="true">Here you can create new user group.</legend>
          <div class="g_1_4">
            <label for="af-present">Group Name:</label>
          </div>
          <div class="g_3_4_last"> <?php echo $this->Form->input("name" ,array('label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?> <span class="field-helper">This is a field helper text line...</span> </div>
          <div class="spacer-20"><!-- spacer 20px --></div>
          <div class="g_1_4">
            <label for="af-present">Alias Group Name:</label>
          </div>
          <div class="g_3_4_last"> <?php echo $this->Form->input("alias_name" ,array('label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?> <span class="field-helper">This is a field helper text line...</span> </div>
          <div class="g_1_4">
            <label></label>
          </div>
          <div class="g_3_4_last"> <?php echo $this->Form->input("allowRegistration" ,array("type"=>"checkbox",'label' => false))?>
            <label for="af-present4">Yes, Allow Registration</label>
            <input type="submit" value="Submit" class="button-text"/>
          </div>
        </fieldset>
        <?php echo $this->Form->end(); ?> </div>
    </div>
  </div>
  <!-- End .powerwidget --> 
  
</section>
<div class="clear"><!-- New row --></div>

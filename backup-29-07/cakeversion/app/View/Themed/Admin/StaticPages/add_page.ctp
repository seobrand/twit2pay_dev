

<br/><br/>
<section class="g_1">
  <div class="powerwidget" id="widget1">
    <header>
      <h2> Add Page </h2>
    </header>
    <div>
      <div class="inner-spacer"> <?php echo $this->Form->create('StaticPage', array('action' => 'addPage','enctype' => 'multipart/form-data','id'=>'form-validation')); ?>
        <?php //echo $this->Session->flash(); ?>
        <fieldset>
        <legend contenteditable="true">Add Banner.</legend>
      
        <div class="g_1_4">
          <label for="af-present">Title:</label>
        </div>
        <div class="g_3_4_last"> <?php echo $this->Form->input("StaticPage.page_title" ,array('label' => false,'div' => false,'data-validation-type'=>'present' ,'style' =>'width:40px important;float:left important'))?> </div>
        <div class="spacer-20">
          <!-- spacer 20px -->
        </div>
        
       
          <div class="g_1_4">
          <label for="af-present">Description:</label>
          </div>
          <div class="g_3_4_last"> 
        <?php echo $this->Form->input("StaticPage.description" ,array('type'=>'textarea','label' => false,'div' => false,'data-validation-type'=>'present' ,'style' =>'width:40px important;float:left important'))?>  
             </div>
          <div class="spacer-20"><!-- spacer 20px --></div>
       
       
        

        
        
        <div class="g_3_4_last">
          <?php 
		//  echo $this->Form->input('News.Add',array('class'=>'button-text','value'=>'Add','type'=>'hidden'));
		  
		  echo $this->Form->submit('Submit',array('class'=>'button-text','value'=>'Submit')); ?>
        </div>
        </fieldset>
        <?php echo $this->Form->end(); ?> </div>
    </div>
  </div>
  <!-- End .powerwidget -->
</section>
<div class="clear">
  <!-- New row -->
</div>
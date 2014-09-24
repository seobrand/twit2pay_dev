<!--start middle-->
<section class="middle">
  <div class="content">
    <div class="content_inner">
      <div class="sidebar_title">
        <p class="fontsize32">Offer Partnership</p>
      </div>
           
           
           
           <!--left section start-->
        
    	 <aside class="sidebar_left">
  <div class="sidebar_topnav">
    <div class="sidarbar_nav">
      <ul>

       <?php  if($this->params['controller']=='StaticPages' or $this->params['action']=='offerPartnership') {   ?>
<!--               <li><a href="the-company.php" class="active_nav">The Company</a></li>-->
                <li><?php echo $this->Html->link('The Company',array('controller'=>'StaticPages','action'=>'detail/1')) ?></li>
                <li><?php echo $this->Html->link('Vision & Mission',array('controller'=>'StaticPages','action'=>'detail/2')) ?></li>
                <li><?php echo $this->Html->link('Milestones',array('controller'=>'StaticPages','action'=>'detail/3')) ?></li>
                <li><?php echo $this->Html->link('CMD\'s Profile',array('controller'=>'StaticPages','action'=>'detail/4')) ?></li>
                <li><?php echo $this->Html->link('Team @ Mahima',array('controller'=>'StaticPages','action'=>'detail/5')) ?></li>
                <li><?php echo $this->Html->link('Maintenance Company',array('controller'=>'StaticPages','action'=>'detail/6')) ?></li>
                <li><?php echo $this->Html->link('Corporate Social Resp.',array('controller'=>'StaticPages','action'=>'detail/7')) ?></li>
        <?php } else{  ?>
        
      <?php $projectCats = $common->getProjectCategory(); 
		  foreach($projectCats as $projectCat)
		  {
		  ?>
            <li><?php echo $this->Html->link(ucfirst($projectCat['ProjectCategory']['name']),array('controller'=>'projects','action'=>'projectType',$projectCat['ProjectCategory']['id'],$projectCat['ProjectCategory']['name']),array('escape'=>false)); ?></li>
          
           <?php } ?>
        <?php } ?>
      </ul>
    </div>
  </div>
   <?php echo $this->element('three_panal'); ?>
           
   <?php echo $this->element('left_latestlunch'); ?>     
        
        
</aside>
     	
        <!--left section end-->
           
           
      <div class="container_right">
        <div class="contant_title">
          <p class="fontsize20">For Join Ventures/Collabrations/Sales</p>
        </div>
        <div class="career_form_container">
          <p>&nbsp; </p>
          <?php echo $this->Session->flash(); ?>
          <div class="career_field">
            <?php
		echo $this->Form->create('homes', array('controller'=>'homes','action' => 'offerPartnership','enctype'=>'multipart/form-data')); ?> 
         
            <table>
              <tr>
                <td class="career_txt">*Location:</td>
                <td class="career_txtbox">
                     	<?php echo $this->Form->input("OfferPartnership.location" ,array('type' => 'text','label' => false,'div' => false,'class'=>'text_field_box'))?>
                </td>
              </tr>
              <tr>
                <td class="career_txt">*Area of Land:</td>
                <td class="career_txtbox">
                        	<?php echo $this->Form->input("OfferPartnership.area_land" ,array('type' => 'text','label' => false,'div' => false,'class'=>'area_land_txtbox'))?>
                     <?php echo $this->Form->input("OfferPartnership.unit_measurement" ,array('type' => 'select','options'=>array('Unit of Measurement'=>'Unit of Measurement','Square Feet'=>'Square Feet','Yard'=>'Yard','Acre'=>'Acre'),'empty'=>false ,'label' => false,'div' => false,'class'=>'unit_measurement_combo'))?>
                </td>
              </tr>
              <tr>
                <td class="career_txt">*Road Width (In Feet):</td>
                <td class="career_txtbox">
               	<?php echo $this->Form->input("OfferPartnership.road_width" ,array('type' => 'text','label' => false,'div' => false,'class'=>'text_field_box'))?>
                </td>
              </tr>
              <tr>
                <td class="career_txt">*Land Use:</td>
                <td class="career_txtbox">
                                 <?php echo $this->Form->input("OfferPartnership.land_use" ,array('type' => 'select','options'=>array('Agriculture'=>'Agriculture','Non Agriculture'=>'Non Agriculture','Commercial'=>'Commercial','Residential'=>'Residential'),'empty'=>false ,'label' => false,'div' => false,'class'=>'landuse_combo'))?>
               
                </td>
              </tr>
              <tr>
                <td class="career_txt">*Name:</td>
                <td class="career_txtbox">
                <?php echo $this->Form->input("OfferPartnership.first_name" ,array('type' => 'text','label' => false,'div' => false,'class'=>'text_field_box'))?>
                
                </td>
              </tr>
              <tr>
                <td class="career_txt">*Mobile Number:</td>
                <td class="career_txtbox">
                 <?php echo $this->Form->input("OfferPartnership.mobile_no" ,array('type' => 'text','label' => false,'div' => false,'class'=>'text_field_box'))?>
                </td>
              </tr>
              <tr>
                <td class="career_txt">*Email ID:</td>
                <td class="career_txtbox">
                 <?php echo $this->Form->input("OfferPartnership.email" ,array('type' => 'text','label' => false,'div' => false,'class'=>'text_field_box'))?>
                </td>
              </tr>
              <tr>
                <td class="career_txt">*City:</td>
                <td class="career_txtbox">
                     <?php echo $this->Form->input("OfferPartnership.city" ,array('type' => 'text','label' => false,'div' => false,'class'=>'text_field_box'))?>
                </td>
              </tr>
              <tr>
                <td class="career_txt address_text"></td>
                <td class="career_txtbox">
                
                
                  <?php 
				    echo $this->Form->submit('',array('class'=>'submit_btn','value'=>'','type'=>'submit','div'=>false)); 
					
					  echo $this->Form->submit('',array('class'=>'reset_btn','value'=>'','type'=>'reset','div'=>false));
					?>
               
                </td>
              </tr>
            </table>
         <?php echo $this->Form->end(); ?>   
        
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--end middle-->
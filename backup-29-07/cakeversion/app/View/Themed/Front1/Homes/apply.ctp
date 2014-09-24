 <?php 
 $page=$this->params['action'];

?> <section class="middle">
  <div class="content">
    <div class="content_inner">
      <div class="sidebar_title">
        <p class="fontsize32">Career</p>
      </div>
         
           <!--statrt middle-->
     <aside class="sidebar_left">
        <div class="sidebar_topnav">
          <div class="sidarbar_nav">
            <ul>
              
          <li>
			   <a href="<?php echo $this->Html->url(array( "controller" => "homes",    "action" => "contactUs"));?>" class="<?php if($page=='contactUs') echo "active_nav" ?>">Locate Us</a></li>
			<li>   <a href="<?php echo $this->Html->url(array( "controller" => "homes",    "action" => "career"));?>" class="<?php if($page=='career' or $page=='jobDetail' or $page=='apply') echo "active_nav" ?>">Career With Us</a></li>  
            </ul>
          </div>
        </div>
      
         <?php echo $this->element('three_panal'); ?>
         <?php echo $this->element('left_latestlunch'); ?>
        
      </aside>
     <!--end middle-->
         
         
         
      <div class="container_right">
        <div class="contant_title">
          <p class="fontsize20">Career</p>
        </div>
        
        <?php
		$this->request->data['JobApplication']['job_posting_id']=$JobRec['JobPosting']['id'];
		
		echo $this->Form->create('homes', array('controller'=>'homes','action' => 'apply/'.$this->request->data['JobApplication']['job_posting_id'],'enctype'=>'multipart/form-data')); ?> 
         
         
       <!--  <form id="HomesApply/15Form" accept-charset="utf-8" method="post" enctype="multipart/form-data" action="/pushkar/mahima/pro/Homes/apply/<?php echo $this->request->data['JobApplication']['job_posting_id']; ?>">-->
         
        <div class="career_form_container">
          <div class="career_title">
            <p>Personal Information</p>
          </div>
          <div class="career_field">
            <table>
              <tr>
                <td class="career_txt">*First Name:</td>
                <td class="career_txtbox">
                 <?php echo $this->Form->input("JobApplication.first_name" ,array('type' => 'text','label' => false,'div' => false,'class'=>'text_field_box'))?>
                </td>
              </tr>
              <tr>
                <td class="career_txt">*Last Name:</td>
                <td class="career_txtbox">
                
                <?php echo $this->Form->input("JobApplication.last_name" ,array('type' => 'text','label' => false,'div' => false,'class'=>'text_field_box'))?>
                </td>
              </tr>
            </table>
          </div>
          <div class="career_title">
            <p>Contact Details:</p>
          </div>
          <div class="career_field">
            <table>
              <tr>
                <td class="career_txt">*Personal Email Id:</td>
                <td class="career_txtbox">
                
                <?php echo $this->Form->input("JobApplication.email" ,array('type' => 'text','label' => false,'div' => false,'class'=>'text_field_box'))?>
                </td>
              </tr>
              <tr>
                <td class="career_txt">*Contact No:</td>
                <td class="career_txtbox">
                <?php echo $this->Form->input("JobApplication.contact" ,array('type' => 'text','label' => false,'div' => false,'class'=>'text_field_box'))?>
                
                 
              </td>
              </tr>
              <tr>
                <td class="career_txt address_text">*Address :</td>
                <td class="career_txtbox">
               	 <?php echo $this->Form->input("JobApplication.address" ,array('type' => 'text','label' => false,'div' => false,'class'=>'text_field_box'))?>
               </td>
              </tr>
            </table>
          </div>
          <div class="career_title">
            <p>Other Details:</p>
          </div>
          <div class="career_field">
            <table>
              <tr>
                <td class="career_txt">Experience:</td>
                <td class="career_txtbox">
                  <?php echo $this->Form->input("JobApplication.experience_id" ,array('type' => 'select','options'=>$experienceList,'empty'=>false ,'label' => false,'div' => false,'class'=>'exp_combo'))?> 
                  
                <!--  <span class="fontsize13">Years and</span>
                  <select name="exp_month" class="exp_combo">
                    <option value="0">0</option>
                    <option value="0">1</option>
                  </select>
                  <span class="fontsize13">Month</span>--> </td>
              </tr>
            
              <tr>
              
                <td class="career_txt">Current Employer :</td>
                <td class="career_txtbox">
                	<?php echo $this->Form->input("JobApplication.current_emp" ,array('type' => 'text','label' => false,'div' => false,'class'=>'text_field_box'))?>
                
               </td>
              </tr>
              <tr>
                <td class="career_txt">Present Salary (per Annum):</td>
                <td class="career_txtbox"><?php echo $this->Form->input("JobApplication.last_salary" ,array('type' => 'text','label' => false,'div' => false,'class'=>'text_field_box'))?></td>
              </tr>
              <tr>
                <td class="career_txt">Expected Salary (per Annum):</td>
                <td class="career_txtbox"><?php echo $this->Form->input("JobApplication.expected_salary" ,array('type' => 'text','label' => false,'div' => false,'class'=>'text_field_box'))?></td>
              </tr>
              <tr>
                <td class="career_txt">Post Applying For:</td>
                <td class="career_txtbox career_txt" style="height:40px;">
                <p ><?php echo $JobRec['JobPosting']['title']; ?></p>
                
                
                <!--<input type="text" value="" name="email" class="text_field_box">--></td>
              </tr>
              <tr>
                <td class="career_txt address_text">Resume:</td>
                <td class="career_txtbox"><!--<textarea name="address" class="address_field_box"></textarea>-->
                 <?php echo $this->Form->input("JobApplication.resume" ,array('type' => 'file','label' => false,'div' => false))?> 
                </td>
              </tr>
              <tr>
                <td class="career_txt address_text"></td>
                <td class="career_txtbox"><!--<input type="submit" name="post_resume" class="post_resume" value=" ">
                  <input type="reset" name="reset" class="reset_btn" value=" ">-->
                  
                  <br/>
                  
                  <?php 
				   echo $this->Form->input('JobApplication.Apply',array('class'=>'post_resume','value'=>'Apply','type'=>'hidden'));
		  echo $this->Form->submit('',array('class'=>'button-text','value'=>'','class'=>'post_resume')); ?>
				  
				 
                </td>
              </tr>
            </table>
          </div>
        </div>
      <!--  </form>-->
        <?php echo $this->Form->end(); ?> 
      </div>
    </div>
  </div>
</section>
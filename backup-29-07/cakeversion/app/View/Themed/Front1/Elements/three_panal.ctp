  <script src="<?php echo Helper::webroot(''); ?>js/validation.js"></script>
    <script type="text/javascript">
 
    function DrawCaptcha()
    {
        var a = Math.ceil(Math.random() * 10)+ '';
        var b = Math.ceil(Math.random() * 10)+ '';       
        var c = Math.ceil(Math.random() * 10)+ '';  
        var d = Math.ceil(Math.random() * 10)+ '';  
        var e = Math.ceil(Math.random() * 10)+ '';  
        var f = Math.ceil(Math.random() * 10)+ '';  
        var g = Math.ceil(Math.random() * 10)+ '';  
        var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
        document.getElementById("txtCaptcha").value = code
    }

    // Validate the Entered input aganist the generated security code function   
    function ValidCaptcha(){
        var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
        var str2 = removeSpaces(document.getElementById('txtInput').value);
        if (str1 == str2) return true;        
        return false;
        
    }

    // Remove the spaces from the entered and generated code
    function removeSpaces(string)
    {
        return string.split(' ').join('');
    } 
</script>
    <div class="<?php if($this->params['controller']=='homes' && $this->params['action']=='index'){ echo 'three_panal_outer'; } else echo 'sidebar_sliding_panel'; ?>">
      <ul>
        <li>
          <div class="expand_container">
            <div class="collapse_title first_panel"><a href="#" name="property_locater" rel="toggle[property_locater]" title="<?php echo Helper::webroot(''); ?>img/first-panel-arrow-up.png" rev="<?php echo Helper::webroot(''); ?>img/first-panel-arrow-down.png">Property Locater <img src="<?php echo Helper::webroot(''); ?>img/first-panel-arrow-down.png" width="22" height="22" alt="Down Arrow"></a> </div>
            <div id="property_locater" class="collapse_container">
              
               <?php echo $this->Form->create('homes', array('action' => 'propertyLocater', 'enctype' => 'multipart/form-data','id'=>'form-validation','name'=>'property_locater_form','onsubmit'=>'return check1();')); ?>
                <ul>
                  <li>
                    <?php echo $this->Form->input("property" ,array('type' => 'select','options'=>array('residental'=>'Residental'),'label' => false,'div' => false,'id'=>'property','name'=>'property','class'=>'combo_box' ))?>   
                  </li>
                  <li>
                   <?php echo $this->Form->input("location" ,array('type' => 'select','options'=>array('jaipur'=>'Jaipur'),'label' => false,'div' => false,'id'=>'location','name'=>'location','class'=>'combo_box' ))?>   
                  </li>
                  <li>
                  <?php echo $this->Form->input("unit_type" ,array('type' => 'select','options'=>array('1 BHK'=>'1 BHK','2 BHK'=>'2 BHK'),'empty'=>'*Unit Type','label' => false,'div' => false,'id'=>'unit_type','name'=>'unit_type','class'=>'combo_box' ))?>   
                    
                  </li>
                  <li>
                   <?php echo $this->Form->input("price" ,array('type' => 'select','options'=>array('10-20 Lakhs'=>'10-20 Lakhs','20-30 Lakhs'=>'20-30 Lakhs'),'empty'=>'*Price Range','label' => false,'div' => false,'id'=>'price','name'=>'price','class'=>'combo_box' ))?>  
                  </li>
                  <li>
                    <?php echo $this->Form->input("email" ,array('type' => 'text','label' => false,'div' => false,'id'=>'email','name'=>'email','onFocus'=>"if(this.value=='*Email') {this.value=''}" ,'onBlur'=>"if(this.value=='') {this.value='*Email'}" ,'value'=>'*Email','class'=>'text_field','maxlength'=>'50'))?> 
                  </li>
                  <li>
                    <?php echo $this->Form->input("pl_mobile" ,array('type' => 'text','label' => false,'div' => false,'id'=>'pl_mobile','name'=>'pl_mobile','onFocus'=>"if(this.value=='*Mobile') {this.value=''}" ,'onBlur'=>"if(this.value=='') {this.value='*Mobile'}" ,'value'=>'*Mobile','class'=>'text_field','maxlength'=>'12' ))?> 
                  </li>
                  <li>
<input type="text" id="txtCaptcha"  disabled="disabled"  class="inquiry_box_input_new" style="background-image:url(images/1.jpg); font-size:14px; font-weight:bold;text-align:center; border:none; width:160px;font-weight:bold; font-family:Modern;height:26px;" />
             <img onClick="DrawCaptcha();"  alt="Refresh" src="<?php echo Helper::webroot(''); ?>img/Refresh.png" style=" cursor: pointer; float: right; ">
                  </li> 
                   <li>
                      <input type="text" id="txtInput" class="text_field" maxlength="20"/>  
                  </li>
                  <li>
                    <input type="submit" value="" class="panel_submit_btn">
                  </li>
                </ul>
            <?php echo $this->Form->end(); ?>
            </div>
            <div class="clear"></div>
          </div>
        </li>
        <li>
          <div class="expand_container">
            <div class="collapse_title second_panel"><a href="#" name="enquiry_center" rel="toggle[enquiry_center]" title="<?php echo Helper::webroot(''); ?>img/second-panel-arrow-up.png" rev="<?php echo Helper::webroot(''); ?>img/second-panel-arrow-down.png">Enquiry Center
            <img src="<?php echo Helper::webroot(''); ?>img/second-panel-arrow-down.png" width="22" height="22" alt="Down Arrow"></a> </div>
            <div id="enquiry_center" class="collapse_container">
        
               <?php echo $this->Form->create('homes', array('action' => 'enquireyCenter', 'enctype' => 'multipart/form-data','id'=>'form-validation','name'=>'enquirey_center_form','onsubmit'=>'return check2();')); ?>
                <ul>
                  <li>
                 <?php echo $this->Form->input("name" ,array('type' => 'text','label' => false,'div' => false,'id'=>'name','name'=>'name','onFocus'=>"if(this.value=='*Name') {this.value=''}" ,'onBlur'=>"if(this.value=='') {this.value='*Name'}" ,'value'=>'*Name','class'=>'text_field','maxlength'=>'50' ))?> 
                  </li>
                  <li>
                  <?php echo $this->Form->input("email" ,array('type' => 'text','label' => false,'div' => false,'id'=>'email','name'=>'email','onFocus'=>"if(this.value=='*Email') {this.value=''}" ,'onBlur'=>"if(this.value=='') {this.value='*Email'}" ,'value'=>'*Email','class'=>'text_field','maxlength'=>'50'))?> 
                  </li>
                  <li>
                       <?php echo $this->Form->input("mobile" ,array('type' => 'text','label' => false,'div' => false,'id'=>'mobile','name'=>'mobile','onFocus'=>"if(this.value=='*Mobile') {this.value=''}" ,'onBlur'=>"if(this.value=='') {this.value='*Mobile'}" ,'value'=>'*Mobile','class'=>'text_field','maxlength'=>'12' ))?>
                  </li>
                  <li>
                     <?php echo $this->Form->input("state" ,array('type' => 'text','label' => false,'div' => false,'id'=>'state','name'=>'state','onFocus'=>"if(this.value=='*State') {this.value=''}" ,'onBlur'=>"if(this.value=='') {this.value='*State'}" ,'value'=>'*State','class'=>'text_field','maxlength'=>'50'))?> 
                  </li>
                  <li>
                    <?php echo $this->Form->input("city" ,array('type' => 'text','label' => false,'div' => false,'id'=>'city','name'=>'city','onFocus'=>"if(this.value=='*City') {this.value=''}" ,'onBlur'=>"if(this.value=='') {this.value='*City'}" ,'value'=>'*City','class'=>'text_field','maxlength'=>'50'))?> 
                  </li>
                  <li>
                    <input type="radio" name="type" value="Project Enquiry" id="radio_1" class="radio_btn">
                    <p class="enquirey_type">Project Enquiry</p>
                  </li>
                  <li>
                    <input type="radio" name="type" value="Sale/Purchase/Lease" id="radio_2" class="radio_btn">
                    <p class="enquirey_type">Sale/Purchase/Lease</p>
                  </li>
                  <li>
                    <input type="radio" name="type" value="Other Enquiry" id="radio_3" class="radio_btn">
                    <p class="enquirey_type">Other Enquiry</p>
                  </li>
                  <li>
                  
                         <?php echo $this->Form->input("project" ,array('type' => 'select','options'=>array('residental'=>'Residental','commercial'=>'Commercial'),'empty'=>'Select Project','label' => false,'div' => false,'id'=>'project','name'=>'project','class'=>'combo_box' ))?>  
                  </li>
                  <li>
                   
                      <?php echo $this->Form->input("comment" ,array('type' => 'textarea','label' => false,'div' => false,'id'=>'comment','name'=>'comment','onFocus'=>"if(this.value=='Write Comments:') {this.value=''}" ,'onBlur'=>"if(this.value=='') {this.value='Write Comments:'}" ,'class'=>'comment_box'))?> 
                  </li>
                    <li>
<input type="text" id="txtCaptcha12"  disabled="disabled"  class="inquiry_box_input_new" style="background-image:url(images/1.jpg); font-size:14px; font-weight:bold;text-align:center; border:none; width:160px;font-weight:bold; font-family:Modern;height:26px;" />
             <img onClick="DrawCaptchaEn();"  alt="Refresh" src="<?php echo Helper::webroot(''); ?>img/Refresh.png" style=" cursor: pointer; float: right; ">
                  </li> 
                   <li>
                      <input type="text" id="txtInput12" class="text_field" maxlength="20"/>  
                  </li>
                  <li>
                    <input type="submit" value="" class="panel_submit_btn">
                  </li>
                </ul>
           <?php echo $this->Form->end(); ?>
            </div>
            <div class="clear"></div>
          </div>
        </li>
        <li>
          <div class="expand_container">
            <div class="collapse_title third_panel"><a href="#" name="latest_launches" rel="toggle[latest_launches]" title="<?php echo Helper::webroot(''); ?>img/third-panel-arrow-up.png" rev="<?php echo Helper::webroot(''); ?>img/third-panel-arrow-down.png">Latest Launches<img src="<?php echo Helper::webroot(''); ?>img/third-panel-arrow-down.png" width="22" height="22" alt="Down Arrow"></a> </div>
            <div id="latest_launches" class="collapse_container">
              <ul>
              <?php 
			  $latestProjects = $common->getlatestProjectLsit();
			  foreach($latestProjects as $latestProject) { ?>
                <li>
                  <div class="project_logo">
<?php if($latestProject['Project']['name']) { ?>
<img src="<?php echo FULL_BASE_URL.router::url('/',false);?>thumbnail.php?file=project/project_<?php echo $latestProject['Project']['id'].'/'.$latestProject['Project']['project_image']; ?>&maxw=56&maxh=56"  >
<?php }else{ ?>
<img src="<?php echo FULL_BASE_URL.router::url('/',false);?>thumbnail.php?file=img/no-image.jpg&maxw=56&maxh=56" alt="Image Not Avaivable" title="Image Not Avaivable" >
<?php } ?>

                </div>
                  <div class="project_details">
                    <p class="project_name"><?php echo $latestProject['Project']['name']; ?></p>
                    <p class="project_desc">&nbsp; </p>
                    <p class="more_info">
                    <?php echo $this->Html->link('more info...',array('controller'=>'projects','action'=>'projectdetail',$latestProject['Project']['id'])) ?>
                    </p>
                  </div>
                </li>
              <?php } ?>
              </ul>
            </div>
            <div class="clear"></div>
          </div>
        </li>
      </ul>
    </div>
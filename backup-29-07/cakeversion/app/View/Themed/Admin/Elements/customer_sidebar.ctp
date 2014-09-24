<?php 


  		$userGroupId=$this->Session->read('UserAuth.User.user_group_id');
		
		// ============== human resource permission ========
		$jobList=$common->isUserGroupAccesss('HumanResources','jobList',$userGroupId); // check permission for humanresource joblist
		$addJob=$common->isUserGroupAccesss('HumanResources','jobList',$userGroupId); // check permission for humanresource add job
		$editJob=$common->isUserGroupAccesss('HumanResources','jobList',$userGroupId); // check permission for humanresource add job
		$deleteJob=$common->isUserGroupAccesss('HumanResources','jobList',$userGroupId); // check permission for humanresource add job
		
		//============= jobapplication permission 
		$applicationList=$common->isUserGroupAccesss('HumanResources','applicationList',$userGroupId); 
		$viewApplication=$common->isUserGroupAccesss('HumanResources','viewApplication',$userGroupId); 
		
		//============= Skills permission 
		$skillList=$common->isUserGroupAccesss('HumanResources','skillList',$userGroupId); 
		$addSkill=$common->isUserGroupAccesss('HumanResources','addSkill',$userGroupId); 
		$editSkill=$common->isUserGroupAccesss('HumanResources','editSkill',$userGroupId); 
		$deleteSkill=$common->isUserGroupAccesss('HumanResources','deleteSkill',$userGroupId); 
		
		
		//============= department permission 
		$departmentList=$common->isUserGroupAccesss('HumanResources','departmentList',$userGroupId); 
		$addDepartment=$common->isUserGroupAccesss('HumanResources','addDepartment',$userGroupId); 
		$editDepartment=$common->isUserGroupAccesss('HumanResources','editDepartment',$userGroupId); 
		$deleteDepartment=$common->isUserGroupAccesss('HumanResources','deleteDepartment',$userGroupId); 
		
		//============= experience permission 
		$experienceList=$common->isUserGroupAccesss('HumanResources','experienceList',$userGroupId); 
		$addExperience=$common->isUserGroupAccesss('HumanResources','addExperience',$userGroupId); 
		$editExperience=$common->isUserGroupAccesss('HumanResources','editExperience',$userGroupId); 
		$deleteExperience=$common->isUserGroupAccesss('HumanResources','deleteExperience',$userGroupId); 
		
		//============= news permission 
		$newsList=$common->isUserGroupAccesss('News','newsList',$userGroupId);
		$viewNews=$common->isUserGroupAccesss('News','viewNews',$userGroupId);
		$addNews=$common->isUserGroupAccesss('News','addNews',$userGroupId);
		$editNews=$common->isUserGroupAccesss('News','editNews',$userGroupId);
		$deleteNews=$common->isUserGroupAccesss('News','deleteNews',$userGroupId);
		//============= Broker permission 
		$brokerList=$common->isUserGroupAccesss('Brokers','brokerList',$userGroupId); 
		$viewBroker=$common->isUserGroupAccesss('Brokers','viewBroker',$userGroupId); 
		$addBroker=$common->isUserGroupAccesss('Brokers','addBroker',$userGroupId); 
		$editBroker=$common->isUserGroupAccesss('Brokers','editBroker',$userGroupId); 
		$deleteBroker=$common->isUserGroupAccesss('Brokers','deleteBroker',$userGroupId); 
		//============= vendor permission 
		$vendorList=$common->isUserGroupAccesss('Vendors','vendorList',$userGroupId);
		$viewVendor=$common->isUserGroupAccesss('Vendors','viewVendor',$userGroupId);
		$addVendor=$common->isUserGroupAccesss('Vendors','addVendor',$userGroupId);
		$editVendor=$common->isUserGroupAccesss('Vendors','editVendor',$userGroupId);
		$deleteVendor=$common->isUserGroupAccesss('Vendors','deleteVendor',$userGroupId);
		//============= project management permission 
		$ProjectCategoriesPermission=$common->isUserGroupAccesss('ProjectCategories','index',$userGroupId);
		$addProjectPermission=$common->isUserGroupAccesss('Projects','addProject',$userGroupId);
		$allProjectPermission=$common->isUserGroupAccesss('Projects','allProject',$userGroupId);
		$imageCategoryPermission=$common->isUserGroupAccesss('ProjectImages','imageCategory',$userGroupId);
		$addProjectImagePermission=$common->isUserGroupAccesss('ProjectImages','addProjectImage',$userGroupId);
		$allProjectImagePermission=$common->isUserGroupAccesss('ProjectImages','allProjectImage',$userGroupId);
		
		
		//============= marketing management permission 
		$addMarketing=$common->isUserGroupAccesss('Marketings','addMarketing',$userGroupId);
		$allMarketing=$common->isUserGroupAccesss('Marketings','allMarketing',$userGroupId);
		
		 
		//============= sales management permission 
		$addLead=$common->isUserGroupAccesss('Leads','addLead',$userGroupId);
		$allLead=$common->isUserGroupAccesss('Leads','allLead',$userGroupId);
		$allOption=$common->isUserGroupAccesss('Leads','allOption',$userGroupId);
		$allOptionValue=$common->isUserGroupAccesss('Leads','allOptionValue',$userGroupId);
 		
	//============= customer permission 
		$allCustomer=$common->isUserGroupAccesss('customers','allCustomer',$userGroupId);
		$addCustomer=$common->isUserGroupAccesss('customers','addCustomer',$userGroupId);
		$allRelation=$common->isUserGroupAccesss('customers','allRelation',$userGroupId);
		$allInvoice=$common->isUserGroupAccesss('customers','allInvoice',$userGroupId);
		$allAlert=$common->isUserGroupAccesss('customers','allAlert',$userGroupId);
	

	
	//============= Email permission 
		$allEmailTemplate=$common->isUserGroupAccesss('EmailTemplates','allEmailTemplate',$userGroupId);
		$addEmailTemplate=$common->isUserGroupAccesss('EmailTemplates','addEmailTemplate',$userGroupId);
		
	
		//============= Sms permission 
		$allSmsTemplate=$common->isUserGroupAccesss('SmsTemplates','allSmsTemplate',$userGroupId);
		$addSmsTemplate=$common->isUserGroupAccesss('SmsTemplates','addSmsTemplate',$userGroupId);
		
		//============= Settings permission 
		$adminSetting=$common->isUserGroupAccesss('Settings','adminSetting',$userGroupId);
		
		//============= users permission 
		$addGroup=$common->isUserGroupAccesss('user_groups','addGroup',$userGroupId);
		$allGroup=$common->isUserGroupAccesss('user_groups','index',$userGroupId);
		$addUser=$common->isUserGroupAccesss('users','addUser',$userGroupId);
		$allUser=$common->isUserGroupAccesss('users','index',$userGroupId);
		$userGroupPermission=$common->isUserGroupAccesss('user_group_permissions','index',$userGroupId);
		$changePassword=$common->isUserGroupAccesss('users','changePassword',$userGroupId);
		$editUser=$common->isUserGroupAccesss('users','editUser',$userGroupId);
		$myprofile=$common->isUserGroupAccesss('users','myprofile',$userGroupId);
		$userdashboard=$common->isUserGroupAccesss('users','dashboard',$userGroupId);
	
	
	
	
		$current_url_here = $this->request->here;
	  	$active_class =' page-active ';
		$menu_open =' menu-open '; 
		
		// user mgmt
		$dashboard_class ='';
		$usermgmt_class ='';
		$addGroup_class ='';
		$allGroups_class ='';
		$addUser_class ='';
		$allUsers_class ='';
		$permissions_class ='';
		$changePassword_class ='';
		$editUser_class ='';
		$myprofile_class ='';
		// project mgmt
		$projectmgt_class ='';
		$projectCategory ='';
		$addProject ='';
		$editProject ='';
		$allProject ='';
		$imageCategory ='';
		$addProjectImage ='';
		$editProjectImage ='';
		$allProjectImage ='';
		// job mgmt
		$jobmgt_class ='';
		$jobLists_class ='';
		$addJob_class = '';
		$editJob_class = '';
		// marketing mgmt
		$marketingmgt_class ='';
		$allMarketing_class ='';
		$addMarketing_class ='';
		$editMarketing_class ='';
		// sales mgmt
		$leadmgmt_class ='';
		$allLead_class ='';
		$addLead_class ='';
		$editLead_class ='';
		// Customer   mgmt
		$customermgmt_class ='';
		$allCustomer_class ='';
		$addCustomer_class ='';
		$editCustomer_class ='';
		$allRelation_class ='';
		$addRelation_class ='';
		$editRelation_class ='';
		$allInvoice_class ='';
		$addInvoice_class ='';
		$editInvoice_class ='';
		$allAlert_class ='';
		$addAlert_class ='';
		$editAlert_class ='';
		// Email template   mgmt
		$emailtempmgmt_class ='';
		$allEmailTemplate_class ='';
		$addEmailTemplate_class ='';
		$editEmailTemplate_class ='';
		// Sms template   mgmt
		$smstempmgmt_class ='';
		$allSmsTemplate_class ='';
		$addSmsTemplate_class ='';
		$editSmsTemplate_class ='';
		
		
		$setting_class ='';
		
		
		if(strpos($current_url_here, '/dashboard') !== false){
		  	$dashboard_class = $active_class;			
		}elseif(strpos($current_url_here, '/addGroup') !== false){
		  	$addGroup_class = $active_class;
			$usermgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/allGroups') !== false){
		  	$allGroups_class = $active_class;
			$usermgmt_class =  $active_class .' '. $menu_open;
		}elseif(strpos($current_url_here, '/addUser') !== false){
		  	$addUser_class = $active_class;
			$usermgmt_class =  $active_class .' '. $menu_open;
		}elseif(strpos($current_url_here, '/allUsers') !== false){
		  	$allUsers_class = $active_class;
			$usermgmt_class =  $active_class .' '. $menu_open;
		}elseif(strpos($current_url_here, '/permissions') !== false){
		  	$permissions_class = $active_class;
			$usermgmt_class =  $active_class .' '. $menu_open;
		}elseif(strpos($current_url_here, '/changePassword') !== false){
		  	$changePassword_class = $active_class;
			$usermgmt_class =  $active_class .' '. $menu_open;
		}elseif(strpos($current_url_here, '/editUser') !== false){
		  	$editUser_class = $active_class;
			$usermgmt_class =  $active_class .' '. $menu_open;
		}elseif(strpos($current_url_here, '/myprofile') !== false){
		  	$myprofile_class = $active_class;
			$usermgmt_class =  $active_class .' '. $menu_open;
		}elseif(strpos($current_url_here, '/ProjectCategories') !== false){
		  	$projectCategory = $active_class;
			$projectmgt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/addProject') !== false){
		  	$addProject = $active_class;
			$projectmgt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/editProject') !== false){
		  	$editProject = $active_class;
			$projectmgt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/allProject') !== false){
		  	$allProject = $active_class;
			$projectmgt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/imageCategory') !== false){
		  	$imageCategory = $active_class;
			$projectmgt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/addProjectImage') !== false){
		  	$addProjectImage = $active_class;
			$projectmgt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/editProjectImage') !== false){
		  	$editProjectImage = $active_class;
			$projectmgt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/allProjectImage') !== false){
		  	$allProjectImage = $active_class;
			$projectmgt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/jobLists') !== false){
		  	$jobLists_class = $active_class;
			$jobmgt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/addJob') !== false){
		  	$addJob_class = $active_class;
			$jobmgt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/editJob') !== false){
		  	$editJob_class = $active_class;
			$jobmgt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/allMarketing') !== false){
		  	$allMarketing_class = $active_class;
			$marketingmgt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/addMarketing') !== false){
		  	$addMarketing_class = $active_class;
			$marketingmgt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/editMarketing') !== false){
		  	$editMarketing_class = $active_class;
			$marketingmgt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/allLead') !== false){
		  	$allLead_class = $active_class;
			$leadmgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/addLead') !== false){
		  	$addLead_class = $active_class;
			$leadmgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/editLead') !== false){
		  	$editLead_class = $active_class;
			$leadmgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/allCustomer') !== false){
		  	$allCustomer_class = $active_class;
			$customermgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/addCustomer') !== false){
		  	$addCustomer_class = $active_class;
			$customermgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/editCustomer') !== false){
		  	$editCustomer_class = $active_class;
			$customermgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/allRelation') !== false || strpos($current_url_here, '/addRelation') !== false || strpos($current_url_here, '/editRelation') !== false){
		  	$allRelation_class = $active_class;
			$customermgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/allInvoice') !== false || strpos($current_url_here, '/addInvoice') !== false || strpos($current_url_here, '/editInvoice') !== false){
			$allInvoice_class = $active_class;
			$customermgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/allAlert') !== false || strpos($current_url_here, '/addAlert') !== false || strpos($current_url_here, '/editAlert') !== false){
			$allAlert_class = $active_class;
			$customermgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/allEmailTemplate') !== false){
		  	$allEmailTemplate_class = $active_class;
			$emailtempmgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/addEmailTemplate') !== false){
		  	$addEmailTemplate_class = $active_class;
			$emailtempmgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/editEmailTemplate') !== false){
		  	$editEmailTemplate_class = $active_class;
			$emailtempmgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/allSmsTemplate') !== false){
		  	$allSmsTemplate_class = $active_class;
			$smstempmgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/addSmsTemplate') !== false){
		  	$addSmsTemplate_class = $active_class;
			$smstempmgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/editSmsTemplate') !== false){
		  	$editSmsTemplate_class = $active_class;
			$smstempmgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/adminSetting') !== false){
		  	$setting_class = $active_class;			
		}
	  
	//echo $menu_open;exit  
?>

<aside> 
  
  <!-- SIDEBAR PROFILE -->
 
  <div id="sidebar-profile">
    <div id="main-avatar"> <span class="indicator">38</span> 
    <?php $profile_image = $this->Session->read('UserAuth.User.profile_image');  if(!empty($profile_image)){ ?>
     <img src="<?php echo $this->webroot.'user/150x150_'.$this->Session->read('UserAuth.User.profile_image');?>" alt="" />
     <?php } else { ?>
      <img src="<?php echo Helper::webroot(''); ?>img/avatar.jpg" alt=""/>
     
     <?php } ?>
    </div>
    <div id="profile-info">
      <div> <a href="<?php echo $this->Html->url("/customers/viewProfile", true); ?>"><b>Customer</b></a> <a href=<?php echo $this->Html->url("/admin/logout", true); ?>>Logout</a> </div>
    </div>
  </div>
  
  <!-- MAIN MENU -->
  
  <nav id="main-menu">
    <ul>
    <?php if($userdashboard){ ?>
      <li class="<?php echo $dashboard_class; ?>"><a href="<?php echo $this->Html->url('/admin/dashboard', true); ?>"><span class="home-16 plix-16"></span> Dashboard</a></li>
      <?php } ?>
      

         <!-- ***************************************** Human Resource *************************************************************-->

      <li class="<?php echo $active_class.$menu_open; ?>"><a href="javascript:void(0);"><span class="controls-16 plix-16"></span>Customer Action<span class="button-icon"><span class="plus-10 plix-10"></span></span></a>
        <ul>
                <li><a href="<?php echo $this->Html->url('/Customers/viewProfile', true); ?>"><?php echo __("My Profile");?></a></li>
                <li><a href="<?php echo $this->Html->url('/Customers/updateEmail', true); ?>"><?php echo __("Reset Email");?></a></li>
                <li><a href="<?php echo $this->Html->url('/Customers/updatePassword', true); ?>"><?php echo __("Reset Password");?></a></li>
                <li><a href="<?php echo $this->Html->url('/Customers/CustomerInvoice', true); ?>"><?php echo __("Download Invoice");?></a></li>
                <li><a href="<?php echo $this->Html->url('/Customers/myProject', true); ?>"><?php echo __("Associate Project");?></a></li>
                <li><a href="<?php echo $this->Html->url('/Customers/myAlert', true); ?>"><?php echo __("Project Alert Subsciption");?></a></li>              
                
        </ul>
      </li>

    </ul>
  </nav>
</aside>

<!-- sidebar meta stats -->

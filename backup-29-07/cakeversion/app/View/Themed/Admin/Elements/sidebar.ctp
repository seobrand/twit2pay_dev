<?php 


  		$userGroupId=$this->Session->read('UserAuth.User.user_group_id');
		
		
		
		//============= marketing management permission 
		$addMarketing=$common->isUserGroupAccesss('Marketings','addMarketing',$userGroupId);
		$allMarketing=$common->isUserGroupAccesss('Marketings','allMarketing',$userGroupId);
		
		
		//============= Email permission 
		$allEmailTemplate=$common->isUserGroupAccesss('EmailTemplates','allEmailTemplate',$userGroupId);
		$addEmailTemplate=$common->isUserGroupAccesss('EmailTemplates','addEmailTemplate',$userGroupId);
		
		//============= Mass Email permission
		$allEmail=$common->isUserGroupAccesss('MassEmails','sendmail',$userGroupId);
		$allMessage=$common->isUserGroupAccesss('MassMessges','sendsms',$userGroupId);
		
		//============= Settings permission 
		$adminSetting=$common->isUserGroupAccesss('Settings','adminSetting',$userGroupId);
		
		//============= users permission 
		$addGroup=$common->isUserGroupAccesss('user_groups','addGroup',$userGroupId);
		$allGroup=$common->isUserGroupAccesss('user_groups','index',$userGroupId);
		$addUser=$common->isUserGroupAccesss('users','addUser',$userGroupId);
		$allUser=$common->isUserGroupAccesss('users','index',$userGroupId);
		$userGroupPermission=$common->isUserGroupAccesss('user_group_permissions','index',$userGroupId);
		$changePasswordPermission=$common->isUserGroupAccesss('users','changePassword',$userGroupId);
		$editUserPermission=$common->isUserGroupAccesss('users','editUser',$userGroupId);
		$myprofilePermission=$common->isUserGroupAccesss('users','myprofile',$userGroupId);
		$userdashboard=$common->isUserGroupAccesss('users','dashboard',$userGroupId);
		
		
		
			//============= Static pages management permission 
		$allPage=$common->isUserGroupAccesss('staticPages','allPage',$userGroupId);
		$addPage=$common->isUserGroupAccesss('staticPages','addPage',$userGroupId);
		$editPage=$common->isUserGroupAccesss('staticPages','editPage',$userGroupId);

	
	
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
		
		
		
				
		// Email template mgmt
		$emailtempmgmt_class ='';
		$allEmailTemplate_class ='';
		$addEmailTemplate_class ='';
		$editEmailTemplate_class ='';
		
		
		// page  mgmt
		$pagemgmt_class ='';
		$allPage_class ='';
		$addPage_class ='';
		$editPage_class ='';
		
		
		
		$messagemgmt_class = '';
		$allMessage_class = '';
		
		$allmailmgmt_class = '';
		$allemail_class  = '';
		
		$setting_class ='';
		$offerpartner_class ='';
		$needhelp_class ='';
		$propertylocater_class = '';
		$enquirycenters_class = '';
		
		if(strpos($current_url_here, '/dashboard') !== false){
		  	$dashboard_class = $active_class;			
		}
		
		elseif(strpos($current_url_here, '/addGroup') !== false){
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
		}
		
		elseif(strpos($current_url_here, '/allEmailTemplate') !== false){
		  	$allEmailTemplate_class = $active_class;
			$emailtempmgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/addEmailTemplate') !== false){
		  	$addEmailTemplate_class = $active_class;
			$emailtempmgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/editEmailTemplate') !== false){
		  	$editEmailTemplate_class = $active_class;
			$emailtempmgmt_class =  $active_class .' '. $menu_open; 
		}
		
		elseif(strpos($current_url_here, '/adminSetting') !== false){
		  	$setting_class = $active_class;			
		}
		
		elseif(strpos($current_url_here, '/allPage') !== false){
		  	$allPage_class = $active_class;
			$pagemgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/addPage') !== false){
		  	$addPage_class = $active_class;
			$pagemgmt_class =  $active_class .' '. $menu_open; 
		}elseif(strpos($current_url_here, '/editPage') !== false){
		  	$editPage_class = $active_class;
			$pagemgmt_class =  $active_class .' '. $menu_open; 
		}
		
		// mass email 
		elseif(strpos($current_url_here, '/sendmail') !== false){
		  	$allemail_class = $active_class;
			$allmailmgmt_class =  $active_class .' '. $menu_open; 
		}
	  



?>

<aside> 
  
  <!-- SIDEBAR PROFILE -->
 
  <div id="sidebar-profile">
    <div id="main-avatar"> <!--<span class="indicator">38</span> -->
    <?php $profile_image = $this->Session->read('UserAuth.User.profile_image');  if(!empty($profile_image)){ ?>
     <img src="<?php echo $this->webroot.'user/150x150_'.$this->Session->read('UserAuth.User.profile_image');?>" alt="" />
     <?php } else { ?>
      <img src="<?php echo Helper::webroot(''); ?>img/avatar.jpg" alt=""/>
     
     <?php } ?>
    </div>
    <div id="profile-info">
      <div> <a href="<?php echo $this->Html->url("/admin/myprofile", true); ?>"><b><?php echo $this->Session->read('UserAuth.User.name'); ?></b></a> <a href="<?php echo $this->Html->url("/admin/editUser/".$this->UserAuth->getUserId(), true); ?>">Profile settings</a> <a href=<?php echo $this->Html->url("/admin/logout", true); ?>>Logout</a> </div>
    </div>
  </div>
  
  <!-- MAIN MENU -->
  
  <nav id="main-menu">
    <ul>
    
    <?php if($userdashboard){ ?>
      <li class="<?php echo $dashboard_class; ?>"><a href="<?php echo $this->Html->url('/admin/dashboard', true); ?>"><span class="home-16 plix-16"></span> Dashboard</a></li>
      <?php } ?>
      
   <!-- ***************************************** User Management Section *************************************************************-->
      <?php
	 
	  
	   if($addGroup || $allGroup || $addUser || $allUser || $userGroupPermission || $changePasswordPermission || $editUserPermission || $myprofilePermission)
		{ ?>
      <li class="<?php echo $usermgmt_class; ?>"><a href="javascript:void(0);"><span class="controls-16 plix-16"></span> 
	  <?php if($userGroupId=='1') { ?>User Management <?php }else{ echo "My Profile"; } ?><span class="button-icon"><span class="<?php if($usermgmt_class === ''){ echo ' plus-10 ';}else{echo ' min-10 ';}?> plix-10"></span></span></a>
        <ul>
        <?php /*if($addGroup) {?>
          <li class="<?php echo $addGroup_class; ?>" ><a href="<?php echo $this->Html->url('/admin/addGroup', true); ?>"><?php echo __("Add Group");?></a></li>
         <?php } ?>
         <?php if($allGroup) {?>
          <li class="<?php echo $allGroups_class; ?>" ><a href="<?php echo $this->Html->url('/admin/allGroups', true); ?>"><?php echo __("All Groups");?></a></li>
          <?php } ?>
         
          <?php if($addUser) {?><li class="<?php echo $addUser_class; ?>"><a href="<?php echo $this->Html->url('/admin/addUser', true); ?>"><?php echo __("Add User");?></a></li>
           <?php } */ ?>
          
          <?php if($allUser) {?>
          <li class="<?php echo $allUsers_class; ?>"><a href="<?php echo $this->Html->url('/admin/allUsers', true); ?>"><?php echo __("All Users");?></a></li>
          <?php } ?>
         
         <?php /* if($userGroupPermission) {?>
          <li class="<?php echo $permissions_class; ?>"><a href="<?php echo $this->Html->url('/admin/permissions', true); ?>"><?php echo __("Permissions");?></a></li>
          <?php } */ ?>
		 
		 <?php if($changePasswordPermission) {?>
          <li class="<?php echo $changePassword_class; ?>"><a href="<?php echo $this->Html->url("/admin/changePassword", true); ?>"><?php echo __("Change Password");?></a></li>
           <?php } ?>
           
          <?php if($editUserPermission) {?>
          <li class="<?php echo $editUser_class; ?>"><a href="<?php echo $this->Html->url("/admin/editUser/".$this->UserAuth->getUserId(), true); ?>"><?php echo __("Edit Profile");?></a></li>
         <?php } ?>
         <?php if($myprofilePermission) {?>
          <li class="<?php echo $myprofile_class; ?>"><a href="<?php echo $this->Html->url("/admin/myprofile", true); ?>"><?php echo __("My Profile");?></a></li>
           <?php } ?>
        </ul>
      </li>
      <?php } ?>
   
     
        <!-- ***************************************** Page Manager *************************************************************-->
          
          <?php   if($allPage || $addPage || $editPage)	{   ?>
           <li class="<?php echo $pagemgmt_class; ?>"><a href="javascript:void(0);"><span class="controls-16 plix-16"></span>Page Manager<span class="button-icon"><span class="<?php if($pagemgmt_class === ''){ echo ' plus-10 ';}else{echo ' min-10 ';}?> plix-10"></span></span></a>
        <ul>
        	 <?php   if($allPage)	{  ?>
           <li class="<?php echo $allPage_class; ?>"><a href="<?php echo $this->Html->url('/staticPages/allPage', true); ?>"><?php echo __("All Page");?></a></li>
           <?php } ?>
            <?php   if($addPage)	{  ?>
            <li class="<?php echo $addPage_class; ?>" ><a href="<?php echo $this->Html->url('/staticPages/addPage', true); ?>"><?php echo __("Add Page");?></a></li>
           <?php } ?>
        </ul>
      </li>  
       <?php  }  ?>
          
       
          <!-- ***************************************** Email Template Manager *************************************************************-->
       <?php 
	  if($allEmailTemplate || $addEmailTemplate)
		{
	  ?>
      <li class="<?php echo $emailtempmgmt_class; ?>"><a href="javascript:void(0);"><span class="mail-16 plix-16"></span>Email Template Manager<span class="button-icon"><span class="<?php if($emailtempmgmt_class === ''){ echo ' plus-10 ';}else{echo ' min-10 ';}?> plix-10"></span></span></a>
        <ul>
             <?php   if($allEmailTemplate)
				{  ?>
            <li class="<?php echo $allEmailTemplate_class; ?>"><a href="<?php echo $this->Html->url('/EmailTemplates/allEmailTemplate', true); ?>"><?php echo __("All Email Template");?></a></li>
            <?php } ?>
             <?php   if($addEmailTemplate)
				{  ?>
            <li class="<?php echo $addEmailTemplate_class; ?>" ><a href="<?php echo $this->Html->url('/EmailTemplates/addEmailTemplate', true); ?>"><?php echo __("Add Email Template");?></a></li>
            <?php } ?>
        </ul>
      </li>   
        <?php
	  }
	   ?> 
      
      
         <!-- ***************************************** Mass Email  Manager *************************************************************-->
  <?php   if($allEmail){  ?>
      <li class="<?php echo $allmailmgmt_class; ?>"><a href="javascript:void(0);"><span class="mail-16 plix-16"></span>Mass Email Manager<span class="button-icon"><span class="<?php if($allmailmgmt_class === ''){ echo ' plus-10 ';}else{echo ' min-10 ';}?> plix-10"></span></span></a>
        <ul>
        	 
				
            <li class="<?php echo $allemail_class; ?>"><a href="<?php echo $this->Html->url('/MassEmails/sendmail', true); ?>"><?php echo __("Mass Email");?></a></li>
         
            
           
            
            
        </ul>
      </li> 
         <?php } ?>
    
     
       <!-- ***************************************** admin setting *************************************************************-->
       
       <?php 
			  if($adminSetting)
				{
			  ?>
         <li class="<?php echo $setting_class; ?>"><a href="<?php echo $this->Html->url('/Settings/adminSetting', true); ?>"><span class="settings-16 plix-16"></span> Settings</a></li>
          <?php } ?> 
       
<!--      <li class="no-mobile"><a href="#"><span class="note-16 plix-16"></span> Documentation</a>
        <ul>
          <li><a href="doc-accordion.html">Accordion</a></li>
          <li><a href="doc-breadcrumbs.html">Breadcrumbs</a></li>
          <li><a href="doc-buttons.html">Buttons</a></li>
          <li><a href="doc-calendar.html">Calendar</a></li>
          <li><a href="doc-charts.html">Charts</a></li>
          <li><a href="doc-dialogs.html">Dialogs</a></li>
          <li><a href="doc-editors.html">Editors</a></li>
          <li><a href="doc-extra.html">Extra</a></li>
          <li><a href="doc-fileexplore.html">File Explore</a></li>
          <li><a href="doc-forms.html">Forms</a></li>
          <li><a href="doc-grid.html">Grid</a></li>
          <li><a href="doc-icons.html">Icons</a></li>
          <li><a href="doc-listsblocks.html">Lists &amp; Blocks</a></li>
          <li><a href="doc-media.html">Media</a></li>
          <li><a href="doc-menus.html">Menus</a></li>
          <li><a href="doc-misc.html">Misc</a></li>
          <li><a href="doc-search.html">Search</a></li>
          <li><a href="doc-tables.html">Tables</a></li>
          <li><a href="doc-tabs.html">Tabs</a></li>
          <li><a href="doc-toolbars.html">Toolbars</a></li>
          <li><a href="doc-widgets.html">Widgets</a></li>
        </ul>
      </li>-->
      
      
      
    </ul>
  </nav>
</aside>

<!-- sidebar meta stats -->
<!--<div id="sidebar-meta">
  <div id="sidebar-meta-inner">
    <div>
      <p class="left">Space</p>
      <p class="right">4,551 MB / 10 GB</p>
    </div>
    <div class="pbar"> <span style="width:50%"></span> </div>
    <div>
      <p class="left">Traffic</p>
      <p class="right">8,001 MB / 10 GB</p>
    </div>
    <div class="pbar"> <span style="width:81%"></span> </div>
  </div>
</div>
-->
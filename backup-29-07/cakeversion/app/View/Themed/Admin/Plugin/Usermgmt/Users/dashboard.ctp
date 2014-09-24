<div class="page-header">
                                <h2>Dashboard</h2>
                                <?php //$settingRecord = $common->getAdminSetting(); 
				//echo $settingRecord['Setting']['title'];
				 ?>
                                
     <br><br><br>                            
	<h3>Welcome! <strong><?php echo $this->Session->read('UserAuth.User.twit_name');?></strong> </h3>
                                
                                <!--<span class="page-helper">1.0</span>
                                 <a href="#" class="page-helper">Documentation</a>-->
                                <!-- <a href="javascript:void(0);" class="page-helper empty-local-storage">Clear storage</a>
                                <p>Welcome to the  .</p>-->
</div>

<?php if(false){ ?>
<div class="umtop">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->element('dashboard'); ?>
	<div class="um_box_up"></div>
	<div class="um_box_mid">
		<div class="um_box_mid_content">
			<div class="um_box_mid_content_top">
				<span class="umstyle1"><?php echo __('Dashboard'); ?></span>
				<span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Home",true),"/admin/") ?></span>
				<div style="clear:both"></div>
			</div>
			<div class="umhr"></div>
			<div class="um_box_mid_content_mid">
				<div class="um_box_mid_content_mid_left">
					Hello <?php echo h($user['User']['first_name']).' '.h($user['User']['last_name']); ?>
					<br/><br/>
			<?php   if ($this->UserAuth->getGroupName()=='Admin') { ?>
						<span  class="umstyle6"><?php echo $this->Html->link(__("Add User",true),"/admin/addUser") ?></span><br/><br/>
						<span  class="umstyle6"><?php echo $this->Html->link(__("All Users",true),"/admin/allUsers") ?></span><br/><br/>
						<span  class="umstyle6"><?php echo $this->Html->link(__("Add Group",true),"/admin/addGroup") ?></span><br/><br/>
						<span  class="umstyle6"><?php echo $this->Html->link(__("All Groups",true),"/admin/allGroups") ?></span><br/><br/>
						<span  class="umstyle6"><?php echo $this->Html->link(__("Permissions",true),"/admin/permissions") ?></span><br/><br/>
						<span  class="umstyle6"><?php echo $this->Html->link(__("Profile",true),"/admin/viewUser/".$this->UserAuth->getUserId()) ?></span><br/><br/>
						<span  class="umstyle6"><?php echo $this->Html->link(__("Edit Profile",true),"/admin/editUser/".$this->UserAuth->getUserId()) ?></span><br/><br/>
			<?php   } ?>
						<span  class="umstyle6"><?php echo $this->Html->link(__("Change Password",true),"/admin/changePassword") ?></span><br/><br/>
						<span  class="umstyle6"><?php echo $this->Html->link(__("Profile",true),"/admin/myprofile") ?></span><br/><br/>
				</div>
				<div class="um_box_mid_content_mid_right" align="right"></div>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
	<div class="um_box_down"></div>
</div>
<?php } ?>
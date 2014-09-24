<?php  $this->start('footer_js'); ?>
     <?php 
		 //echo $this->fetch('content');
		 $this->Paginator->_jsHelperClass = "Js";
	     $this->Paginator->Js = $this->Js;
		 $this->Paginator->options(array(
		'update' => '#pagingcontent',
		'evalScripts' => true,
		'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
		'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),
		));						 
		 echo $this->Paginator->numbers();	?> 
         
          <script type="text/javascript">
$(document).ready(function(){
			
			
				$("#user_group_id").change(function(){
					
					var user_group_id =$("#user_group_id").val();
					//alert(email_template_id); return false;
					//$('#project_image_category_id').html(''); 	
        			$.ajax({
					  type: "POST",
					  url: "<?php echo $this->webroot; ?>admin/exportAll",
					  data: { user_group_id: user_group_id },
					  success: function(data) {
						 	
							   
                            }
						})
 				   });
				
				});
				
		</script>
         
 		<?php echo  $this->end(); ?>
         
<div class="powerwidget" id="widget3">
                                    <header>
                                    	<h2><?php echo $tableName;  ?></h2>    
                        
                            <div style="width:200px;position:absolute;right:100px;top:10px">
                                        	<?php echo $this->Html->link('Export Users', array('controller'=>'Users','action'=>'exportAll'),array('class'=>'button-text-icon','style'=>'float:right')); ?> 
                                        </div>                 
                                 <!--           <div style="width:200px;position:absolute;right:100px;top:10px">
                                      
                                       <?php echo $this->Form->input("user_group_id" ,array('type' => 'select','options'=>$usergroups,'empty'=>'Select User Type' ,'label' => false,'div' => false,'id'=>'user_group_id','data-validation-type'=>'present' ))?>      
                                        </div> -->
                                                                      
                                    </header>
                                 
                                  
                                  
                                    <div> 
              <?php
						$this->Grid->addColumn('User Id', '/User/id', array('paginate'=>true),'id');			
						$this->Grid->addColumn('Twitter Name', '/User/twit_name', array('paginate'=>true),'twitter_name');												
						$this->Grid->addColumn('Email', '/User/email', array('paginate'=>true),'email');
                        $this->Grid->addColumn('Group', '/User/user_group_id', array('paginate'=>true),'user_group_id');
				//		$this->Grid->addColumn('Email Verified', '/User/email_verified', array('paginate'=>true),'email_verified');
				//		$this->Grid->addColumn('Status', '/User/active', array('paginate'=>true),'active');
				//		$this->Grid->addColumn('Created', '/User/created', array('paginate'=>true),'created');
						
						
						
                   
						$this->Grid->addAction('<span class="note-16 plix-16"></span>', array('plugin' => 'usermgmt','controller' => 'Users', 'action' => 'viewUser'), array('/User/id'),array('class'=>'button-icon tip-s ajax','title'=>'View user','escape'=>false));
						
						$this->Grid->addAction('<span class="pencil-10 plix-10"></span>', array('plugin' => 'usermgmt','controller' => 'Users', 'action' => 'editUser'), array('/User/id'),array('class'=>'button-icon tip-s','title'=>'Edit user','escape'=>false));
						
						//$this->Grid->addAction('<span class="lock-10 plix-10"></span>', array('plugin' => 'usermgmt','controller' => 'Users', 'action' => 'changeUserPassword'), array('/User/id'),array('class'=>'button-icon tip-s','title'=>'Change user password','escape'=>false));
						
						//$this->Grid->addAction('<span class="mail-10 plix-10"></span>', array('plugin' => 'usermgmt','controller' => 'Users', 'action' => 'verifyEmail'), array('/User/id'),array('class'=>'button-icon tip-s','title'=>'Verify Email','escape'=>false));
						
			
						$this->Grid->addAction('<span class="trashcan-10 plix-10"></span>', array('plugin' => 'usermgmt','controller' => 'Users', 'action' => 'deleteUser'), array('/User/id'),array('class'=>'button-icon tip-s','title'=>'Delete user','escape'=>false,'confirm' => __('Are you sure you want to delete this user? Delete it your own risk')));
						
						echo $this->Grid->generate($users);
				?>
				</div></div>
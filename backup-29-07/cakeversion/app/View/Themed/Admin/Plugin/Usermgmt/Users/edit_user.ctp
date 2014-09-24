<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<div id="powerwidgetspanel" class="powerwidgetspanel">
                                <header>
                                    <h2>Power widgets panel</h2>
                                </header>
 <div class="powerwidgetspanel-widget" data-widget-id="widget1">
                                    <input type="checkbox"/>
                                    <label>AJAX form with validation</label>
                                </div>
                                </div>
                                <br/>
                                <section class="g_1">

                                <!-- New widget -->
                                
                                 <div class="powerwidget" id="widget1">
                                    <header>
                                    	<h2><?php echo $tableName; ?></h2>                                  
                                    </header>
                                    <div> 
                                        <div class="inner-spacer">  
                                       	<?php // echo $this->Form->create('User', array('action' => 'addUser'),array('id'=>'form-validation')); ?>
                                       	<?php echo $this->Form->create('User', array('id'=>'form-validation','enctype' => 'multipart/form-data' )); ?>
                                        <?php echo $this->Form->input("id" ,array('type' => 'hidden', 'label' => false,'div' => false))?>
										<?php   if (count($userGroups) >2) { ?>
                                           <?php echo $this->Session->flash(); ?>
                                                <fieldset>
                                                <legend contenteditable="true">Update your profile.</legend>
                                                <?php if($this->Session->read('UserAuth.User.user_group_id') == 1) {?>
                                                 <div class="g_1_4">
                                                        <label>Group:</label>
                                                    </div> 
                                                    <div class="g_3_4_last">
                                                     
                                       <?php echo $this->Form->input("user_group_id" ,array('type' => 'select', 'label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?>                 
                                                    </div>
													<?php   }   ?>
                                                    <div class="spacer-20"><!-- spacer 20px --></div>
                                                  <?php } ?>
                                                    <div class="g_1_4">
                                                        <label for="af-present">Twitter Name:</label> 
                                                    </div>
                                                    <div class="g_3_4_last">
                                       <?php echo $this->Form->input("twit_name" ,array('label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?>
                                                        
                                                    </div>
                                                    <div class="spacer-20"><!-- spacer 20px --></div>
                                                    
                                                                                                     
                                                    <div class="g_1_4">
                                                        <label for="af-present">Name:</label> 
                                                    </div>
                                                    <div class="g_3_4_last">
                                       <?php echo $this->Form->input("name" ,array('label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?>
                                                        
                                                    </div>
                                                    <div class="spacer-20"><!-- spacer 20px --></div>
                                                    
                                                     <div class="g_1_4">
                                                        <label for="af-present">Email:</label> 
                                                    </div>
                                                    <div class="g_3_4_last">
                                       <?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'id'=>'af-email','data-validation-type'=>'email','data-validation-label'=>'This email is not valid!' ))?>
                                                        
                                                    </div>
                                                    <div class="spacer-20"><!-- spacer 20px --></div>
                                               
                                                   <?php /*  <div class="g_1_4">
                                                        <label for="af-present">Password:</label> 
                                                    </div>
                                                    <div class="g_3_4_last">
                                       <?php echo $this->Form->input("password" ,array('label' => false,'div' => false,'id'=>'af-password1','data-validation-type'=>'password','data-validation-label'=>'The passwords dont match!'))?>
                                                        
                                                    </div>
                                                    <div class="spacer-20"><!-- spacer 20px --></div>
                                                    
                                                  <div class="g_1_4">
                                                        <label for="af-present">Confirm Password:</label> 
                                                    </div>
                                                    <div class="g_3_4_last">
                                       <?php echo $this->Form->input("cpassword" ,array("type"=>"password",'label' => false,'div' => false,'id'=>'af-password2','data-validation-type'=>'password','data-validation-label'=>'The passwords dont match!' ))?>
                                                        
                                                    </div>
                                                    <div class="spacer-20"><!-- spacer 20px --></div>
                                                    
                                                     <div class="g_1_4">
                                                        <label for="af-present">Profile Image:</label> 
                                                    </div>
                                                    <div class="g_3_4_last">
                                       <?php echo $this->Form->input("profile_image" ,array("type"=>"file",'label' => false,'div' => false,'id'=>'af-file','data-validation-type'=>'file' ))?>
                                                        
                                                    </div>
                                                    <div class="spacer-20"><!-- spacer 20px --></div>    */?>
                                                  
                                                  
                                                                                            
                                                    <div class="g_1_4">
                                                        <label></label>
                                                    </div> 
                                                    <div class="g_3_4_last">
                                                    
                                                     
                                                        <input type="submit" value="Submit" class="button-text"/>
                                                    </div> 
                                                </fieldset>                                                                              
                                    	<?php echo $this->Form->end(); ?>
                                        </div>                                               
                                 	</div>
                                </div><!-- End .powerwidget -->

							</section>
                            
                            <div class="clear"><!-- New row --></div>
                            
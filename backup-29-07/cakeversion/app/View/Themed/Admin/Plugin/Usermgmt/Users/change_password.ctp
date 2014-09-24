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
                                    	<h2><?php echo __('Change Password'); ?></h2>                                  
                                    </header>
                                    <div> 
                                        <div class="inner-spacer">  
                                        <?php echo $this->Form->create('User', array('id'=>'form-validation')); ?>
                                           <?php echo $this->Session->flash(); ?>
                                                <fieldset>
                                                <legend contenteditable="true">Change password .</legend>
                                                   
                                                   <div class="g_1_4">
                                                        <label for="af-present">Old Password:</label> 
                                                    </div>
                                                    <div class="g_3_4_last">
                                       <?php echo $this->Form->input("oldpassword" ,array('label' => false,'div' => false,'id'=>'af-password','data-validation-type'=>'password','data-validation-label'=>'This field is required!'))?>
                                                        
                                                    </div>
                                                    
                                                    <div class="spacer-20"><!-- spacer 20px --></div>
                                                   
                                                   
                                                    <div class="g_1_4">
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
                                     <?php echo $this->Form->input("cpassword" ,array('type'=>'password','label' => false,'div' => false,'id'=>'af-password2','data-validation-type'=>'password','data-validation-label'=>'The passwords dont match!'))?>
                                                       
                                                    </div>
                                                    
                                                    
                                                   
                                                 <div class="spacer-20"><!-- spacer 20px --></div>                                           
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
                            
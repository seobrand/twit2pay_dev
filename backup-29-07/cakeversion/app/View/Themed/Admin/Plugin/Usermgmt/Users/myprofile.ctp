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
                                 
                                </div>
                                </div>
                                <br/>
                                <section class="g_1">

                                <!-- New widget -->
                                
                                 <div class="powerwidget" id="widget1">
                                    <header>
                                    	<h2><?php echo __('My Profile'); ?></h2>                                  
                                    </header>
                                    <div> 
                                        <div class="inner-spacer">  
                           
                                                <fieldset>
                                                <legend contenteditable="true">Register user detail.</legend>
                                                
                                                 <div class="g_1_4">
                                                        <label><?php echo __('User Id');?></label>
                                                    </div> 
                                                    <div class="g_3_4_last">
                                        <?php echo $user['User']['id']?>               
                                                    </div>
											
                                                    <div class="spacer-20"><!-- spacer 20px --></div>
                                                  
                                                    <div class="g_1_4">
                                                        <label for="af-present"><?php echo __('User Group');?>:</label> 
                                                    </div>
                                                    <div class="g_3_4_last">
                                       <?php echo h($user['UserGroup']['name'])?>
                                                        
                                                    </div>
                                                    <div class="spacer-20"><!-- spacer 20px --></div>
                                                    
                                                                                                     
                                                    <div class="g_1_4">
                                                        <label for="af-present"><?php echo __('Twitter Name');?></label> 
                                                    </div>
                                                    <div class="g_3_4_last">
                                      <?php echo h($user['User']['twit_name'])?>
                                                        
                                                    </div>
                                                    <div class="spacer-20"><!-- spacer 20px --></div>
                                                    
                                                    <div class="g_1_4">
                                                        <label for="af-present"><?php echo __('Name');?></label> 
                                                    </div>
                                                    <div class="g_3_4_last">
                                       <?php echo h($user['User']['name'])?>
                                                        
                                                    </div>
                                                    <div class="spacer-20"><!-- spacer 20px --></div>
                                                    
                                                   <div class="g_1_4">
                                                        <label for="af-present"><?php echo __('Email');?></label> 
                                                    </div>
                                                    <div class="g_3_4_last">
                                       <?php echo h($user['User']['email'])?>
                                                        
                                                    </div>
                                                    <div class="spacer-20"><!-- spacer 20px --></div>
                                                    
                                                  <div class="g_1_4">
                                                        <label for="af-present"><?php echo __('Email Verified');?></label> 
                                                    </div>
                                                    <div class="g_3_4_last">
                                       <?php
										if ($user['User']['email_verified']) {
											echo 'Yes';
										} else {
											echo 'No';
										}
									?>
                                                        
                                                    </div>
                                                    <div class="spacer-20"><!-- spacer 20px --></div>
                                                  
                                                  
                                                    <div class="g_1_4">
                                                        <label for="af-present"><?php echo __('Status');?></label> 
                                                    </div>
                                                    <div class="g_3_4_last">
												<?php	if ($user['User']['active']) {
                                                            echo 'Active';
                                                        } else {
                                                            echo 'Inactive';
                                                        }
                                                    ?>                                                                
                                                                    </div>
                                                    <div class="spacer-20"><!-- spacer 20px --></div>                              
                                                   
                                                     <div class="g_1_4">
                                                        <label for="af-present"><?php echo __('Created');?></label> 
                                                    </div>
                                                    <div class="g_3_4_last">
												<?php echo date('d-M-Y',strtotime($user['User']['created']))?>
                                                                            
                                                                                                                       </div>
                                                           <div class="spacer-20"><!-- spacer 20px --></div>   
                                                    
                                                                                            
                                                    <div class="g_1_4">
                                                        <label></label>
                                                    </div> 
                                                    <div class="g_3_4_last">
                                                    
                                           
                                                    </div> 
                                                </fieldset>                                                                              
                              
                                        </div>                                               
                                 	</div>
                                </div><!-- End .powerwidget -->

							</section>
                            
                            <div class="clear"><!-- New row --></div>
                            
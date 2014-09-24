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
                                    	<h2><?php echo __('Change Password for '); echo h($name); ?></h2>                                  
                                    </header>
                                    <div> 
                                        <div class="inner-spacer">  
                                        <?php echo $this->Form->create('User', array('id'=>'form-validation')); ?>
                                           <?php echo $this->Session->flash(); ?>
                                                <fieldset>
                                                <legend contenteditable="true">Change user password .</legend>
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
                            
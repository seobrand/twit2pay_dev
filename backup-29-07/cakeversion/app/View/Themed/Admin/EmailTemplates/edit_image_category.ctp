<br/>
<div style="padding:10px;">
<div id="add-user" title="Add a new category" >
                                              <?php echo $this->Form->create('ProjectImages',array('action'=>'editImageCategory','id'=>'form-validation'));
											  echo $this->form->hidden('id',array('value'=>$detailCategory['ProjectImageCategory']['id']));
											  ?>                                                  
                                                <div class="g_1_4">
                                                    <label for="f-firstname">Category:</label> 
                                                </div>
                                                <div class="g_3_4_last">
                                                    
                                                     <? echo $this->form->input('name',array('label'=>false,'div'=>false,'id'=>'af-present','data-validation-type'=>'present','value'=>$detailCategory['ProjectImageCategory']['name'])); ?>
                                                </div>
                                                
                                                <div class="spacer-10"><!-- spacer 10px --></div>
                                                
                                                <div class="g_1_4">
                                                    <label for="f-firstname">Patent:</label> 
                                                </div>
                                                <div class="g_3_4_last">
                                                    
                                                  <?php echo $this->Form->input("parent_id" ,array('type' => 'select','options'=>$mainCategory,'empty'=>'--Select Parent Category --','label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present','selected'=>$detailCategory['ProjectImageCategory']['parent_id'] ))?>    
                                                </div>
                                                
                                                <div class="spacer-10"><!-- spacer 10px --></div>

                                              <!--  <div class="g_1_4">
                                                    <label for="f-lastname">Order:</label> 
                                                </div>
                                                <div class="g_3_4_last">
                                                    <? echo $this->form->input('order',array('label'=>false,'div'=>false,'id'=>'af-present','data-validation-type'=>'present','value'=>$detailCategory['ProjectImageCategory']['order'])); ?>
                                                </div>-->
                                                
                                               
                                                
                                                <div class="spacer-10"><!-- spacer 10px --></div>
                                                
                                                <div class="g_1">  
                                                    <input type="submit" value="Submit" class="button-text"/>
                                              <?php  ?>      
                                                </div>	                                                                                                        
                                            <?php 
        
											echo $this->form->end();
										   ?>                                                    
                                        </div>
                                        </div>
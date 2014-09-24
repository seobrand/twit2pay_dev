

<?php  $this->start('footer_js'); ?>
<script type="text/javascript">
$(document).ready(function(){
				$(".ajax").colorbox({width:'500px', height:'250px'});
			});
	
function validatefrm()
{
$category_name =	$.trim($('#cat_name').val());
if($category_name=='')
{
	alert("Please Enter category name.");
	return false;	
}
	
}			
			
</script>
       
			   
<?php echo $this->end(); ?>		
  
       <!--****************************Table element *******************************************-->                         
        <!-- New widget -->
<br />                                
                                 <div class="powerwidget" id="widget3">
                                    <header>
                                    	<h2>Project Image Category</h2>                                  
                                    </header>
                                    <div>         
                                                                                                    
                                        <table class="clean-table" id="clean-table">
                                            <thead>
                                    		
                                                <tr>
                                                    <th scope="col">Category Name</th>
                                                    <th scope="col">Parent Category</th>
                                                     <th scope="col"><a href="javascript:void(0);" class="button-text-icon" id="open-add-user">Add <span class="plus-10 plix-10"></span></a></th> 
                                                </tr>
                                         
                                            </thead>
                                            <tbody>
                                            
                                                <!-- new row -->
                                           <?php if($total > 0) { foreach($categoryLists as $categoryList) { ?>     
                                                <tr>
                                                    <td><?php echo $categoryList['ProjectImageCategory']['name']; ?></td>
                                                    <td><?php  if($common->imageCategoryName($categoryList['ProjectImageCategory']['parent_id'])) echo 'Sub Category of <strong>'.$common->imageCategoryName($categoryList['ProjectImageCategory']['parent_id']).'</strong>'; else echo "Main Category"; ?></td>
                                                     <td>
                                                        <div class="right">
                                                            
                                                         <?php echo $this->Html->link('<span class="pencil-10 plix-10"></span>', array('controller'=>'ProjectImages','action'=>'editImageCategory/'.$categoryList['ProjectImageCategory']['id']),array('class'=>'button-icon tip-s ajax','title'=>'Edit category','escape'=>false)); ?> 
                                                         
                                                         
                                                        <?php echo $this->Html->link('<span class="trashcan-10 plix-10"></span>', array('controller'=>'ProjectImages','action'=>'deleteCategory/'.$categoryList['ProjectImageCategory']['id']),array('class'=>'button-icon tip-s','title'=>'Delete category','escape'=>false,'confirm' => __('Are you sure you want to delete this category? Delete it your own risk'))); ?>
                                                        </div>
                                                    </td>
                                                </tr>  
                                                <?php } } else { ?>
                                                
                                                <tr   ><td colspan="5"> No project image category </td> </tr>
                                                <?php } ?>         
                                              
                                            </tbody>
                                            <tfoot>
                                            	<tr>
                                                	<td colspan="5">
                                                        <div class="left"></div>
                                                        <div class="right"><?php echo $total;  ?> categories in the database</div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table> 
                                        
                                        <!-- dialog used for the add user button --> 

                                        <div id="add-user" title="Add a new image category" style="display:none">
                                              <?php echo $this->Form->create('ProjectImage',array('action'=>'addCategory','id'=>'form-validation','onsubmit'=>'return validatefrm()'));?>                                                  
                                                <div class="g_1_4">
                                                    <label for="f-firstname">Category:</label> 
                                                </div>
                                                <div class="g_3_4_last">
                                                    
                                                     <? echo $this->form->input('name',array('label'=>false,'div'=>false,'id'=>'cat_name','data-validation-type'=>'present')); ?>
                                                </div>
                                                
                                                <div class="spacer-10"><!-- spacer 10px --></div>
                                                
                                                <div class="g_1_4">
                                                    <label for="f-firstname">Patent:</label> 
                                                </div>
                                                <div class="g_3_4_last">
                                                    
                                                  <?php echo $this->Form->input("parent_id" ,array('type' => 'select','options'=>$mainCategory,'empty'=>'--Select Parent Category --','label' => false,'div' => false,'id'=>'af-present','data-validation-type'=>'present' ))?>    
                                                </div>
                                                
                                                <div class="spacer-10"><!-- spacer 10px --></div>

                                             <!--     <div class="g_1_4">
                                                    <label for="f-lastname">Order:</label> 
                                                </div>
                                              <div class="g_3_4_last">
                                                    <? echo $this->form->input('order',array('label'=>false,'div'=>false,'id'=>'af-present','data-validation-type'=>'present')); ?>
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
                                </div><!-- End .powerwidget --> 
       
        
           
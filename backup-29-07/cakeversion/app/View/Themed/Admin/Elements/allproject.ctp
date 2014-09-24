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
			   
		<?php echo  $this->end(); ?>
           <div class="powerwidget" id="widget3">
                                    <header>
                                    	<h2>Project Listing</h2>                                  
                                    </header>
                                    <div>         
                                                                                                    
                                        <table class="clean-table" id="clean-table">
                                            <thead>
                                    		
                                                <tr>
                                                    <th scope="col">Project Name</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Sub Category</th>
                                                      <th scope="col">Action</th> 
                                                </tr>
                                         
                                            </thead>
                                            <tbody>
                                            
                                                <!-- new row -->
                                           <?php foreach($projectLists as $projectList) { ?>     
                                                <tr>
                                                    <td><?php echo $projectList['Project']['name']; ?></td>
                                                    <td><?php echo $common->mainCategory($projectList['Project']['project_category_id']); ?></td>
                                                    <td><?php  echo $common->subCategory($projectList['Project']['project_category_id']); ?></td>
                                                 
                                                   <td>
                                                        <div class="left">
                                                            
                                                         <?php echo $this->Html->link('<span class="pencil-10 plix-10"></span>', array('controller'=>'Projects','action'=>'editProject/'.$projectList['Project']['id']),array('class'=>'button-icon tip-s ajax','title'=>'Edit project','escape'=>false)); ?> 
                                                         
                                                         
                                                        <?php echo $this->Html->link('<span class="trashcan-10 plix-10"></span>', array('controller'=>'Projects','action'=>'deleteProject/'.$projectList['Project']['id']),array('class'=>'button-icon tip-s','title'=>'Delete project','escape'=>false,'confirm' => __('Are you sure you want to delete this project? Delete it your own risk'))); ?>
                                                        </div>
                                                    </td>
                                                </tr>  
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

                                                                                    
                                	</div>
                                </div><!-- End .powerwidget --> 
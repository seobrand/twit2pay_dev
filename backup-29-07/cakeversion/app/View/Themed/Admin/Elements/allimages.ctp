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
                                    	<h2><?php echo $tableName;  ?></h2>                                  
                                    </header>
                                 
                                  
                                  
                                    <div> 
              <?php
						$this->Grid->addColumn('Image Name', '/ProjectImage/name', array('paginate'=>true),'name');			
						$this->Grid->addColumn('Image', '/ProjectImage/project_image', array('paginate'=>true),'project_image');												
						$this->Grid->addColumn('Project', '/ProjectImage/project_id', array('paginate'=>true),'project_id');
                        $this->Grid->addColumn('Sub Category', '/ProjectImage/project_image_category_id', array('paginate'=>true),'project_image_category_id');
					
						$this->Grid->addAction('<span class="pencil-10 plix-10"></span>', array('controller' => 'ProjectImages', 'action' => 'editProjectImage'), array('/ProjectImage/id'),array('class'=>'button-icon tip-s ajax','title'=>'Edit Project Image','escape'=>false));
						
						$this->Grid->addAction('<span class="trashcan-10 plix-10"></span>', array('controller' => 'ProjectImages', 'action' => 'deleteProjectImage'), array('/ProjectImage/id'),array('class'=>'button-icon tip-s','title'=>'Delete Poject Image','escape'=>false));
						echo $this->Grid->generate($projectImageLists);
				?>
				</div></div>
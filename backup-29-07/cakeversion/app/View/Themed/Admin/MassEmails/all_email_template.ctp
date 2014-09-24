<script type="text/javascript">
$(document).ready(function(){
				$(".ajax").colorbox({width:'400px', height:'475px'});
			});
		</script>
  
       <!--****************************Table element *******************************************-->                         
        <!-- New widget -->
<br />                               
       
        
           <div class="powerwidget">
                                    <header>
                                    	<h2>All Email Templates</h2>                                  
                                    </header>
                                 
                                  
                                  
                                    <div> 
              <?php
						$this->Grid->addColumn('Template Name', '/EmailTemplate/template_name', array('paginate'=>true),'template_name');			
						$this->Grid->addColumn('Subject', '/EmailTemplate/subject', array('paginate'=>true),'subject');												
				//	  $this->Grid->addColumn('Category', '/EmailTemplate/email_category_id', array('paginate'=>true),'email_category_id');
					
						$this->Grid->addAction('Edit', array('controller' => 'EmailTemplates', 'action' => 'editEmailTemplate'), array('/EmailTemplate/id'));
						
						$this->Grid->addAction('Delete', array('controller' => 'EmailTemplates', 'action' => 'deleteEmailTemplate'), array('/EmailTemplate/id'));
						echo $this->Grid->generate($emailTemplateLists);
				?>
				</div></div>
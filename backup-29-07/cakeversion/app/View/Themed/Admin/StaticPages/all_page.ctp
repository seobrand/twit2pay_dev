<script type="text/javascript">
$(document).ready(function(){
				$(".ajax").colorbox({width:'400px', height:'475px'});
			});
		</script>
        
        
<br/>
<div class="powerwidget" id="widget3">
  <header>
    <h2>Page List</h2>
  </header>
  <!--****************************search box*******************************************-->
 <!--       <div class="powerwidgetspanel" id="powerwidgetspanel" style="display:block;" >
        <header>
        <h2>Search record by fields</h2>
        </header>
        <div style="min-width:700px;float:left;border:0px;background-color:#DDDDDD">
        
         <?php echo $this->Form->create('News',array('type'=>'get'));  ?>
         
         <div class="g_1_4">
       
        <? echo $this->form->input('News.title',array('label'=>false,'type'=>'text','div'=>false,'placeholder'=>'Enter Title')); ?>
        
        </div> <div class="g_1_4" >
        <?php 
      	  echo $this->Form->submit('Submit',array('style'=>'float:left!important;'));
      	?>
       </div>
       <?php
	     echo $this->Form->end();
	   ?>
       </div>
   		    <?php echo $this->Html->link('Add', array('controller'=>'News','action'=>'addNews'),array('class'=>'button-text-icon','style'=>'float:right')); ?> 
       <br/>
       </div> 
       -->
 <div id="pagingcontent" >
    <?php
		$this->Grid->addColumn('Page ID', '/StaticPage/id',array('paginate'=>true),'id');	
		$this->Grid->addColumn('Page Title', '/StaticPage/page_title',array('paginate'=>true),'page_title');	
		$this->Grid->addColumn('Status', '/StaticPage/active',array('paginate'=>true),'active');	
		$this->Grid->addAction('Edit', array('controller' => 'StaticPages', 'action' => 'editPage'), array('/StaticPage/id'));
//		$this->Grid->addAction('Delete', array('controller' => 'StaticPages', 'action' => 'deletePage'), array('/StaticPage/id'));
		echo $this->Grid->generate($pageList);
	?>   
  </div>
</div>
<!-- End .powerwidget -->

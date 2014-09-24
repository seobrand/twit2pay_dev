<!--start middle-->
<section class="middle">
  <div class="content">
    <div class="content_inner">
     <div class="sidebar_title">
            <p class="fontsize32">About Us</p>
          </div>
		<!--left section start-->
        
    	 <aside class="sidebar_left">
  <div class="sidebar_topnav">
    <div class="sidarbar_nav">
      <ul>

       <?php  if($this->params['controller']=='StaticPages' or $this->params['action']=='offerPartnership') {   ?>
<!--               <li><a href="the-company.php" class="active_nav">The Company</a></li>-->
                <li><?php echo $this->Html->link('The Company',array('controller'=>'StaticPages','action'=>'detail/1')) ?></li>
                <li><?php echo $this->Html->link('Vision & Mission',array('controller'=>'StaticPages','action'=>'detail/2')) ?></li>
                <li><?php echo $this->Html->link('Milestones',array('controller'=>'StaticPages','action'=>'detail/3')) ?></li>
                <li><?php echo $this->Html->link('CMD\'s Profile',array('controller'=>'StaticPages','action'=>'detail/4')) ?></li>
                <li><?php echo $this->Html->link('Team @ Mahima',array('controller'=>'StaticPages','action'=>'detail/5')) ?></li>
                <li><?php echo $this->Html->link('Maintenance Company',array('controller'=>'StaticPages','action'=>'detail/6')) ?></li>
                <li><?php echo $this->Html->link('Corporate Social Resp.',array('controller'=>'StaticPages','action'=>'detail/7')) ?></li>
        <?php } else{  ?>
        
      <?php $projectCats = $common->getProjectCategory(); 
		  foreach($projectCats as $projectCat)
		  {
		  ?>
            <li><?php echo $this->Html->link(ucfirst($projectCat['ProjectCategory']['name']),array('controller'=>'projects','action'=>'projectType',$projectCat['ProjectCategory']['id'],$projectCat['ProjectCategory']['name']),array('escape'=>false)); ?></li>
          
           <?php } ?>
        <?php } ?>
      </ul>
    </div>
  </div>
   <?php echo $this->element('three_panal'); ?>
           
   <?php echo $this->element('left_latestlunch'); ?>     
        
        
</aside>
     	
        <!--left section end-->
                
      <div class="container_right">
        <div class="contant_title">
          <p class="fontsize20"><?php  echo $pageDatail['StaticPage']['page_title'];  ?></p>
        </div>
        <div class="content_right_inner">
        
      <?php  echo $pageDatail['StaticPage']['description'];  ?>
        
        </div>
      </div>
    </div>
  </div>
</section>
<!--end middle-->
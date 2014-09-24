<!--start Project Sitemap-->
<section class="project_sitemap">
  <div class="project_sitemap_inner">
  <!-- <img src="<?php echo Helper::webroot(''); ?>img/mahima-project-map.gif" alt="Mahima Project Sitemap" width="1052" height="258">
  -->
    <?php echo $this->element('google_map'); ?>
   </div>
</section>
<!--end Project Sitemap-->
<!--start middle-->
<section class="middle">
  <div class="content">
    <div class="content_inner">
      <div class="sidebar_title">
        <p class="fontsize32"><?php echo ucfirst($common->parentCategory($projectType)); ?> Projects</p>
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
        
        <div class="commercial_project_details">
        
        <?php
			
		 foreach($projectSubCats as $projectSubCat) {  ?>
          <div class="completed_project">
           <img src="<?php echo $this->webroot.'project/categoryimg/'.$projectSubCat['ProjectCategory']['image']; ?>" alt="Property" title="Property" width="650" height="136">
            <div class="completed_project_text">
              <p class="fonsize23"><?php echo $projectSubCat['ProjectCategory']['name'];  ?></p>
            </div>
            <div class="more_btn"><a href="<?php echo $this->Html->url(array( "controller" => "projects","action" => "projectall",$projectType,$projectSubCat['ProjectCategory']['id'],$projectSubCat['ProjectCategory']['name']));?>"><img src="<?php echo Helper::webroot(''); ?>img/more-btn.png" alt="More" title="More" width="89" height="26"></a></div>
          </div>
  		<?php }  ?>
        </div>
     
      </div>
    </div>
  </div>
</section>
<!--end middle-->
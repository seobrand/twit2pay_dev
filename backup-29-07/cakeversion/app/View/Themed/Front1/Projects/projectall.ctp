<!--start middle-->
<section class="middle">
  <div class="content">
    <div class="content_inner">
      <div class="sidebar_title">
        <p class="fontsize32"><?php echo ucfirst($common->parentCategory($projectCat)); ?> Projects</p>
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
          <p class="fontsize20"><?php echo $common->subCategory($projectSubCat); ?></p>
        </div>
        <div class="complate_project">
          <ul>
          <?php 
		  if(count($projectLists) > 0) {
		  foreach($projectLists as $projectList) {  ?>
            <li>
              <div class="com_project_title">
                <p class="fontsize16navy"><?php echo $projectList['Project']['name'];  ?></p>
              </div>
              <div class="com_project_pic">
              
              <?php if(!empty($projectList['Project']['name'])) { ?>
             <img src="<?php echo FULL_BASE_URL.router::url('/',false);?>thumbnail.php?file=project/project_<?php echo $projectList['Project']['id'].'/'.$projectList['Project']['project_image']; ?>&maxw=217&maxh=173"  alt="<?php echo $projectList['Project']['name'];  ?>" class="project_pic" title="<?php echo $projectList['Project']['name'];  ?>" >
            <?php }else{ ?>
            <img src="<?php echo FULL_BASE_URL.router::url('/',false);?>thumbnail.php?file=img/no-image.jpg&maxw=217&maxh=173" alt="Image Not Avaivable" title="Image Not Avaivable" >
          	<?php } ?>
              
              
              </div>
              <div class="view_details_btn">
              <a href="<?php echo $this->Html->url(array( "controller" => "projects","action" => "projectdetail",$projectList['Project']['id']));?>"><img src="<?php echo Helper::webroot(''); ?>img/view-details.gif" alt="View Details" title="View Details" width="103" height="28"></a></div>
            </li>
            <?php } } else { ?>
           <h1 style="font-size:24px;" > Coming Soon </h1>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!--end middle-->
<!--start middle-->

<script type="text/javascript">

function subscribeproject()
{
	var projectid =  <?php echo $projectDetail['Project']['id'];  ?>;
	if(projectid)
	{
	  $.ajax({
	  type: "POST",
	  url: "<?php echo $this->webroot; ?>homes/subscribe",
	  data: { projectid: projectid },
	  success: function(data) {
			if(data=='already')
				 alert('You are already subscribe this project.');
			if(data=='yes')
			  alert('Thank You for subscribe this project.'); 
			}
		})
	}
}


</script>

<section class="middle">
<div class="content">
<div class="content_inner">
<div class="sidebar_title">
  <p class="fontsize32">Residential Projects</p>
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
        <br/>
        <?php // pr($this->Session->read('UserAuth.User.user_group_id')); ?>
        <?php if($this->Session->read('UserAuth.User.user_group_id')=='27') { ?>
        <div class="">
              <a onclick="subscribeproject();"><img src="<?php echo Helper::webroot(''); ?>img/subscribe.jpg" alt="Subscribe Project" title="Subscribe Project" ></a></div>
        <?php } ?>
</aside>
     	
        <!--left section end-->

<div class="container_right">
<div class="contant_title">
  <p class="fontsize20"><?php echo $projectDetail['Project']['name'];  ?></p>
  <p class="back"><a href="javascript: history.go(-1)">&lt; Back</a></p>
</div>
<div class="complate_project_pic" align="center">


<?php if(!empty($projectDetail['Project']['name'])) { ?>
<img src="<?php echo FULL_BASE_URL.router::url('/',false);?>thumbnail.php?file=project/project_<?php echo $projectDetail['Project']['id'].'/'.$projectDetail['Project']['project_banner']; ?>&maxw=656&maxh=183"  alt="<?php echo $projectDetail['Project']['name'];  ?>"  title="<?php echo $projectDetail['Project']['name'];  ?>" >
<?php }else{ ?>
<img src="<?php echo FULL_BASE_URL.router::url('/',false);?>thumbnail.php?file=img/no-image.jpg&maxw=656&maxh=183" alt="Image Not Avaivable" title="Image Not Avaivable" >
<?php } ?>

</div>
<div class="project_details_tab_outer">
<div class="tabs_outer">
  <ul class="menu_tab">
    <li class="active"><a href="#overview">Overview</a></li>
    <li><a href="#specifivation">Specification</a></li>
    <li><a href="#amenities">Amenities</a></li>
    <li><a href="#location_map">Location map</a></li>
    <?php foreach($mainTabCate as $mainTabCate) {
		 ?>
    <li><a href="#<?php echo $mainTabCate['ProjectImageCategory']['parent_id'];  ?>"><?php echo $common->imageCategoryName($mainTabCate['ProjectImageCategory']['parent_id']);  ?></a></li>
    <?php  } ?>
  </ul>
</div>
<div class="tab_content" id="overview">
 <?php echo nl2br($projectDetail['Project']['description']);  ?>
</div>
<div class="tab_content" id="specifivation">
 <?php echo $projectDetail['Project']['specification'];  ?>
</div>
<div class="tab_content" id="amenities">
<?php echo $projectDetail['Project']['amenities'];   ?>
</div>

<!--******************* location map ********************************-->
<div class="tab_content" id="location_map">
  <p class="fontsize16navy">Location:</p>

   <div align="center">
  <?php if(file_exists('project/project_'.$projectDetail['Project']['id'].'/'.$projectDetail['Project']['location_map_image']) && !empty($projectDetail['Project']['location_map_image'])) { ?> 
<img src="<?php echo FULL_BASE_URL.router::url('/',false);?>thumbnail.php?file=project/project_<?php echo $projectDetail['Project']['id'].'/'.$projectDetail['Project']['location_map_image']; ?>&maxw=666"  alt="Location" title="Location"   >
<?php }else{ ?>
<img src="<?php echo FULL_BASE_URL.router::url('/',false);?>thumbnail.php?file=img/no-image.jpg&maxw=666&maxh=458" alt="Image Not Avaivable" title="Image Not Avaivable" >
<?php } ?>
   </div>
   
  </div>
  
 <!--******************* location map ********************************--> 
 

   
    <?php 

	foreach($mainTabCate2 as $mainTabCate) { 
		 ?>
   <div class="tab_content" id="<?php echo $mainTabCate['ProjectImageCategory']['parent_id'];  ?>">
<!--<p class="fontsize16navy">Floor Plan:</p>-->
<div class="inner_tab_outer">
  <ul class="inner_tab">
  <?php $sabTabs = $common->getProjectTab($mainTabCate['ProjectImageCategory']['parent_id'],$mainTabCate['ProjectImage']['project_id']);
  foreach($sabTabs as $sabTab) {
    ?>
    <li class="active"><a href="#<?php  echo $sabTab['ProjectImageCategory']['id']; ?>"><?php echo $common->imageCategoryName($sabTab['ProjectImageCategory']['id']);  ?></a></li>
  <?php } ?>
  </ul>
</div>

 <?php $sabTabs2 = $common->getProjectTab($mainTabCate['ProjectImageCategory']['parent_id'],$mainTabCate['ProjectImage']['project_id']);
  foreach($sabTabs2 as $sabTab) { ?>

<div class="inner_tab_content" id="<?php  echo $sabTab['ProjectImageCategory']['id']; ?>">
  <ul> 
  	<?php $projectImages = $projectDetail['ProjectImage']; 
	foreach ($projectImages as $projectImage) { 
		if($projectImage['project_image_category_id']==$sabTab['ProjectImageCategory']['id'] ){
	 ?>
    <li><a href="<?php echo $this->webroot.'project/project_'.$projectImage['project_id'].'/'.$projectImage['project_image']; ?>" class="plan_map" title="<?php echo $projectImage['name'];  ?>"><img src="<?php echo Helper::webroot(''); ?>img/1bhk-flat.png" alt="<?php echo $projectImage['name'];  ?>" width="26" height="26"><?php echo $projectImage['name'];  ?></a>
  
 </li>
	<?php
		}
	
	 } ?>
  </ul>
</div>

<?php } ?>

<!--
<div class="inner_tab_content" id="1">
  <ul> 
  	<?php $projectImages = $projectDetail['ProjectImage']; 
	foreach ($projectImages as $projectImage) { 
		if($projectImage['project_image_sub_category_id']==$mainTabCate['ProjectImageCategory']['parent_id'] ){
	 ?>
    <li><a href="<?php echo $this->webroot.'project/project_'.$projectImage['project_id'].'/'.$projectImage['project_image']; ?>" class="plan_map" title="<?php echo $projectImage['name'];  ?>"><img src="<?php echo Helper::webroot(''); ?>img/1bhk-flat.png" alt="<?php echo $projectImage['name'];  ?>" width="26" height="26"><?php echo $projectImage['name'];  ?></a>
  

    </li>
	<?php
		}
	
	 } ?>
  </ul>
</div>
-->


</div>
    <?php  } ?>

    

   
 
    



</div>
</div>
</div>
</div>
</section>
<!--end middle-->
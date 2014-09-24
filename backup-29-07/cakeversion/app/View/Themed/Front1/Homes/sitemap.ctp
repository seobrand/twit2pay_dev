<!--start middle-->
<section class="middle">
  <div class="content">
    <div class="content_inner">
     <div class="sidebar_title">
            <p class="fontsize32">Sitemap</p>
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
          <p class="fontsize20">Sitemap</p>
        </div>
        
        <div class="sitemap">
        	<ul>
            <!-- home page -->
        	  <li><?php echo $this->Html->link('Home',array('controller'=>'homes','action'=>'index'),array('escape'=>false)); ?></li>
              
             <!-- about page -->
            <li><a href="">About Us</a>
            	<ul>
                 <li><?php echo $this->Html->link('The Company',array('controller'=>'StaticPages','action'=>'detail/1')) ?></li>
                <li><?php echo $this->Html->link('Vision & Mission',array('controller'=>'StaticPages','action'=>'detail/2')) ?></li>
                <li><?php echo $this->Html->link('Milestones',array('controller'=>'StaticPages','action'=>'detail/3')) ?></li>
                <li><?php echo $this->Html->link('CMD\'s Profile',array('controller'=>'StaticPages','action'=>'detail/4')) ?></li>
                <li><?php echo $this->Html->link('Team @ Mahima',array('controller'=>'StaticPages','action'=>'detail/5')) ?></li>
                <li><?php echo $this->Html->link('Maintenance Company',array('controller'=>'StaticPages','action'=>'detail/6')) ?></li>
                <li><?php echo $this->Html->link('Corporate Social Resp.',array('controller'=>'StaticPages','action'=>'detail/7')) ?></li>
                </ul>
            </li>
            
            <!-- Project page -->
            <li><a href="">Projects</a>
            <ul>
            	      <?php $projectCats = $common->getProjectCategory(); 
		  foreach($projectCats as $projectCat)
		  {
		  ?>
            <li><?php echo $this->Html->link(ucfirst($projectCat['ProjectCategory']['name']),array('controller'=>'projects','action'=>'projectType',$projectCat['ProjectCategory']['id'],$projectCat['ProjectCategory']['name']),array('escape'=>false)); ?>
            
             <ul>
             <?php  $subCatLists = $common->getProjectSubCategory($projectCat['ProjectCategory']['id']); 
			 		foreach($subCatLists as $subCatList ) {	
			  ?>
                    <li><?php echo $this->Html->link(ucfirst($subCatList['ProjectCategory']['name']),array('controller'=>'projects','action'=>'projectall',$projectCat['ProjectCategory']['id'],$subCatList['ProjectCategory']['id']),array('escape'=>false)); ?></li>
     				<?php } ?>
                
                  </ul>
             </li>
            <?php }		 ?>
        </ul>
            </li>
            
             <!-- Media page -->
            <li><a href="">Media</a>
            	<ul>
                <li><?php echo $this->Html->link('Press Release',array('controller'=>'PressReleases','action'=>'pressListing')) ?></li>
                  <li><?php echo $this->Html->link('News & Updates',array('controller'=>'news','action'=>'listing')) ?></li>
                </ul>
            </li>
            
             <!-- Contact page -->
            <li><a href="">Contact</a>
            	<ul>
                 <li><?php echo $this->Html->link('Career',array('controller'=>'homes','action'=>'career')) ?></li>
                <li><?php echo $this->Html->link('Locate Us',array('controller'=>'homes','action'=>'contactUs')) ?></li>
                 <li><?php echo $this->Html->link('Sitemap',array('controller'=>'homes','action'=>'sitemap')) ?></li>
                </ul>
            </li>
            
              <!-- other use full link page -->
            <li><a href="">Useful Links</a>
            	<ul>
               <li><?php echo $this->Html->link('Customer Login',array('controller'=>'admin','action'=>'login')) ?></li>
                <li><?php echo $this->Html->link('Offer Partnership',array('controller'=>'homes','action'=>'offerPartnership')) ?></li>
                <li><?php echo $this->Html->link('Need Help?',array('controller'=>'homes','action'=>'needHelp')) ?></li>
                 <li><?php echo $this->Html->link('Flats in Jaipur',array('controller'=>'StaticPages','action'=>'detail/8')) ?></li>
                
                
                </ul>
            </li>
            
            
            </ul>
        </div>
        
        
        
      </div>
    </div>
  </div>
</section>
<!--end middle-->
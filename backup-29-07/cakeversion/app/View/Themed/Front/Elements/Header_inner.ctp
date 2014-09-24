<?php 
$page=$this->params['action'];

$commonSetting = $common->getSetting();
?>
<header>
  <div class="wrapper">
    <div class="logo"><a href="<?php echo FULL_BASE_URL.router::url('/',false);?>"><img src="<?php echo Helper::webroot(''); ?>img/logo.png" alt="Mahima Logo" title="Mahima Group"></a></div>
    <div class="right_indent">
      <div class="right_top">
        <div class="top_nav">
          <ul>
            <li><?php echo $this->Html->link('Customer Login',array('controller'=>'admin','action'=>'login')) ?></li>
            <li><?php echo $this->Html->link('Offer Partnership',array('controller'=>'homes','action'=>'offerPartnership')) ?></li>
            <li><?php echo $this->Html->link('Need Help?',array('controller'=>'homes','action'=>'needHelp')) ?></li>
          </ul>
        </div>
        <div class="top_social">
          <ul>
            <li><a href="<?php echo $commonSetting['Setting']['facebook'];  ?>" target="_blank" class="facebook">facebook</a></li>
            <li><a href="<?php echo $commonSetting['Setting']['twitter'];  ?>" target="_blank" class="twitter">twitter</a></li>
            <li><a href="<?php echo $commonSetting['Setting']['googleplus'];  ?>" class="google_plus">google plus</a></li>
          </ul>
        </div>
        <div class="clear"></div>
      </div>
      <div class="nav">
        <nav>
          <ul id="nav">
            <li><a href="<?php echo FULL_BASE_URL.router::url('/',false);?>" class="<?php if($page=='home' or $page=='index') echo "active" ?>"><span>home</span></a></li>
            <li><a href="" class="<?php if($page=='about' or $page=='detail') echo "active" ?>"><span><span>about us</span></span></a>
              <ul>

                 <li><a href="<?php echo FULL_BASE_URL.router::url('/',false);?>the_company">The Company</a></li>
                 <li><a href="<?php echo FULL_BASE_URL.router::url('/',false);?>vision_mission">Vision & Mission</a></li>
    			 <li><a href="<?php echo FULL_BASE_URL.router::url('/',false);?>the_company">Milestones</a></li>
                 <li><a href="<?php echo FULL_BASE_URL.router::url('/',false);?>vision_mission">CMD\'s Profile</a></li>
                 <li><a href="<?php echo FULL_BASE_URL.router::url('/',false);?>the_company">Team @ Mahima</a></li>
                 <li><a href="<?php echo FULL_BASE_URL.router::url('/',false);?>vision_mission">Maintenance Company</a></li>
                 <li><a href="<?php echo FULL_BASE_URL.router::url('/',false);?>the_company">Corporate Social Resp.</a></li>
                
                
                
                <div class="bottom_cruve_bg"></div>
              </ul>
            </li>
            <li><a href="" class="<?php if($page=='projectType' or $page=='projectall' or $page=='projectdetail') echo "active" ?>"><span><span>projects</span></span></a>
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
                    <div class="bottom_cruve_bg"></div>
                  </ul>
            
            
            </li>
          
         
        <?php }
		 ?>
              
             
             
                <div class="bottom_cruve_bg"></div>
              </ul>
            </li>
            <li><a href="" class="<?php if($page=='media-center' or $page=='pressListing' or $page=='listing' or $page=='newsDetail') echo "active" ?>"><span><span>media center</span></span></a>
              <ul>
                 <li><?php echo $this->Html->link('Press Release',array('controller'=>'PressReleases','action'=>'pressListing')) ?></li>
                  <li><?php echo $this->Html->link('News & Updates',array('controller'=>'news','action'=>'listing')) ?></li>
                <div class="bottom_cruve_bg"></div>
              </ul>
            </li>
            <li><a href="" class="<?php if($page=='career' or  $page=='contactUs' or $page=='jobDetail' or $page=='apply') echo "active" ?>"><span><span>contact us</span></span></a>
              <ul>
                <li><?php echo $this->Html->link('Career',array('controller'=>'homes','action'=>'career')) ?></li>
                <li><?php echo $this->Html->link('Locate Us',array('controller'=>'homes','action'=>'contactUs')) ?></li>
                <div class="bottom_cruve_bg"></div>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>

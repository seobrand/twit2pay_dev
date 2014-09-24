<?php $commonSetting = $common->getSetting(); ?>
<footer class="footer">
  <div class="wrapper">
    <div class="footer_project_nav">
      <p class="footer_title">Projects</p>
      <ul>

           <?php $projectCats = $common->getProjectCategory(); 
		  foreach($projectCats as $projectCat)
		  {
		  ?>
            <li><?php echo $this->Html->link(ucfirst($projectCat['ProjectCategory']['name']),array('controller'=>'projects','action'=>'projectType',$projectCat['ProjectCategory']['id'],$projectCat['ProjectCategory']['name']),array('escape'=>false)); ?></li>
          
           <?php } ?>
        
        <li><?php echo $this->Html->link('Sitemap',array('controller'=>'homes','action'=>'sitemap')) ?></li>
      </ul>
    </div>
    <div class="footer_aboutus_nav">
      <p class="footer_title">About Us</p>
      <div class="footer_aboutus_nav_container">
        <ul>

        <li><a href="<?php echo FULL_BASE_URL.router::url('/',false);?>the_company">The Company</a></li>
        <li><?php echo $this->Html->link('Vision & Mission',array('controller'=>'StaticPages','action'=>'detail/2')) ?></li>
        <li><?php echo $this->Html->link('Milestones',array('controller'=>'StaticPages','action'=>'detail/3')) ?></li>
        </ul>
      </div>
      <div class="footer_aboutus_nav_container">
        <ul>
          <li><?php echo $this->Html->link('CMD\'s Profile',array('controller'=>'StaticPages','action'=>'detail/4')) ?></li>
        <li><?php echo $this->Html->link('Team @ Mahima',array('controller'=>'StaticPages','action'=>'detail/5')) ?></li>
        <li><?php echo $this->Html->link('Maintenance Company',array('controller'=>'StaticPages','action'=>'detail/6')) ?></li>
        </ul>
      </div>
    </div>
    <div class="footer_usefullinks_nav">
      <p class="footer_title">Useful Links</p>
      <ul>
        <li><?php echo $this->Html->link('Press Release',array('controller'=>'PressReleases','action'=>'pressListing')) ?></li>
        <li><a href="<?php echo FULL_BASE_URL.router::url('/',false);?>flats-residential-property-Jaipur">Flats in Jaipur</a></li>
        <li><?php echo $this->Html->link('Career',array('controller'=>'homes','action'=>'career')) ?></li>
      </ul>
    </div>
    <div class="footer_contactinfo">
      <p class="footer_title">Contact Info</p>
      <p class="contactinfo"><?php echo $commonSetting['Setting']['address'];  ?> </p>
    </div>
    <div class="clear"></div>
    <div class="copyright">
      <p><?php echo $commonSetting['Setting']['copyright'];  ?></p>
    </div>
  </div>
</footer>
<script src="<?php echo Helper::webroot(''); ?>js/jquery-1.7.2.min.js">
</script><script src="<?php echo Helper::webroot(''); ?>js/jquery.colorbox.js"></script>
<?php 	echo $this->Html->css('colorbox.css');  ?>
<script type="text/javascript">
$(document).ready(function(){
			
				$(".group3").colorbox({rel:'group3'});
			});
		</script>
        
<!--start middle-->
<section class="middle">
  <div class="content">
    <div class="content_inner">
      <div class="sidebar_title">
        <p class="fontsize32">Media Center</p>
      </div>
      
      
       <!--statrt middle-->
     <aside class="sidebar_left">
        <div class="sidebar_topnav">
          <div class="sidarbar_nav">
            <ul>
              
       
               <li><?php echo $this->Html->link('Press Release',array('controller'=>'PressReleases','action'=>'pressListing'),array('escape'=>false)); ?></li>
                <li><?php echo $this->Html->link('News & Updates',array('controller'=>'news','action'=>'listing'),array('class'=>'active_nav','escape'=>false)); ?></li>
            </ul>
          </div>
        </div>
      
         <?php echo $this->element('three_panal'); ?>
         <?php echo $this->element('left_latestlunch'); ?>
        
      </aside>
     <!--end middle-->
      
      
      
      
      <div class="container_right">
        <div class="contant_title">
          <p class="fontsize20">Latest Press Releases</p>
        </div>
        <div class="contact_pic"><img src="<?php echo Helper::webroot(''); ?>img/news-pic.jpg" alt="In the news" title="In the news" width="654" height="136"></div>
        <div class="press_release">
          <ul>
       
            <?php 
            if(count($pressLists) >0){
            $i = '1';
            foreach($pressLists as $pressList) {
            if($i%3==0) echo "<li>";
            ?>
              <div class="<?php if($i%3==0) echo 'pressbox_container rightmarin0'; else echo 'pressbox_container';   ?>">
                <div class="press_title">
                  <p> <?php echo $pressList['PressRelease']['title']; ?></p>
                </div>
                <div class="press_content">
                 <a href="<?php echo $this->webroot.'press_release/'.$pressList['PressRelease']['image']; ?>" class="group3">
                 <img src="<?php echo $this->webroot.'press_release/thumb_'.$pressList['PressRelease']['image']; ?>" alt="Property" title="Property" width="186" height="150">
                 
                 </a>
                  </div>
              </div>
              <?php  if($i%3==0) echo "</li>";
              $i++;} }
              else
              {
              echo "No data";
              }
              
              
               ?>
           
           
         
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!--end middle-->
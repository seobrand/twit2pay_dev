<!--start middle-->
<section class="middle">
  <div class="content">
    <div class="content_inner">
      <div class="sidebar_title">
        <p class="fontsize32">News &amp; Updates</p>
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
          <p class="fontsize20"><?php echo $newsDetail['News']['title'];  ?></p>
         <!-- <p class="news_date">  </p>-->
        </div>
        <br>
        <div class="content_right_inner">
        <?php echo date('D d M,Y',  $newsDetail['News']['start_date']);  ?>
        <p class="fontsize12arial">
         <?php echo $newsDetail['News']['description'];  ?>
        </p>
        
        </div>
        
      </div>
    </div>
  </div>
</section>
<!--end middle-->
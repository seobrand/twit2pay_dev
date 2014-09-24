<!--start middle-->
<section class="middle">
  <div class="content">
    <div class="content_inner">
      <div class="sidebar_title">
        <p class="fontsize32">Testimonial Detail</p>
      </div>
      
       <!--statrt middle-->
     <aside class="sidebar_left">
        <div class="sidebar_topnav">
          <div class="sidarbar_nav">
            <ul>
              
       
               <li><?php echo $this->Html->link('All Testimonial',array('controller'=>'homes','action'=>'testimonialListing'),array('escape'=>false)); ?></li>
             
            </ul>
          </div>
        </div>
      
         <?php echo $this->element('three_panal'); ?>
         <?php echo $this->element('left_latestlunch'); ?>
        
      </aside>
     <!--end middle-->
      
      
      
      <div class="container_right">
        <div class="contant_title">
          <p class="fontsize20"><?php echo $testimonialDetail['Testimonial']['by'];  ?></p>
         <!-- <p class="news_date">  </p>-->
        </div>
        <br>
        <div class="content_right_inner">
    
        <p class="fontsize12arial">
         <?php echo $testimonialDetail['Testimonial']['testimonial'];  ?>
        </p>
        
        </div>
        
      </div>
    </div>
  </div>
</section>
<!--end middle-->
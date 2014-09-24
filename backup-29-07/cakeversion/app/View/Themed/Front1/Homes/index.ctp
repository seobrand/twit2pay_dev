<section class="middle">
  <div class="news_updates_container">
    <div class="news_updates_title">
      <p>   <?php echo $this->Html->link('News Updates', array('controller'=>'news','action'=>'listing'),array('escape'=>false)); ?></p>
    </div>
    <div class="new_updates_inner">
      <ul>


		<?php if(count($newsLists) >0 ) {
				$i='1';
					foreach($newsLists as $newsList)
					{ ?>
              
              <li>
          <div class="news_date">
         <!--   <p>20 July, 2012</p>-->
          </div>
          <div class="news_updates">
            <p><?php echo $this->Text->truncate($newsList['News']['title'],50,array( 'ending' => '...','exact' => false)); ?></p>
          </div>
          <div class="click_here">
            <p>
             <?php echo $this->Html->link('click here &raquo;', array('controller'=>'news','action'=>'newsDetail',$newsList['News']['id']),array('escape'=>false)); ?>
            </p>
          </div>
        </li>
             
          	<?php $i++; } } else { ?>
            No News
            <?php }  ?>

        

      </ul>
    </div>
  </div>
  <div class="content">
    <div class="top_three_box_outer">
      <div class="roundedbox_contanier">
        <div class="roundedbox_title">
        <?php $latestProjects = $common->getlatestProjectLsit();  
 ?>
          <p class="fontsize17">Latest Launches</p>
        </div>
        
        <div class="roundedbox_content">
        <div class="testimonial_content">
         
        <ul>
        <?php
		if(count($latestProjects) >0){
		 foreach($latestProjects as $latestProject) {  ?>
        <li>
      
<?php if($latestProject['Project']['name']) { ?>
<img src="<?php echo FULL_BASE_URL.router::url('/',false);?>thumbnail.php?file=project/project_<?php echo $latestProject['Project']['id'].'/'.$latestProject['Project']['project_image']; ?>&maxw=273&maxh=137"  >
<?php }else{ ?>
<img src="<?php echo FULL_BASE_URL.router::url('/',false);?>thumbnail.php?file=img/no-image.jpg&maxw=167&maxh=137" alt="Image Not Avaivable" title="Image Not Avaivable" >
<?php } ?>
          <p class="latest_launch_title"><?php echo $latestProject['Project']['name']; ?></p>
          <p class="fontsize12"><?php echo $this->Text->truncate($latestProject['Project']['description'],50,array( 'ending' => '...','exact' => false)); ?></p>
          <p> <?php echo $this->Html->link('',array('controller'=>'projects','action'=>'projectdetail',$latestProject['Project']['id']),array('class'=>'find_out_btn')) ?></p>
      </li> 
      <?php }
		}else{
		echo "<h1>Coming Soon</h1>";	
		}
		?>
       </ul></div></div>
      </div>
      
      <div class="roundedbox_contanier">
        <div class="roundedbox_title">
          <p class="fontsize17"><?php echo $viewWalkthrough['StaticPage']['page_title']; ?></p>
        </div>
        <div class="roundedbox_content"> 
         <?php echo $viewWalkthrough['StaticPage']['description']; ?>
          <ul class="two_link">
          <?php $projectCats = $common->getProjectCategory(); 
		  foreach($projectCats as $projectCat)
		  {
		  ?>
            <li><?php echo $this->Html->link($projectCat['ProjectCategory']['name'],array('controller'=>'projects','action'=>'projectType',$projectCat['ProjectCategory']['id'],$projectCat['ProjectCategory']['name']),array('escape'=>false)); ?></li>
          
           <?php } ?>
          </ul>
        </div>
      </div>
      
      <div class="roundedbox_contanier third_box">
        <div class="roundedbox_title">
          <p class="fontsize17"><?php echo $needhelp['StaticPage']['page_title']; ?></p>
        </div>
        <div class="roundedbox_content">
         <?php echo $needhelp['StaticPage']['description']; ?>
        </div>
      </div>
    </div>
    <div class="second_three_box_outer">
      <div class="second_roundedbox_contanier">
        <div class="roundedbox_title">
        <h1 class="fontsize17" ><strong style="font:15px 'gotham-medium';">  <?php echo $propertySection['StaticPage']['page_title']; ?> </strong></h1>
        </div>
        <div class="roundedbox_content">
          <?php echo $propertySection['StaticPage']['description']; ?>
        </div>
      </div>
      <div class="second_roundedbox_contanier">
        <div class="roundedbox_title">
          <p > <h2 class="fontsize17" ><strong style="font:15px 'gotham-medium';"> <?php echo $buildersSection['StaticPage']['page_title']; ?> </strong> </h2></p>
        </div>
        <div class="roundedbox_content">
         <?php echo $buildersSection['StaticPage']['description']; ?>
        </div>
      </div>
      <div class="second_roundedbox_contanier second_third_box">
        <div class="roundedbox_title">
          <p class="fontsize17">Testimonials</p>
        </div>
        <div class="roundedbox_content">
          <div class="testimonial_icon"><img src="<?php echo Helper::webroot(''); ?>img/testimonials-icon.gif" alt="Testimonials" width="56" height="56"></div>
          <div class="testimonial_inner">
            <ul>
            <?php
			$testimonailLists = $common->gettestimonialList(); 
			 if(count($testimonailLists) > 0)
			{ 
			foreach($testimonailLists as $testimonailList)
			{
			?>
              <li>
                <p class="fontsize12"><?php echo $testimonailList['Testimonial']['testimonial'];  ?></p>
                <p class="testimonial_name"><?php echo $testimonailList['Testimonial']['by'];  ?></p>
                <p>
                <?php echo $this->Html->link('',array('controller'=>'homes','action'=>'testimonialDetail',$testimonailList['Testimonial']['id']),array('class'=>'read_more','escape'=>false)); ?>
                </p>
              </li>
            <?php }
			}
			else{
				
			echo "No result to display";	
				}
			
			  ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
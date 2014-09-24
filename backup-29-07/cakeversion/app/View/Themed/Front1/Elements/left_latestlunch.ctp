<?php $latestProject = $common->getlatestProject();  
 ?>
<div class="whats_new_launch">
          <div class="what_new_inner">
            <div class="new_launch_pic">
        
                    
             <?php if(!empty($latestProject['Project']['name'])) { ?>
             <img src="<?php echo FULL_BASE_URL.router::url('/',false);?>thumbnail.php?file=project/project_<?php echo $latestProject['Project']['id'].'/'.$latestProject['Project']['project_image']; ?>&maxw=96&maxh=97"  alt="<?php echo $latestProject['Project']['name'];  ?>" class="project_pic" title="<?php echo $latestProject['Project']['name'];  ?>" >
            <?php }else{ ?>
    <img src="<?php echo FULL_BASE_URL.router::url('/',false);?>thumbnail.php?file=img/no-image.jpg&maxw=96&maxh=96" alt="Image Not Avaivable" title="Image Not Avaivable" >
          	<?php } ?>
                    
                    </div>
            <div class="new_launch_details">
              <p class="fonsize22">What's New</p>
              <p class="fontsize14">Latest Launch: </p>
              <p class="fontsize12boldgreen"><?php echo $latestProject['Project']['name']; ?></p>
            </div>
          </div>
          <div class="click_more">
            <p>
             <?php echo $this->Html->link('click here for more',array('controller'=>'projects','action'=>'projectdetail',$latestProject['Project']['id'])) ?>
          </div>
        </div>
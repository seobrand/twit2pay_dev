 <?php 
 $page=$this->params['action'];

?> <section class="middle">
  <div class="content">
    <div class="content_inner">
      <div class="sidebar_title">
        <p class="fontsize32">Career</p>
      </div>
      <!--statrt middle-->
     <aside class="sidebar_left">
        <div class="sidebar_topnav">
          <div class="sidarbar_nav">
            <ul>
              
             
               <li>
			   <a href="<?php echo $this->Html->url(array( "controller" => "homes",    "action" => "contactUs"));?>" class="<?php if($page=='contactUs') echo "active_nav" ?>">Locate Us</a></li>
			<li>   <a href="<?php echo $this->Html->url(array( "controller" => "homes",    "action" => "career"));?>" class="<?php if($page=='career' or $page=='jobDetail' or $page=='apply') echo "active_nav" ?>">Career With Us</a></li>   
            </ul>
          </div>
        </div>
      
         <?php echo $this->element('three_panal'); ?>
         <?php echo $this->element('left_latestlunch'); ?>
        
      </aside>
     <!--end middle-->
     
     <div class="container_right">
      
      <div class="contant_title">
          <p class="fontsize20">Jobs</p>
           <?php echo $this->Session->flash(); ?>
        </div>        
       <div class="news_listing">
         <div class="jobs_listing_title">
           <table>
             <tr>
               <td class="jobs_id_td"><p class="font16white">S.No.</p></td>
               <td class="jobs_department_td"><p class="font16white"><?php echo $this->Paginator->sort('JobDepartment.name','Department'); ?> </p></td>
               <td class="jobs_title_td"><p class="font16white"><?php echo $this->Paginator->sort('JobPosting.title','Title'); ?></p></td>
               <td class="jobs_experience_td"><p class="font16white"> <?php echo $this->Paginator->sort('Experience.title','Experience'); ?></p></td>
                <td class="jobs_date_td"><p class="font16white">  <?php echo $this->Paginator->sort('JobPosting.end_date','Last Date'); ?></p></td>
               <td class="jobs_view_td"></td>
             </tr>
             
           
           </table>
         </div>
         <div class="jobs_status">
           <table>
            <?php
			$i=1;
			if(count($jobsList))
			{
			 foreach($jobsList as $key=>$value) {
		?>
             <tr>
               <td class="jobs_id_td"><?php echo $i ?>.</td>
               <td class="jobs_department_td"><?php echo $value['JobDepartment']['name']; ?></td>
               <td class="jobs_title_td"> <?php echo $value['JobPosting']['title']; ?> </td>
                <td class="jobs_experience_td"><?php echo $value['Experience']['title']; ?> </td>
                <td class="jobs_date_td"><?php echo date('d-M-Y',$value['JobPosting']['end_date']); ?></td>
               <td class="jobs_view_td"><p class="jobs_view_btn"><?php echo $this->Html->link('View',array('controller'=>'homes','action'=>'jobDetail',$value['JobPosting']['id'])); ?></p>
               <p class="jobs_view_btn"> <?php echo $this->Html->link('Apply',array('controller'=>'homes','action'=>'apply',$value['JobPosting']['id'])); ?></p>
               </td>
             </tr>
               <?php 
			   $i=$i+1;
			   }
			   }else{ ?>
               	<tr>
                	<td colspan="6"></td>
                </tr>
               <?php }?>
           </table>
           <?php if(count($jobsList)>10)
			{ ?>
           <div class="paging"> <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?> | <?php echo $this->Paginator->numbers();?> | <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?> </div>
           <?php } ?>
         </div>
         
       </div>
      </div>     
      
    </div>
  </div>
</section>
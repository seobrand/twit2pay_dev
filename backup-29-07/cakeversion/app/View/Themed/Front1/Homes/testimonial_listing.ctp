<!--start middle-->
<section class="middle">
  <div class="content">
    <div class="content_inner">
      <div class="sidebar_title">
        <p class="fontsize32">Testimonial Listing</p>
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
          <p class="fontsize20">Testimonial</p>
        </div>        
       <div class="news_listing">
         <div class="news_listing_title">
           <table>
             <tr>
               <td class="news_id_td"><p class="font16white">S.No.</p></td>
               <td class="news_title_td"><p class="font16white">Title</p></td>
               <td class="news_date_td"><p class="font16white">Testimonial</p></td>
               <td class="new_view_td"></td>
             </tr>
           </table>
         </div>
         <div class="news_status">
           <table>
          
         	<?php if(count($testimonialListing) >0 ) {
				$i='1';
					foreach($testimonialListing as $testimonialListing)
					{ ?>
                    <tr>
               <td class="news_id_td"><?php echo $i; ?>.</td>
               <td class="news_title_td"><?php echo $testimonialListing['Testimonial']['by'];  ?>
                </td>
               <td class="news_date_td"><?php echo $this->Text->truncate($testimonialListing['Testimonial']['testimonial'],50,array( 'ending' => '...','exact' => false)); ?>   </td>
               <td class="new_view_td"><p class="view_btn">
               
                <?php echo $this->Html->link('View', array('controller'=>'homes','action'=>'testimonialDetail',$testimonialListing['Testimonial']['id']),array('escape'=>false)); ?>
               </p></td>
             </tr>
          	<?php $i++; } } else { ?>
            No News
            <?php }  ?>
         
         
           </table>
         </div>
         
       </div>
      </div>
    </div>
  </div>
</section>
<!--end middle-->
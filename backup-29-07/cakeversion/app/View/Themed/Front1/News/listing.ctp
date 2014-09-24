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
          <p class="fontsize20">Latest News</p>
        </div>        
       <div class="news_listing">
         <div class="news_listing_title">
           <table>
             <tr>
               <td class="news_id_td"><p class="font16white">S.No.</p></td>
               <td class="news_title_td"><p class="font16white">News Title</p></td>
               <td class="news_date_td"><p class="font16white">News Date</p></td>
               <td class="new_view_td"></td>
             </tr>
           </table>
         </div>
         <div class="news_status">
           <table>
          
         	<?php if(count($newsLists) >0 ) {
				$i='1';
					foreach($newsLists as $newsList)
					{ ?>
                    <tr>
               <td class="news_id_td"><?php echo $i; ?>.</td>
               <td class="news_title_td"><?php echo $this->Text->truncate($newsList['News']['title'],50,array( 'ending' => '...','exact' => false)); ?>
                </td>
               <td class="news_date_td"> <?php echo date('D d M,Y',  $newsList['News']['start_date']);  ?>  </td>
               <td class="new_view_td"><p class="view_btn">
               
                <?php echo $this->Html->link('View', array('controller'=>'news','action'=>'newsDetail',$newsList['News']['id']),array('escape'=>false)); ?>
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
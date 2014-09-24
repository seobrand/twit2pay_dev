 <?php 
 $page=$this->params['action'];

?>  
<!--start middle-->
<section class="middle">
  <div class="content">
    <div class="content_inner">
      <div class="sidebar_title">
        <p class="fontsize32">Contact Us</p>
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
          <p class="fontsize20">Locate Us</p>
        </div>
        
       <div class="contact_pic"><img src="<?php echo Helper::webroot(''); ?>img/contactus-pic.jpg" alt="we are always ready to help..." title="we are always ready to help..." width="650" height="136"></div>
        
        <div class="contact_info">
        <div class="contact_address">
            
            <p class="fontsize16navy">Mahima Real Estate Pvt. Ltd.</p>
            <p class="fontsize12 marginbottom8">F-1 Govind Marg, Opp. Petrol Pump,</p>
            <p class="fontsize12 marginbottom8">Besides Hotel Ramada</p>
            <p class="fontsize12 marginbottom8">Raja Park, Jaipur-302 004</p>
            <br>
            <p class="fontsize12 marginbottom8">Tel : +91-141- 4050607 (30 Lines)</p>
            <p class="fontsize12 marginbottom8">Mobile :+91-9828119104</p>
             <br>
             <p class="fontsize12 marginbottom8">Website : <a href="http://mahimagroup.org" target="_blank" class="website_link">www.mahimagroup.org</a></p>
            <p class="fontsize12 marginbottom8">Email : <a href="mailto:marketing@mahimagroup.org" class="email_green">marketing@mahimagroup.org</a></p>
       
        </div>
        <div class="contact_map">
        
        <iframe width="374" height="262" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Mahima+Real+Estate+Pvt.+Ltd+Raja+Park,+Jaipur,+Rajasthan,+India&amp;aq=&amp;sll=26.89509,75.831585&amp;sspn=0.029662,0.038581&amp;ie=UTF8&amp;hq=Mahima+Real+Estate+Pvt.+Ltd&amp;hnear=Raja+Park,+Jaipur,+Rajasthan,+India&amp;z=14&amp;iwloc=A&amp;cid=16994448742236861766&amp;ll=26.896064,75.829025&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Mahima+Real+Estate+Pvt.+Ltd+Raja+Park,+Jaipur,+Rajasthan,+India&amp;aq=&amp;sll=26.89509,75.831585&amp;sspn=0.029662,0.038581&amp;ie=UTF8&amp;hq=Mahima+Real+Estate+Pvt.+Ltd&amp;hnear=Raja+Park,+Jaipur,+Rajasthan,+India&amp;z=14&amp;iwloc=A&amp;cid=16994448742236861766&amp;ll=26.896064,75.829025"></a></small>
</iframe>
        
        
        
        </div>
        
        </div>
        
      </div>
    </div>
  </div>
</section>
<!--end middle-->
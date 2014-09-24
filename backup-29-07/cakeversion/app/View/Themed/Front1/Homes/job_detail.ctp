 <?php 
 $page=$this->params['action'];

?>       <section class="middle">
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
          <p class="fontsize20"><?php echo $jobRec['JobPosting']['title']; ?></p>
          <p class="news_date"><?php echo $this->Html->link('Apply',array('controller'=>'homes','action'=>'apply',$jobRec['JobPosting']['id'])); ?></p>
        </div>
        <br>
        <div class="content_right_inner">
        <table width="656">
        	
            <tr>
            	<td width="120px;"><p class="Jobdetail_fontsize16"> Department</p></td>
                <td><p class="Jobdetail_fontsize16">:</p></td>
                <td class="class="fontsize12arial""> <p class="Jobdetail_fontsize14"> <?php echo $jobRec['JobDepartment']['name']; ?></p></td>
            </tr>
             <tr>
            	<td><p class="Jobdetail_fontsize16">Experience</p></td>
                 <td><p class="Jobdetail_fontsize16">:</p></td>
                <td class="class="fontsize12arial""> <p class="Jobdetail_fontsize14"><?php echo $jobRec['Experience']['title']; ?></p></td>
            </tr>
            
            <tr>
            	<td><p class="Jobdetail_fontsize16">Address</p></td>
                 <td><p class="Jobdetail_fontsize16">:</p></td>
                
                <td class="class="fontsize12arial""> <p class="Jobdetail_fontsize14"><?php echo $jobRec['JobPosting']['address']; ?></p></td>
            </tr>
            
            <tr>
            	<td valign="top"><p class="Jobdetail_fontsize16">Skills</p></td>
                 <td><p class="Jobdetail_fontsize16">:</p></td>
                <td class="class="fontsize12arial"">
                <p class="Jobdetail_fontsize14">
			   <?php
			    if($jobRec['JobPosting']['skills'])
				{
					$skills=explode(',',$jobRec['JobPosting']['skills']);
					foreach($skills as $value)
					{
						echo $common->getSkillsName($value).'&nbsp;,&nbsp;';
					}
				}
			   
			    ?>
                </p>
                
                </td>
            </tr>
            
            
           	 <tr>
            	<td><p class="Jobdetail_fontsize16">Last Date</p></td>
                 <td><p class="Jobdetail_fontsize16">:</p></td>
                <td class="class="fontsize12arial""> <p class="Jobdetail_fontsize14"><?php echo date('d-M-Y',$jobRec['JobPosting']['end_date']); ?></p></td>
            </tr>
            <tr>
            	<td><p class="Jobdetail_fontsize16">Country</p></td>
                 <td><p class="Jobdetail_fontsize16">:</p></td>
                <td class="class="fontsize12arial""> <p class="Jobdetail_fontsize14"><?php echo $jobRec['Country']['name']; ?></p></td>
            </tr>
            <tr>
            	<td><p class="Jobdetail_fontsize16">State</p></td>
                 <td><p class="Jobdetail_fontsize16">:</p></td>
                <td class="class="fontsize12arial""> <p class="Jobdetail_fontsize14"><?php echo $jobRec['State']['name']; ?></p></td>
            </tr>
           
            
         
        	<tr>
            	<td><p class="Jobdetail_fontsize16">Description</p></td>
                 <td><p class="Jobdetail_fontsize16">:</p></td>
                <td class="class="fontsize12arial""> <p class="Jobdetail_fontsize14"><?php echo $jobRec['JobPosting']['description']; ?></p></td>
            </tr>
        </table>
         
        </div>
      </div>
    </div>
  </div>
</section>
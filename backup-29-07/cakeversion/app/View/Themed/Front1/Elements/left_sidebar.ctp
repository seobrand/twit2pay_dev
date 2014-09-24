<aside class="sidebar_left">
  <div class="sidebar_topnav">
    <div class="sidarbar_nav">
      <ul>

       <?php  if($this->params['controller']=='StaticPages' or $this->params['action']=='offerPartnership') {   ?>
<!--               <li><a href="the-company.php" class="active_nav">The Company</a></li>-->
                <li><?php echo $this->Html->link('The Company',array('controller'=>'StaticPages','action'=>'detail/1')) ?></li>
                <li><?php echo $this->Html->link('Vision & Mission',array('controller'=>'StaticPages','action'=>'detail/2')) ?></li>
                <li><?php echo $this->Html->link('Milestones',array('controller'=>'StaticPages','action'=>'detail/3')) ?></li>
                <li><?php echo $this->Html->link('CMD\'s Profile',array('controller'=>'StaticPages','action'=>'detail/4')) ?></li>
                <li><?php echo $this->Html->link('Team @ Mahima',array('controller'=>'StaticPages','action'=>'detail/5')) ?></li>
                <li><?php echo $this->Html->link('Maintenance Company',array('controller'=>'StaticPages','action'=>'detail/6')) ?></li>
                <li><?php echo $this->Html->link('Corporate Social Resp.',array('controller'=>'StaticPages','action'=>'detail/7')) ?></li>
        <?php } else{  ?>
        
      <?php $projectCats = $common->getProjectCategory(); 
		  foreach($projectCats as $projectCat)
		  {
		  ?>
            <li><?php echo $this->Html->link(ucfirst($projectCat['ProjectCategory']['name']),array('controller'=>'projects','action'=>'projectType',$projectCat['ProjectCategory']['id'],$projectCat['ProjectCategory']['name']),array('escape'=>false)); ?></li>
          
         
        <?php }
		} ?>
      </ul>
    </div>
  </div>
           <div class="sidebar_sliding_panel">
          <ul>
            <li>
              <div class="expand_container">
                <div class="collapse_title first_panel"><a href="#" name="property_locater" rel="toggle[property_locater]" title="<?php echo Helper::webroot(''); ?>img/first-panel-arrow-up.png" rev="<?php echo Helper::webroot(''); ?>img/first-panel-arrow-down.png">Property Locater <img src="<?php echo Helper::webroot(''); ?>img/first-panel-arrow-down.png" width="22" height="22" alt="Down Arrow"></a> </div>
                <div id="property_locater" class="collapse_container">
                  <form name="property_locater_form" action=" ">
                    <ul>
                      <li>
                        <select name="residental" class="combo_box">
                          <option value="--Plese Select--">--Plese Select--</option>
                          <option value="Residental">Residental</option>
                        </select>
                      </li>
                      <li>
                        <select name="location" class="combo_box">
                          <option value="--Plese Select--">--Plese Select--</option>
                          <option value="Jaipur">Jaipur</option>
                        </select>
                      </li>
                      <li>
                        <select name="unit_type" class="combo_box">
                          <option value="*Unit Type">*Unit Type</option>
                          <option value="1 BHK">1 BHK</option>
                          <option value="2 BHK">2 BHK</option>
                          <option value="3 BHK">3 BHK</option>
                          <option value="4 BHK">4 BHK</option>
                        </select>
                      </li>
                      <li>
                        <select name="*prece_range" class="combo_box">
                          <option value="*Price Range">*Price Range</option>
                          <option value="10-20 Lakhs">10-20 Lakhs</option>
                          <option value="20-30 Lakhs">20-30 Lakhs</option>
                          <option value="30-40 Lakhs">30-40 Lakhs</option>
                          <option value="40-50 Lakhs">40-50 Lakhs</option>
                        </select>
                      </li>
                      <li>
                        <input type="text" value="*Email" class="text_field" onFocus="if(this.value=='*Email') {this.value=''}" onBlur="if(this.value=='') {this.value='*Email'}">
                      </li>
                      <li>
                        <input type="text" value="*Mobile" class="text_field" onFocus="if(this.value=='*Mobile') {this.value=''}" onBlur="if(this.value=='') {this.value='*Mobile'}">
                      </li>
                      <li>
                        <input type="submit" value="" class="panel_submit_btn">
                      </li>
                    </ul>
                  </form>
                </div>
                <div class="clear"></div>
              </div>
            </li>
            <li>
              <div class="expand_container">
                <div class="collapse_title second_panel"><a href="#" name="enquiry_center" rel="toggle[enquiry_center]" title="<?php echo Helper::webroot(''); ?>img/second-panel-arrow-up.png" rev="<?php echo Helper::webroot(''); ?>img/second-panel-arrow-down.png">Enquiry Center<img src="<?php echo Helper::webroot(''); ?>img/second-panel-arrow-down.png" width="22" height="22" alt="Down Arrow"></a> </div>
                <div id="enquiry_center" class="collapse_container">
                  <form name="enquirey_center_form" action=" ">
                    <ul>
                      <li>
                        <input type="text" value="*Name" class="text_field" onFocus="if(this.value=='*Name') {this.value=''}" onBlur="if(this.value=='') {this.value='*Name'}">
                      </li>
                      <li>
                        <input type="text" value="*Email" class="text_field" onFocus="if(this.value=='*Email') {this.value=''}" onBlur="if(this.value=='') {this.value='*Email'}">
                      </li>
                      <li>
                        <input type="text" value="*Mobile" class="text_field" onFocus="if(this.value=='*Mobile') {this.value=''}" onBlur="if(this.value=='') {this.value='*Mobile'}">
                      </li>
                      <li>
                        <input type="text" value="*State" class="text_field" onFocus="if(this.value=='*State') {this.value=''}" onBlur="if(this.value=='') {this.value='*State'}">
                      </li>
                      <li>
                        <input type="text" value="*City" class="text_field" onFocus="if(this.value=='*City') {this.value=''}" onBlur="if(this.value=='') {this.value='*City'}">
                      </li>
                      <li>
                        <input type="radio" name="b1" value="b1" class="radio_btn">
                        <p class="enquirey_type">Project Enquiry</p>
                      </li>
                      <li>
                        <input type="radio" name="b1" value="b1" class="radio_btn">
                        <p class="enquirey_type">Sale/Purchase/Lease</p>
                      </li>
                      <li>
                        <input type="radio" name="b1" value="b1" class="radio_btn">
                        <p class="enquirey_type">Other Enquiry</p>
                      </li>
                      <li>
                        <select name="select_project" class="combo_box">
                          <option value="--Select Project--">--Select Project--</option>
                          <option value="Residental">Residental</option>
                          <option value="Commercial">Commercial</option>
                        </select>
                      </li>
                      <li>
                        <textarea class="comment_box" onFocus="if(this.value=='Write Comments:') {this.value=''}" onBlur="if(this.value=='') {this.value='Write Comments:'}">Write Comments:</textarea>
                      </li>
                      <li>
                        <input type="submit" value="" class="panel_submit_btn">
                      </li>
                    </ul>
                  </form>
                </div>
                <div class="clear"></div>
              </div>
            </li>
            <li>
              <div class="expand_container">
                <div class="collapse_title third_panel"><a href="#" name="latest_launches" rel="toggle[latest_launches]" title="<?php echo Helper::webroot(''); ?>img/third-panel-arrow-up.png" rev="<?php echo Helper::webroot(''); ?>img/third-panel-arrow-down.png">Latest Launches<img src="<?php echo Helper::webroot(''); ?>img/third-panel-arrow-down.png" width="22" height="22" alt="Down Arrow"></a> </div>
                <div id="latest_launches" class="collapse_container">
                  <ul>
                    <li>
                      <div class="project_logo"><img src="<?php echo Helper::webroot(''); ?>img/panel-kopal.jpg" alt="Kopal" title="Kopal" width="56" height="56"></div>
                      <div class="project_details">
                        <p class="project_name">Kopal</p>
                        <p class="project_desc">Tired of living in rented house..</p>
                        <p class="more_info"><a href="">more info...</a></p>
                      </div>
                    </li>
                    <li>
                      <div class="project_logo"><img src="<?php echo Helper::webroot(''); ?>img/panel-nirvana.jpg" alt="Nirvana" title="Nirvana" width="56" height="56"></div>
                      <div class="project_details">
                        <p class="project_name">Nirvana :</p>
                        <p class="project_desc">The project can be broadly divided in...</p>
                        <p class="more_info"><a href="">more info...</a></p>
                      </div>
                    </li>
                    <li>
                      <div class="project_logo"><img src="<?php echo Helper::webroot(''); ?>img/panel-city-ville.jpg" alt="City Ville" title="City Ville" width="56" height="56"></div>
                      <div class="project_details">
                        <p class="project_name">City Ville:</p>
                        <p class="project_desc">Independent Luxury Villas...</p>
                        <p class="more_info"><a href="">more info...</a></p>
                      </div>
                    </li>
                    <li>
                      <div class="project_logo"><img src="<?php echo Helper::webroot(''); ?>img/panel-panache.jpg" alt="Panache" title="Panache" width="56" height="56"></div>
                      <div class="project_details">
                        <p class="project_name">Panache:</p>
                        <p class="project_desc">Luxury Appartments Jaipur...</p>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="clear"></div>
              </div>
            </li>
          </ul>
        </div>
        
        
        <div class="whats_new_launch">
          <div class="what_new_inner">
            <div class="new_launch_pic"><img src="<?php echo Helper::webroot(''); ?>img/new-launch-pic.jpg" alt="Nirvana" title="Nirvana" width="96" height="97"></div>
            <div class="new_launch_details">
              <p class="fonsize22">What's New</p>
              <p class="fontsize14">Latest Launch: </p>
              <p class="fontsize12boldgreen">Nirvana Luxury Apartments</p>
            </div>
          </div>
          <div class="click_more">
            <p><a href="">click here for more</a> 
          </div>
        </div>
</aside>
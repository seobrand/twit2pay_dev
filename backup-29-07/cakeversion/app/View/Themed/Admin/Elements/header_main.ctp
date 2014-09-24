        <!-- MAIN HEADER -->
               
        <header id="header">
        	<div id="header-border">
                <div id="header-inner">
                
                    <div class="left">
                 <a href="<?php echo $this->Html->url('/admin/dashboard', true); ?>" id="logo"> <?php $settingRecord = $common->getAdminSetting(); 
				echo $settingRecord['Setting']['title'];
				 ?></a>
                 
                    </div><!-- End .left -->
                    
                    <div class="right">
                        <!-- eMenu -->
                        <nav>
                            <ul class="e-splitmenu" id="header-menu">
                                <!--<li><span>Menu</span><a href="javascript:void(0);"><span class="arrow-down-10 plix-10"></span></a>
                                
                                     <div>
                                        <ul>
                                            <li><a href="index.html"><span class="stats2-10 plix-10"></span> Stats</a></li>
                                            <li><a href="index.html"><span class="lock-10 plix-10"></span> Security</a></li>
                                            <li><a href="index.html"><span class="download-10 plix-10"></span> Downloads</a></li>
                                        </ul>                                      
                                    </div>                               

                                </li>
                                <li><span>Settings</span><a href="javascript:void(0);"><span class="arrow-down-10 plix-10"></span></a>
                                
                                     <div>
                                        <ul>
                                            <li><a href="index.html"><span class="home-10 plix-10"></span> Basic Settings</a></li>
                                            <li><a href="index.html"><span class="settings-10 plix-10"></span> Site Settings</a></li>
                                            <li><a href="index.html"><span class="comment-10 plix-10"></span> User Settings</a></li>
                                            <li><a href="index.html"><span class="bookmark-10 plix-10"></span> Server Settings</a></li>
                                        </ul>                                      
                                    </div>
                                    
                                </li>-->
                        		<li class="e-menu-profile">
                                    <a href="javascript:void(0);"><span class="arrow-down-10 plix-10"></span></a> 
                                     <?php $profile_image = $this->Session->read('UserAuth.User.profile_image');  if(!empty($profile_image)){ ?>
                                 <img src="<?php echo $this->webroot.'user/150x150_'.$this->Session->read('UserAuth.User.profile_image');?>" alt="" />
                                 <?php } else { ?>
                                  <img src="<?php echo Helper::webroot(''); ?>img/avatar.jpg" alt=""/>
                                 
                                 <?php } ?>
                                    
                                    <div>
                                        <ul>
                                       <!--     <li><a href="index.html"><span class="mail-10 plix-10"></span> Inbox</a></li>
                                            <li><a href="index.html"><span class="upload-10 plix-10"></span> Settings</a></li>-->
                                            <li><a href="<?php echo $this->Html->url('/admin/logout', true); ?>"><span class="info-10 plix-10"></span> Logout</a></li>
                                        </ul>                                      
                                    </div> 
                                            
                                </li>
                            </ul>
                        </nav>
                    </div><!-- End .right --> 
                    
                </div><!-- End #header-border --> 
            </div><!-- End #header-inner -->  
                
		</header><!-- End #header -->
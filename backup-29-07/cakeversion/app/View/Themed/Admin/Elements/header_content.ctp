    <!-- CONTENT HEADER -->
                
                <header id="content-header">
                <?php if($this->Session->read('UserAuth.User.user_group_id') && $this->Session->read('UserAuth.User.user_group_id')!='' && $this->Session->read('UserAuth.User.user_group_id')!='27'){ ?>
                    <div class="left">
                    	<a href="javascript:void(0);" id="toggle-mainmenu" class="button-icon tip-s" title="Toggle Main Menu"><span class="arrow-up-10 plix-10"></span></a>
                        
                        <!-- main search form -->
                        <!--<form method="post" id="mainsearch">
                            <input type="text" placeholder="Live search..." name="" autocomplete="off"/>
                            <input type="submit" value="" />
                        </form>-->
                    </div><!-- End .left --> 
					<?php } ?>
                    <div class="right">
                    	<!-- sidebar switch -->
                    	<a href="javascript:void(0);" id="toggle-sidebar" class="button-icon tip-s" title="Switch Main Menu"><span class="arrow-left-10 plix-10"></span></a>
                        
                        <!-- breadcrumbs -->
                        <nav id="main-breadcrumbs">
                            <ul>
                                <li class="bc-tab-first">
                <?php if($this->Session->read('UserAuth.User.user_group_id') && $this->Session->read('UserAuth.User.user_group_id')!='' && $this->Session->read('UserAuth.User.user_group_id')=='27'){ ?>
                				<a href="<?php echo $this->Html->url("/customers/customerDashboard", true); ?>">Home</a>
                <?php }else{ ?>
                                <a href="<?php echo $this->Html->url("/admin/dashboard", true); ?>">Home</a>
                 <?php } ?>               
                                </li>
                                <li class="bc-tab-last"><?php if($this->Session->read('UserAuth.User.user_group_id') && $this->Session->read('UserAuth.User.user_group_id')!='' && $this->Session->read('UserAuth.User.user_group_id')=='27'){ ?>
                				<a href="<?php echo $this->Html->url("/customers/customerDashboard", true); ?>">Dashboard</a>
                <?php }else{ ?>
                                <a href="<?php echo $this->Html->url("/admin/dashboard", true); ?>">Dashboard</a>
                 <?php } ?></li>
                            </ul>          
                        </nav>
                        
                        <!-- demo dialog button -->
                      <!--  <a href="javascript:void(0);" id="open-main-dialog" class="button-text-icon tip-w" title="Some tooltip pointing right"><span class="fullscreen-10 plix-10"></span> Dialog</a>-->
                
                                                                                              
                                      
                        <!-- the main page dialog -->
                        <div id="main-page-dialog" title="Welcome to Elite" style="display:none">
                        <img src="<?php echo Helper::webroot(''); ?>img/jquery-ui-logo.png" alt="" class="dummy-img-dialog"/>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sit amet est et mauris ornare lobortis dignissim quis massa. Donec ullamcorper turpis ac lectus semper commodo. Mauris tincidunt, erat et tempor interdum, dolor metus consectetur dui, eu accumsan augue augue a erat. Fusce justo nibh, tristique vitae pretium ut, venenatis nec felis. Curabitur congue tempor ultricies. Proin quis libero dignissim neque posuere pharetra vel adipiscing massa. Sed sit amet erat ac arcu sodales aliquam. Nam tellus sapien, ornare in tincidunt vel, ultricies id quam.
						</div>
                        
                        <span class="preloader"></span>
                        
                        <!-- widgets controls -->
                        <div id="widgets-controls">
                            <span class="preloader"></span>                       
                            <div class="icon-group"> 
                                <a href="javascript:void(0);" class="changeto-grid selected tip-s" title="Show grid"><span class="grid-10 plix-10"></span></a>
                                <span></span>
                                <a href="javascript:void(0);" class="changeto-rows tip-s" title="Show rows"><span class="rows-10 plix-10"></span></a>
                            </div>
                            
                            <!-- widgets management switch -->
                            <a href="javascript:void(0);" class="button-icon tip-s" title="Manage widgets" id="powerwidget-panel-switch"><span class="settings-10 plix-10"></span></a>
                        </div>
                    </div><!-- End .right -->                
                
				</header><!-- End #content-header --> 
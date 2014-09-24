<!-- CONTENT FOOTER -->
                
                <footer id="content-footer">
                    <!--<div class="left">
						<div class="left">
                               <a href="javascript:void(0);" class="button-icon tip-s" title="Some action">
                                  <span class="folder-10 plix-10"></span>
                              </a>                                                        
                              <a href="javascript:void(0);" class="button-icon tip-s" title="Some action">
                                  <span class="pencil-10 plix-10"></span>
                              </a>
                          </div>
                          <div class="right">
                              <a href="javascript:void(0);" class="button-icon tip-s" title="Some action">
                                  <span class="refresh-10 plix-10"></span>
                              </a> 
                          </div> 
                    </div>-->
                    
                    <!-- End .left --> 
                    <div class="right">
                    	<div class="left">
                    	 <?php $settingRecord = $common->getAdminSetting(); 
				echo $settingRecord['Setting']['copyright'];
				 ?>
                        </div><!-- End .left -->
                        <div class="right">
                        	<div class="theme-version"></div>
                        </div><!-- End .right -->
                    </div><!-- End .right -->                
                </footer><!-- End #content-footer -->     
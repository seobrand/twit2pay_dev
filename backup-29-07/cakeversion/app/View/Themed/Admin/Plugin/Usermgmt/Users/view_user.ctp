<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<style type="text/css">
td
{
line-height:24px!important; 
}
</style>
<div id="powerwidgetspanel" class="powerwidgetspanel">
                                <header>
                                    <h2>Power widgets panel</h2>
                                </header>
 <div class="powerwidgetspanel-widget" data-widget-id="widget1">
                                    <input type="checkbox"/>
                                 
                                </div>
                                </div>
                                <br/>
                                <section class="g_1">

                                <!-- New widget -->
                                
                                 <div class="powerwidget" id="widget1">
                                 <!--   <header>
                                    	<h2><?php echo __('My Profile'); ?></h2>                                  
                                    </header>-->
                                    <div> 
                                
                           
                                                <table class="clean-table" id="clean-table" >
                                                <thead>
							<tr>
								<th colspan="2"> User Detail</th>
								
							</tr>
						</thead>
					<tbody>
			<?php       if (!empty($user)) { ?>
							<tr>
								<td><strong><?php echo __('User Id');?></strong></td>
								<td><?php echo $user['User']['id']?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('User Group');?></strong></td>
								<td><?php echo h($user['UserGroup']['name'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Twitter Name');?></strong></td>
								<td><?php echo h($user['User']['twit_name'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Name');?></strong></td>
								<td><?php echo h($user['User']['name'])?></td>
							</tr>
							
							<tr>
								<td><strong><?php echo __('Email');?></strong></td>
								<td><?php echo h($user['User']['email'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Email Verified');?></strong></td>
								<td><?php
										if ($user['User']['email_verified']) {
											echo 'Yes';
										} else {
											echo 'No';
										} ?>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo __('Status');?></strong></td>
								<td><?php
										if ($user['User']['active']) {
											echo 'Active';
										} else {
											echo 'Inactive';
										} ?>
								</td>
							</tr>
							<tr>
								<td><strong><?php echo __('Ip Address');?></strong></td>
								<td><?php echo h($user['User']['ip_address'])?></td>
							</tr>
							<tr>
								<td><strong><?php echo __('Created');?></strong></td>
								<td><?php echo date('d-M-Y',strtotime($user['User']['created']))?></td>
							</tr>
				<?php   } else {
							echo "<tr><td colspan=2><br/><br/>No Data</td></tr>";
						} ?>
					</tbody>
				</table>                                                                              
                              
                                                                                   
                                 	</div>
                                </div><!-- End .powerwidget -->

							</section>
                            
                            <div class="clear"><!-- New row --></div>
                            
                            
                            
                            
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
<br/>
 <div class="powerwidget" id="widget3">
                                    <header>
                                    	<h2><?php echo $tableName;  ?></h2>                                  
                                    </header>
                                    <div> 
              <?php
						$this->Grid->addColumn('Group Id', '/UserGroup/id', array('paginate'=>true),'id');			
						$this->Grid->addColumn('Name', '/UserGroup/name', array('paginate'=>true),'name');			 
						$this->Grid->addColumn('Alias Name', '/UserGroup/alias_name', array('paginate'=>true),'alias_name');												
						$this->Grid->addColumn('Allow Registration', '/UserGroup/allowRegistration', array('paginate'=>true),'allowRegistration');
                        $this->Grid->addColumn('Created', '/UserGroup/created', array('paginate'=>true),'created');
						
                        $this->Grid->addAction('<span class="pencil-10 plix-10"></span>', array('plugin' => 'usermgmt','controller' => 'UserGroups', 'action' => 'editGroup'), array('/UserGroup/id'),array('class'=>'button-icon tip-s','title'=>'Edit group','escape'=>false));
						
						$this->Grid->addAction('<span class="trashcan-10 plix-10"></span>', array('plugin' => 'usermgmt','controller' => 'UserGroups', 'action' => 'deleteGroup'), array('/UserGroup/id'),array('class'=>'button-icon tip-s','title'=>'Delete group','escape'=>false,'confirm' => __('Are you sure you want to delete this group? Delete it your own risk')));
						
							
						
						echo $this->Grid->generate($userGroups);
				?>
				</div></div>
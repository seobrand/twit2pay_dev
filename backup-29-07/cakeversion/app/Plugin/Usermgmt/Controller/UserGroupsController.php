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
App::uses('UserMgmtAppController', 'Usermgmt.Controller');
class UserGroupsController extends UserMgmtAppController {
	public $theme = 'Admin';
	public $uses = array('Usermgmt.UserGroup', 'Usermgmt.User');
	
	
	/**
	 * Used to view all groups by Admin
	 *
	 * @access public
	 * @return array
	 */
	public function index() {
		$this->UserGroup->unbindModel( array('hasMany' => array('UserGroupPermission')));
		
		$this->paginate	= array('order'=>'UserGroup.id desc','limit'=>'10');
		$userGroups =$this->paginate('UserGroup');
		
		$this->set('userGroups', $userGroups);
		
		
		$this->set('totalRecords', count($userGroups));
		$this->set('tableName','All User Groups');
	}
	
	
	
	/**
	 * Used to add group on the site by Admin
	 *
	 * @access public
	 * @return void
	 */
	public function addGroup() {
		$enableAjax = true;
		
		$success = __('The group is successfully added.');
		$error = __('Error in adding the group.');
		
		$this->set('tableName','Add User Groups');
		
		if($enableAjax){
			$this->set('enableAjax','yes');
		}else{
			$this->set('enableAjax','no');
		}
		
		
		
		if ($this->request -> isPost()) {	
			
			if ($this->UserGroup->addValidate()) {
				
				$this->UserGroup->save($this->request->data,false);
				
				if(!$enableAjax){				
					$this->Session->setFlash($success, 'Dialogs/enotify/growl/top_right', array('type'=>'info'), 'top_right');					
					$this->redirect('/admin/addGroup');
				}else{
					echo $success;
				}
			}
			
			if(!$enableAjax){				
				$this->UserGroup->set($this->data);				
			}else{				
				$this->autoRender = false;				
			}
		}
	}
	
	
	/**
	 * Used to edit group on the site by Admin
	 *
	 * @access public
	 * @param integer $groupId group id
	 * @return void
	 */
	public function editGroup($groupId=null) {
		$enableAjax = true;
		$success = __('The group is successfully updated.');
		$error = __('Error in updating the group.');
		
		$this->set('tableName','Edit User Groups');
		
		if($enableAjax){
			$this->set('enableAjax','yes');
		}else{
			$this->set('enableAjax','no');
		}
		
		
		if (!empty($groupId)) {
			if ($this->request -> isPut()) {
				if(!$enableAjax){
					$this->UserGroup->set($this->data);
				}
				if ($this->UserGroup->addValidate()) {
					$this->UserGroup->save($this->request->data,false);
					
					if(!$enableAjax){
						$this->Session->setFlash($success, 'Dialogs/enotify/growl/top_right', array('type'=>'success'), 'top_right');		
						$this->redirect('/admin/allGroups');
					}else{
						echo $success;
						$this->autoRender = false;	
					}
				}
			} else {			
					$this->request->data = $this->UserGroup->read(null, $groupId);
			}
		} else {
			if(!$enableAjax){
				$this->redirect('/admin/allGroups');
			}else{
				echo $error;
			}
		}
	}
	
	
	/**
	 * Used to delete group on the site by Admin
	 *
	 * @access public
	 * @param integer $userId group id
	 * @return void
	 */
	public function deleteGroup($groupId = null) {
		$success = __('Group is successfully deleted');
		$error = __('Sorry some users are associated with this group, You cannot delete');
		
		if (!empty($groupId)) {
		//	if ($this->request -> isPost()) {
				$users=$this->User->isUserAssociatedWithGroup($groupId);
					if($users) {
					$this->Session->setFlash($error, 'Dialogs/enotify/growl/top_right', array('type'=>'error'), 'top_right');
					$this->redirect('/admin/allGroups');
				}
				if ($this->UserGroup->delete($groupId, false)) {
					$this->Session->setFlash($success, 'Dialogs/enotify/growl/top_right', array('type'=>'success'), 'top_right');
				}
		//	}
			$this->redirect('/admin/allGroups');
		} else {
			$this->redirect('/admin/allGroups');
		}
	}
}
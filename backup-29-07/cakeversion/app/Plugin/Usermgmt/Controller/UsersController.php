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

class UsersController extends UserMgmtAppController {
	public $theme = 'Admin';
	
	
	/**
	 * This controller uses following models
	 *
	 * @var array
	 */
	public $helpers = array('Js','Html','Javascript','Text','Paginator','Ajax');
	public $uses = array('Usermgmt.User', 'Usermgmt.UserGroup', 'Usermgmt.LoginToken');
	public $components = array('RequestHandler');
	
	/**
	 * Called before the controller action.  You can use this method to configure and customize components
	 * or perform logic that needs to happen before each controller action.
	 *
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->User->userAuth=$this->UserAuth;
	}
	/**
	 * Used to display all users by Admin
	 *
	 * @access public
	 * @return array
	 */
	public function index() {
		
		$this->User->unbindModel( array('hasMany' => array('LoginToken')));
		$this->set('tableName','All Users');
			$this->set('usergroups', $this->UserGroup->find('list',array('conditions'=>array('UserGroup.id !=1'),'fields'=>array('UserGroup.id','UserGroup.name'),'order'=>'UserGroup.id desc')));
		
		
		 if ($this->RequestHandler->isAjax() && isset($this->request->data['Search'])) {
		 $twit_name = $this->request->data['Search']['twit_name'];
			 $email = $this->request->data['Search']['email'];
			 $conditions ='';
			 if(!empty($twit_name))
			 {
				$conditions.='User.twit_name like "%'.$twit_name.'%" ';	 
			 }
			 if(!empty($email))
			 {	
			 	if(!empty($conditions)) $conditions.=' OR ';
				$conditions.='User.email like "%'.$email.'%"';	 
			 }
			$this->paginate	= array('conditions'=>$conditions,'order'=>'User.id desc','limit'=>'15');
			$users =$this->paginate('User');
			$this->set('users', $users);
			$this->set('totalRecords', count($this->User->find('all',array('conditions'=>$conditions,'order'=>'User.id desc'))));
			$this->viewPath = 'Elements' . DS . 'usertable';
            $this->render('index', 'ajax');
		 }
		 else
		 {
			 $this->paginate	= array('order'=>'User.id desc','limit'=>'15');
			 $users =$this->paginate('User');
			
			 $this->set('users', $users);
			 $this->set('totalRecords', count($this->User->find('all',array('order'=>'User.id desc'))));
		 }
		 
		 
		 
		 if ($this->RequestHandler->isAjax()) {
            //Configure:write('debug', 0);
			$this->layout = 'ajax';
            $this->viewPath = 'Elements' . DS . 'usertable';
            $this->render('index', 'ajax');
      	  }
		  
	}
	/**
	 * Used to display detail of user by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return array
	 */
	public function viewUser($userId=null) {
		if (!empty($userId)) {
			$user = $this->User->read(null, $userId);
			$this->set('user', $user);
		} else {
			$this->redirect('/allUsers');
		}
	}
	/**
	 * Used to display detail of user by user
	 *
	 * @access public
	 * @return array
	 */
	public function myprofile() {
		$userId = $this->UserAuth->getUserId();
		$user = $this->User->read(null, $userId);
		$this->set('user', $user);
	}
	/**
	 * Used to logged in the site
	 *
	 * @access public
	 * @return void
	 */
	public function login() {
		$this->layout = 'default_login';
		
		$userId = $this->UserAuth->getUserId();
		if ($userId) {
			$this->redirect(FULL_BASE_URL.router::url('/',false).'admin/dashboard');
		}
		
		if ($this->request -> isPost()) {
			$this->User->set($this->data);
			if($this->User->LoginValidate()) {
				$email  = $this->data['User']['email'];
				$password = $this->data['User']['password'];

				$user = $this->User->findByUsername($email);
				if (empty($user)) {
					$user = $this->User->findByEmail($email);
					if (empty($user)) {
						$this->Session->setFlash(__('Incorrect Email/Username or Password'), 'Dialogs/dialogs/basic', array('type'=>'error'), 'dialogs_basic');					
						return;
					}
				}
				// check for inactive account
				if ($user['User']['id'] != 1 and $user['User']['active']==0) {					
					$this->Session->setFlash(__('Sorry your account is not active, please contact to Administrator'), 'Dialogs/dialogs/basic', array('type'=>'info'), 'dialogs_basic');					
					return;
				
				}
				// check for verified account
				if ($user['User']['id'] != 1 and $user['User']['email_verified']==0) {
					
					$this->Session->setFlash(__('Your registration has not been confirmed please verify your email or contact to Administrator'), 'Dialogs/dialogs/basic', array('type'=>'info'), 'dialogs_basic');					
					return;
				}
				if(empty($user['User']['salt'])) {
					$hashed = md5($password);
				} else {
					$hashed = $this->UserAuth->makePassword($password, $user['User']['salt']);
				}
				if ($user['User']['password'] === $hashed) {
					if(empty($user['User']['salt'])) {
						$salt=$this->UserAuth->makeSalt();
						$user['User']['salt']=$salt;
						$user['User']['password']=$this->UserAuth->makePassword($password, $salt);
						$this->User->save($user,false);
					}
					$this->UserAuth->login($user);
					$remember = (!empty($this->data['User']['remember']));
					if ($remember) {
						$this->UserAuth->persist('2 weeks');
					}
					$OriginAfterLogin=$this->Session->read('Usermgmt.OriginAfterLogin');
					$this->Session->delete('Usermgmt.OriginAfterLogin');
					
					if(isset($user['User']['user_group_id']) && $user['User']['user_group_id']!='' && $user['User']['user_group_id']==27)
						$redirect = FULL_BASE_URL.router::url('/',false).'customers/customerDashboard';
					else
						$redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : LOGIN_REDIRECT_URL;
					$this->redirect($redirect);
				} else {
					$this->Session->setFlash(__('Incorrect Email/Username or Password'), 'Dialogs/dialogs/basic', array('type'=>'error'), 'dialogs_basic');					
					return;
				}
			}
		}
	}
	/**
	 * Used to logged out from the site
	 *
	 * @access public
	 * @return void
	 */
	public function logout() {
		$this->UserAuth->logout();
		$this->Session->setFlash(__('You are successfully signed out'));
		$this->redirect(LOGOUT_REDIRECT_URL);
	}
	/**
	 * Used to register on the site
	 *
	 * @access public
	 * @return void
	 */
	public function register() {
		$userId = $this->UserAuth->getUserId();
		if ($userId) {
			$this->redirect("/dashboard");
		}
		if (SITE_REGISTRATION) {
			$userGroups=$this->UserGroup->getGroupsForRegistration();
			$this->set('userGroups', $userGroups);
			if ($this->request -> isPost()) {
				if(USE_RECAPTCHA && !$this->RequestHandler->isAjax()) {
					$this->request->data['User']['captcha']= (isset($this->request->data['recaptcha_response_field'])) ? $this->request->data['recaptcha_response_field'] : "";
				}
				$this->User->set($this->data);
				if ($this->User->RegisterValidate()) {
					if (!isset($this->data['User']['user_group_id'])) {
						$this->request->data['User']['user_group_id']=DEFAULT_GROUP_ID;
					} elseif (!$this->UserGroup->isAllowedForRegistration($this->data['User']['user_group_id'])) {
						$this->Session->setFlash(__('Please select correct register as'));
						return;
					}
					$this->request->data['User']['active']=1;
					if (!EMAIL_VERIFICATION) {
						$this->request->data['User']['email_verified']=1;
					}
					$ip='';
					if(isset($_SERVER['REMOTE_ADDR'])) {
						$ip=$_SERVER['REMOTE_ADDR'];
					}
					$this->request->data['User']['ip_address']=$ip;
					$salt=$this->UserAuth->makeSalt();
					$this->request->data['User']['salt'] = $salt;
					$this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
					$this->User->save($this->request->data,false);
					$userId=$this->User->getLastInsertID();
					$user = $this->User->findById($userId);
					if (SEND_REGISTRATION_MAIL && !EMAIL_VERIFICATION) {
						$this->User->sendRegistrationMail($user);
					}
					if (EMAIL_VERIFICATION) {
						$this->User->sendVerificationMail($user);
					}
					if (isset($this->request->data['User']['email_verified']) && $this->request->data['User']['email_verified']) {
						$this->UserAuth->login($user);
						$this->redirect('/');
					} else {
						$this->Session->setFlash(__('Please check your mail and confirm your registration'));
						$this->redirect('/register');
					}
				}
			}
		} else {
			$this->Session->setFlash(__('Sorry new registration is currently disabled, please try again later'));
			$this->redirect('/admin/login');
		}
	}
	/**
	 * Used to change the password by user
	 *
	 * @access public
	 * @return void
	 */
	public function changePassword() {
		$userId = $this->UserAuth->getUserId();
		if ($this->request -> isPost()) {
			$this->User->set($this->data);
			if ($this->User->RegisterValidate()) {
				$user=array();
				$user['User']['id']=$userId;
				$salt=$this->UserAuth->makeSalt();
				$user['User']['salt'] = $salt;
				$user['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
				$this->User->save($user,false);
				$this->LoginToken->deleteAll(array('LoginToken.user_id'=>$userId), false);
				$this->Session->setFlash(__('Password changed successfully'));
				$this->redirect('/admin/dashboard');
			}
		}
	}
	/**
	 * Used to change the user password by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function changeUserPassword($userId=null) {
		if (!empty($userId)) {
			$name=$this->User->getNameById($userId);
			$success = __('Password for %s changed successfully', $name);
			$error = __('Password not changed due to some error.');
			$this->set('name', $name);
			if ($this->request -> isPost()) {
				$this->User->set($this->data);
				if($this->User->RegisterValidate()) {
					$user=array();
					$user['User']['id']=$userId;
					$salt=$this->UserAuth->makeSalt();
					$user['User']['salt'] = $salt;
					$user['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
					$this->User->save($user,false);
					$this->LoginToken->deleteAll(array('LoginToken.user_id'=>$userId), false);
					$this->Session->setFlash($success, 'Dialogs/enotify/growl/top_right', array('type'=>'success'), 'top_right');
					$this->redirect('/admin/allUsers');
				}
			}
		} else {
			$this->redirect('/admin/allUsers');
		}
	}
	/**
	 * Used to add user on the site by Admin
	 *
	 * @access public
	 * @return void
	 */
	public function addUser() {
		$success = __('The user is successfully added');
		$this->set('tableName','Add User');
		$userGroups=$this->UserGroup->getGroups();
		$this->set('userGroups', $userGroups);
		if ($this->request->isPost()) {
			
			
			$this->User->set($this->data);
			if ($this->User->RegisterValidate()) {
			
				
				
				App::import('Vendor', 'Uploader.Uploader');
				$this->Uploader = new Uploader();
				$this->Uploader->setup(array('tempDir' => TMP,'uploadDir'=>'user'));
				
				$fileUploadPath=$this->Uploader->upload($this->request->data['User']['profile_image'],array('prepend'=>time().'_','overwrite'=>true));  
				if($fileUploadPath){
				$this->Uploader->resize(array('width' => '150','height' => '150','prepend'=>"150x150_".time()."_",'append'=>false,'aspect'=>false,'expand'=>false));
				$this->request->data['User']['profile_image'] 	=  end(explode('/',$fileUploadPath['path']));
				}
				
				
				$this->request->data['User']['email_verified']=1;
				$this->request->data['User']['active']=1;
				$salt=$this->UserAuth->makeSalt();
				$this->request->data['User']['salt'] = $salt;
				$this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
				
				if($this->request->data['User']['profile_image']['name'])
				{
					
				}else
				{
					
					unset($this->request->data['User']['profile_image']);
					
					$this->request->data['User']['profile_image']='';
				}
				
				
				
				$this->User->save($this->request->data,false);
				$this->Session->setFlash($success, 'Dialogs/enotify/growl/top_right', array('type'=>'success'), 'top_right');
				$this->redirect('/admin/allUsers');
			}
		}
	}
	/**
	 * Used to edit user on the site by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function editUser($userId=null) {
		$this->set('tableName','Edit User');
		if (!empty($userId)) {
			$userGroups=$this->UserGroup->getGroups();
			$this->set('userGroups', $userGroups);
			if ($this->request -> isPut()) {
				$this->User->set($this->data);
				
				/* if($this->request->data['User']['profile_image']['name']=='')
				unset($this->request->data['User']['profile_image']); */
				
				if ($this->User->RegisterValidate()) {
					
					//$image_dt =$this->request->data['User']['profile_image'];
						$old_dt =$this->User->find('first',array('conditions'=>array('User.id'=> $userId )));	
					/* if(!empty($this->request->data['User']['profile_image']['name']))
					{
									
						// upload project image
						
						App::import('Vendor', 'Uploader.Uploader');
						$this->Uploader = new Uploader();
						$this->Uploader->setup(array('tempDir' => TMP,'uploadDir'=>'user'));
						
						$fileUploadPath=$this->Uploader->upload($image_dt,array('prepend'=>time().'_','overwrite'=>true));  
						if($fileUploadPath){
						$this->Uploader->resize(array('width' => '150','height' => '150','prepend'=>"150x150_".time()."_",'append'=>false,'aspect'=>false,'expand'=>false));
						$this->request->data['User']['profile_image']	=  end(explode('/',$fileUploadPath['path']));
						
						// del old image
						
						if(file_exists('user/'.$old_dt['User']['profile_image']))
						{
									unlink('user/'.$old_dt['User']['profile_image']);
									unlink('user/150x150_'.$old_dt['User']['profile_image']);
						}
						
						}
					
					}
					else
					{
						$this->request->data['User']['profile_image'] = $old_dt['User']['profile_image'];
						
					} */
					
					/* if(empty($this->request->data['User']['password']))
					{
					$this->request->data['User']['password'] = $old_dt['User']['password'];
					}
					else { 
					$user['User']['id']=$userId;
					$salt=$this->UserAuth->makeSalt();
					$this->request->data['User']['salt'] = $salt;
						if(isset($this->request->data['User']['password']))
						{
						$this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
						}
					} */
					
					
					
					$this->User->save($this->request->data,false);
					$this->Session->setFlash(__('The user is successfully updated'));
					$this->redirect($this->referer());
				}
			} else {
				$user = $this->User->read(null, $userId);
				$this->request->data=null;
				if (!empty($user)) {
					$user['User']['password']='';
					$this->request->data = $user;
				}
			}
		} else {
			$this->redirect('/admin/allUsers');
		}
	}
	/**
	 * Used to delete the user by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function deleteUser($userId = null) {
		$success = __('User is successfully deleted');
		$error = __('You cannot delete this user');
		if (!empty($userId)) {
		//	if ($this->request -> isPost()) {
				if ($this->User->delete($userId, false)) {
					$this->LoginToken->deleteAll(array('LoginToken.user_id'=>$userId), false);
					$this->Session->setFlash($success, 'Dialogs/enotify/growl/top_right', array('type'=>'success'), 'top_right');
				}
		//	}
			$this->redirect('/admin/allUsers');
		} else {
			$this->redirect('/admin/allUsers');
		}
	}
	/**
	 * Used to show dashboard of the user
	 *
	 * @access public
	 * @return array
	 */
	public function dashboard() {
		$userId=$this->UserAuth->getUserId();
		$user = $this->User->findById($userId);
		$this->set('user', $user);
		
	}
	/**
	 * Used to activate or deactivate user by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @param integer $active active or inactive
	 * @return void
	 */
	public function makeActiveInactive($userId = null, $active=0) {
		if (!empty($userId)) {
			$user=array();
			$user['User']['id']=$userId;
			$user['User']['active']=($active) ? 1 : 0;
			$this->User->save($user,false);
			if($active) {
				$this->Session->setFlash(__('User is successfully activated'));
			} else {
				$this->Session->setFlash(__('User is successfully deactivated'));
			}
		}
		$this->redirect('/admin/allUsers');
	}
	/**
	 * Used to verify email of user by Admin
	 *
	 * @access public
	 * @param integer $userId user id of user
	 * @return void
	 */
	public function verifyEmail($userId = null) {
		$success = __('User email is successfully verified');
		$error = __('Mail not sent.');
		if (!empty($userId)) {
			$user=array();
			$user['User']['id']=$userId;
			$user['User']['email_verified']=1;
			$this->User->save($user,false);
			$this->Session->setFlash($success, 'Dialogs/enotify/growl/top_right', array('type'=>'success'), 'top_right');
		}
		$this->redirect('/admin/allUsers');
	}
	/**
	 * Used to show access denied page if user want to view the page without permission
	 *
	 * @access public
	 * @return void
	 */
	public function accessDenied() {

	}
	/**
	 * Used to verify user's email address
	 *
	 * @access public
	 * @return void
	 */
	public function userVerification() {
		if (isset($_GET['ident']) && isset($_GET['activate'])) {
			$userId= $_GET['ident'];
			$activateKey= $_GET['activate'];
			$user = $this->User->read(null, $userId);
			if (!empty($user)) {
				if (!$user['User']['email_verified']) {
					$password = $user['User']['password'];
					$theKey = $this->User->getActivationKey($password);
					if ($activateKey==$theKey) {
						$user['User']['email_verified']=1;
						$this->User->save($user,false);
						if (SEND_REGISTRATION_MAIL && EMAIL_VERIFICATION) {
							$this->User->sendRegistrationMail($user);
						}
						$this->Session->setFlash(__('Thank you, your account is activated now'));
					}
				} else {
					$this->Session->setFlash(__('Thank you, your account is already activated'));
				}
			} else {
				$this->Session->setFlash(__('Sorry something went wrong, please click on the link again'));
			}
		} else {
			$this->Session->setFlash(__('Sorry something went wrong, please click on the link again'));
		}
		$this->redirect('/admin/login');
	}
	/**
	 * Used to send forgot password email to user
	 *
	 * @access public
	 * @return void
	 */
	public function forgotPassword() {
		
		$this->layout = 'default_login';
		if ($this->request -> isPost()) {
			$this->User->set($this->data);
			if ($this->User->LoginValidate()) {
				$email  = $this->data['User']['email'];
				$user = $this->User->findByUsername($email);
				if (empty($user)) {
					$user = $this->User->findByEmail($email);
					if (empty($user)) {
						$this->Session->setFlash(__('Incorrect Email/Username'));
						return;
					}
				}
				// check for inactive account
				if ($user['User']['id'] != 1 and $user['User']['email_verified']==0) {
					$this->Session->setFlash(__('Your registration has not been confirmed yet please verify your email before reset password'));
					return;
				}
				$this->User->forgotPassword($user);
				$this->Session->setFlash(__('Please check your mail for reset your password'));
				$this->redirect('/admin/login');
			}
		}
	}
	/**
	 *  Used to reset password when user comes on the by clicking the password reset link from their email.
	 *
	 * @access public
	 * @return void
	 */
	public function activatePassword() {
		if ($this->request -> isPost()) {
			if (!empty($this->data['User']['ident']) && !empty($this->data['User']['activate'])) {
				$this->set('ident',$this->data['User']['ident']);
				$this->set('activate',$this->data['User']['activate']);
				$this->User->set($this->data);
				if ($this->User->RegisterValidate()) {
					$userId= $this->data['User']['ident'];
					$activateKey= $this->data['User']['activate'];
					$user = $this->User->read(null, $userId);
					if (!empty($user)) {
						$password = $user['User']['password'];
						$thekey =$this->User->getActivationKey($password);
						if ($thekey==$activateKey) {
							$user['User']['password']=$this->data['User']['password'];
							$salt=$this->UserAuth->makeSalt();
							$user['User']['salt'] = $salt;
							$user['User']['password'] = $this->UserAuth->makePassword($user['User']['password'], $salt);
							$this->User->save($user,false);
							$this->Session->setFlash(__('Your password has been reset successfully'));
							$this->redirect('/admin/login');
						} else {
							$this->Session->setFlash(__('Something went wrong, please send password reset link again'));
						}
					} else {
						$this->Session->setFlash(__('Something went wrong, please click again on the link in email'));
					}
				}
			} else {
				$this->Session->setFlash(__('Something went wrong, please click again on the link in email'));
			}
		} else {
			if (isset($_GET['ident']) && isset($_GET['activate'])) {
				$this->set('ident',$_GET['ident']);
				$this->set('activate',$_GET['activate']);
			}
		}
	}
	/**
	 * Used to send email verification mail to user
	 *
	 * @access public
	 * @return void
	 */
	public function emailVerification() {
		if ($this->request -> isPost()) {
			$this->User->set($this->data);
			if ($this->User->LoginValidate()) {
				$email  = $this->data['User']['email'];
				$user = $this->User->findByUsername($email);
				if (empty($user)) {
					$user = $this->User->findByEmail($email);
					if (empty($user)) {
						$this->Session->setFlash(__('Incorrect Email/Username'));
						return;
					}
				}
				if($user['User']['email_verified']==0) {
					$this->User->sendVerificationMail($user);
					$this->Session->setFlash(__('Please check your mail to verify your email'));
				} else {
					$this->Session->setFlash(__('Your email is already verified'));
				}
				$this->redirect('/admin/login');
			}
		}
	}
	
	function exportAll() {
		
		$this->autoRender = false;
     	
		$results = $this->User->find('all',array('conditions'=>array('User.id !='=> '1')));
	//	$results = $this->User->find('all',array('conditions'=>array('User.user_group_id'=> $this->request->data['user_group_id'])));
		ini_set('max_execution_time', 600); //increase max_execution_time to 10 min if data set is very large
		
		//create a file
		$filename = "User_list_".date("Y.m.d").".csv";
		$csv_file = fopen('php://output', 'w');
		
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename="'.$filename.'"');


	// The column headings of your .csv file
		$header_row = array("first_name","last_name","username","email","name");
		fputcsv($csv_file,$header_row,',','"');
	
	// Each iteration of this while loop will be a row in your .csv file where each field corresponds to the heading of the column
	foreach($results as $result)
	{ // Array indexes correspond to the field names in your db table(s)
		$row = array(
			
			$result['User']['first_name'],
			$result['User']['last_name'],
			$result['User']['username'],
			$result['User']['email'],
			$result['UserGroup']['name']
			
		);
		
		fputcsv($csv_file,$row,',','"');
	}
	
	fclose($csv_file);die;


	}
	
	
	
		
	
	
	
	
}
<?php

App::uses('AppController', 'Controller');
App::import('Vendor', 'OAuth/OAuthClient');
class TwittersController extends AppController {
	public $theme = 'Front';
	
	public $uses = array('Usermgmt.User', 'Usermgmt.UserGroup', 'Usermgmt.LoginToken');
	public $components = array('RequestHandler','common');
	
	/**
	 * configur key
	 *
	 * @var string
	 */
	var $configureKey='User';
	
	public function index() {
		$this->autoRender = false;
		  	
		$client = $this->_createClient();
		$requestToken = $client->getRequestToken('https://api.twitter.com/oauth/request_token', Router::url(array("controller" => 'twitters', 'action'=> 'callback'), true));
		if ($requestToken) {
		   $this->Session->write('twitter_request_token', $requestToken);
		   $this->redirect('https://api.twitter.com/oauth/authorize?oauth_token=' . $requestToken->key . '&force_login=true');
		}else {
		  // an error occured when obtaining a request token
		}
	}
	
	public function callback() {
		
	  $this->layout = '';
	  $requestToken = $this->Session->read('twitter_request_token');
	  $client = $this->_createClient();
	  $accessToken = $client->getAccessToken('https://api.twitter.com/oauth/access_token', $requestToken);
	  
	  if ($accessToken) {
	    $response = $client->get($accessToken->key, $accessToken->secret,  'https://api.twitter.com/1/account/verify_credentials.json', array() );
	    if ( ! is_object( $response ) )
	    {
	    	throw new Exception( "User profile request failed! {$this->providerId} api returned an invalid response.", 6 );
	    }
	    // check the last HTTP status code returned
	    if ( $response->code != 200 )
	    {
	    	throw new Exception( "User profile request failed! {$this->providerId} returned an error: " . $client->lastErrorMessageFromStatus(), 6 );
	    }
	    
	    $user = json_decode($response->body);
	    
	    if($this->_checkUser($user)){
	    	$this->_loginUser($user->id);
	    } else{
	    	$this->_registerUser($user);
	    }
	    
	    $this->set("twitter_details",'1');
	  }
	  else{
	  	$this->set('twitter_details', '0');
	  }
	  
	}
	
	private function _createClient() {
	  return new OAuthClient('9LdFSG6VxgWsFME5BtCiA', 'y5CDiLYCz59b083OVyMgehuMn7KYoOZXCU7Tmns9Hk');
	}
	
	
	/* 
	 * Register new user
	 *  */
	private function _registerUser($user = array()){
		$data = array();
		if(!empty($user)){
			 $userGroupId = $this->common->getUserGroupId($this->configureKey);
			 $data['User']['user_group_id'] = $userGroupId['UserGroup']['id'];
			 $data['User']['active'] = 1;
			if (!EMAIL_VERIFICATION) {
				$data['User']['email_verified'] = 1;
			}
			$ip='';
			if(isset($_SERVER['REMOTE_ADDR'])) {
				$ip=$_SERVER['REMOTE_ADDR'];
			}
			$data['User']['ip_address'] = $ip;
			$salt=$this->UserAuth->makeSalt();
			$data['User']['salt'] = $salt;
			$password = date("j/M/Y", strtotime($user->created_at));
			$data['User']['password'] = $this->UserAuth->makePassword( $password, $salt);
			$data['User']['username'] = $user->id;
			$data['User']['name'] = $user->name;
			$data['User']['twit_name'] = $user->screen_name;
			$data['User']['registered'] = 0;
			$data['User']['reg_step'] = serialize(array('controller' => 'registrations', 'action' => 'stepOne'));
				
			$this->User->save( $data , false );
			
			$this->_loginUser($data['User']['username']);
		}
	}
	/* 
	 * Check User exists or not
	 *  */
	private function _checkUser($user = array()){
		if(!empty($user)){
			 $existing_user = $this->User->find('first', array('conditions' => array('User.username' => $user->id)));
			 if(!empty($existing_user)){
			 	return true;
			 }
		}
		return false;
	}
	/* 
	 * Login in User
	 *  */
	private function _loginUser($username = ''){
		$data = $this->User->find('first', array('conditions' => array('User.username' => $username)));
		if(!empty($data)){
			$this->UserAuth->login($data);
		}
	}
	
}
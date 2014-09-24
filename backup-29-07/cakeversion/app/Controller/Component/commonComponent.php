<?php
/**************************************************************************
 Coder  : Apurav
 Object : Component for common functions
**************************************************************************/ 
class commonComponent extends Component {
	var $components = array('Auth','Session');
	var $catArr 	= array();
	/** Function to get time stamp in unix timestamp format **/
	function getTimeStamp() {
		return mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'));
	}  
	/** Function to get time stamp after years
	 @param int - number of year default is 1
	 return timestamp after some year  ***/
	function getTimeStampAfterYear($years=1) {
		return mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y')+$years);
	} 
	/* Function to get time stamp after some time or days or month letter */
	function getTimeStampLaterDates($days=0,$months=0,$years=0) {
		return mktime(date('H'),date('i'),date('s'),date('m')+$months,date('d')+$days,date('Y')+$years);
	}   
	/*** Create a random string
	 * @param	int $length - length of the returned number
	 * @return	string - string ***/
	function randomString($length = 8)	{
		$pass = "";
		// possible password chars.
		$chars = array("a","A","b","B","c","C","d","D","e","E","f","F","g","G","h","H","i","I","j","J",
			   "k","K","l","L","m","M","n","N","o","O","p","P","q","Q","r","R","s","S","t","T",
			   "u","U","v","V","w","W","x","X","y","Y","z","Z","1","2","3","4","5","6","7","8","9");
		for($i=0 ; $i < $length ; $i++) {
			$pass .= $chars[mt_rand(0, count($chars) -1)];
		}
		return $pass;
	}
	
	/* function getCountryList()  // get all department list from Jobposting department
	{
		APP::import('Model','Country');
		$this->Country = new Country();
		return $this->Country->find('list',array('fields'=>'id,name', 'order'=>'Country.name asc'));
	} */
	
	function getStateList()  // get all department list from Jobposting department
	{
		APP::import('Model','State');
		$this->State = new State();
		return $this->State->find('list',array('fields'=>'state_abrev ,state_name', 'order'=>'State.state_name asc'));
	}
	
	
	function getAdminSetting()  // get admin setting
	{
		APP::import('Model','Setting');
		$this->Setting = new Setting();
		return $this->Setting->find('first',array('condition'=>array('Setting.id'=>'1')));
	}	
	
	function isUserGroupAccesss($controller,$action,$userGroupId) {
		App::import("Model", "Usermgmt.UserGroup");
		$this->userGroupModel = new UserGroup;
		return $this->userGroupModel->isUserGroupAccess($controller, $action, $userGroupId);
	}
	
	
	// get site settings 
	function getSetting(){  // get all project list
		APP::import('Model','Setting');
		$this->Setting = new Setting();
		return $this->Setting->find('first');
	}
	
	
	
	function getEmailTemplate($emailId = null) {  // get latest project list
		APP::import('Model','EmailTemplate');
		$this->EmailTemplate = new EmailTemplate();
		return $this->EmailTemplate->find('first',array('conditions'=>array('EmailTemplate.id'=>$emailId)));
		
	}
	
	function checkUserEmails($emailId=null){
		APP::import('Model','User');
		$this->User = new User(); 
		$candidateRec = $this->User->find("count",array('conditions'=>array('user.email="'.$emailId.'"')));
		if(!$candidateRec)
		{
			return true;
		}
		return false;
	}
	
	function getUserGroupId($name = ''){
		if(!empty($name)){
			App::import("Model", "Usermgmt.UserGroup");
			$this->UserGroup = new UserGroup();
			return $this->UserGroup->find('first', array('conditions' => array('UserGroup.name' => $name, 'UserGroup.allowRegistration' => 1), 'recursive' => 1, 'fields' => array('UserGroup.id')));
		}
	}
	
	/*function getloginUser() { // get login user detail
		$loginuser_id = $this->Session->read('UserAuth.User.id');
		APP::import('Model','User');
		$this->User = new User();
		return $this->User->find('first',array('condition'=>array('User.id'=>$loginuser_id)));
	}*/
		
		
}//Class end

?>
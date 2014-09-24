<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';
include 'virtue-function.php';

/**
 * Profile controller class for Users.
 *
 * @package		Joomla.Site
 * @subpackage	com_users
 * @since		1.6
 */
class UsersControllerProfile extends UsersController
{
	/**
	 * Method to check out a user for editing and redirect to the edit form.
	 *
	 * @since	1.6
	 */
	public function edit()
	{
		$app			= JFactory::getApplication();
		$user			= JFactory::getUser();
		$loginUserId	= (int) $user->get('id');

		// Get the previous user id (if any) and the current user id.
		$previousId = (int) $app->getUserState('com_users.edit.profile.id');
		$userId	= (int) JRequest::getInt('user_id', null, '', 'array');

		// Check if the user is trying to edit another users profile.
		if ($userId != $loginUserId) {
			JError::raiseError(403, JText::_('JERROR_ALERTNOAUTHOR'));
			return false;
		}

		// Set the user id for the user to edit in the session.
		$app->setUserState('com_users.edit.profile.id', $userId);

		// Get the model.
		$model = $this->getModel('Profile', 'UsersModel');

		// Check out the user.
		if ($userId) {
			$model->checkout($userId);
		}

		// Check in the previous user.
		if ($previousId) {
			$model->checkin($previousId);
		}

		// Redirect to the edit screen.
		$this->setRedirect(JRoute::_('index.php?option=com_users&view=profile&layout=edit', false));
	}

	/**
	 * Method to save a user's profile data.
	 *
	 * @return	void
	 * @since	1.6
	 */
	public function save()
	{
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		// Initialise variables.
		$app	= JFactory::getApplication();
		$model	= $this->getModel('Profile', 'UsersModel');
		$user	= JFactory::getUser();
		$userId	= (int) $user->get('id');

		// Get the user data.
		$data = JRequest::getVar('jform', array(), 'post', 'array');

		// Force the ID to this user.
		$data['id'] = $userId;

		// Validate the posted data.
		$form = $model->getForm();
		if (!$form) {
			JError::raiseError(500, $model->getError());
			return false;
		}

		// Validate the posted data.
		$data = $model->validate($form, $data);

		// Check for errors.
		if ($data === false) {
			// Get the validation messages.
			$errors	= $model->getErrors();

			// Push up to three validation messages out to the user.
			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++) {
				if ($errors[$i] instanceof Exception) {
					$app->enqueueMessage($errors[$i]->getMessage(), 'warning');
				} else {
					$app->enqueueMessage($errors[$i], 'warning');
				}
			}

			// Save the data in the session.
			$app->setUserState('com_users.edit.profile.data', $data);

			// Redirect back to the edit screen.
			$userId = (int) $app->getUserState('com_users.edit.profile.id');
			$this->setRedirect(JRoute::_('index.php?option=com_users&view=profile&layout=edit&user_id='.$userId, false));
			return false;
		}

		// Attempt to save the data.
		$return	= $model->save($data);

		// Check for errors.
		if ($return === false) {
			// Save the data in the session.
			$app->setUserState('com_users.edit.profile.data', $data);

			// Redirect back to the edit screen.
			$userId = (int)$app->getUserState('com_users.edit.profile.id');
			$this->setMessage(JText::sprintf('COM_USERS_PROFILE_SAVE_FAILED', $model->getError()), 'warning');
			$this->setRedirect(JRoute::_('index.php?option=com_users&view=profile&layout=edit&user_id='.$userId, false));
			return false;
		}

		// Redirect the user and adjust session state based on the chosen task.
		switch ($this->getTask()) {
			case 'apply':
				// Check out the profile.
				$app->setUserState('com_users.edit.profile.id', $return);
				$model->checkout($return);

				// Redirect back to the edit screen.
				$this->setMessage(JText::_('COM_USERS_PROFILE_SAVE_SUCCESS'));
				$this->setRedirect(JRoute::_(($redirect = $app->getUserState('com_users.edit.profile.redirect')) ? $redirect : 'index.php?option=com_users&view=profile&layout=edit&hidemainmenu=1', false));
				break;

			default:
				// Check in the profile.
				$userId = (int)$app->getUserState('com_users.edit.profile.id');
				if ($userId) {
					$model->checkin($userId);
				}

				// Clear the profile id from the session.
				$app->setUserState('com_users.edit.profile.id', null);

				// Redirect to the list screen.
				$this->setMessage(JText::_('COM_USERS_PROFILE_SAVE_SUCCESS'));
				$this->setRedirect(JRoute::_(($redirect = $app->getUserState('com_users.edit.profile.redirect')) ? $redirect : 'index.php?option=com_users&view=profile&user_id='.$return, false));
				break;
		}

		// Flush the data from the session.
		$app->setUserState('com_users.edit.profile.data', null);
	}


	public function save1()
	{

		/*$db =& JFactory::getDBO();
		 $query = "SELECT * FROM twit2pay_users";
		$db->setQuery( $query );
		$ses_var = $db->loadObjectList();
		print_r($ses_var);die;*/
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$app	= JFactory::getApplication();
		$model	= $this->getModel('Profile', 'UsersModel');
		$user	= JFactory::getUser();

		//echo '<pre>'; print_r($user);die;
		$userId	= (int) $user->get('id');
		$crm_customer_id	= (int) $user->get('crm_customer_id');

		// Get the user data.
		$data = $app->input->post->get('jform', array(), 'array');
		
		// Force the ID to this user.
		$data['id'] = $userId;
		$last_name = str_replace($data['name'], '', $data['username']);
		// Validate the posted data.
		$form = $model->getForm();
		if (!$form)
		{
			JError::raiseError(500, $model->getError());
			return false;
		}
		//echo '<pre>';print_r($data);die;
		// Validate the posted data.
		//echo '<pre>';print_r($data); var_dump($crm_customer_id); die;
		//echo '<pre>';print_r($data);die;
		$data = $model->validate($form, $data);
    //
		// Check for errors.
		if ($data === false)
		{
			// Get the validation messages.
			$errors	= $model->getErrors();
			$_SESSION['msg']=$errors[0];
			$_SESSION['update']= 'error';
           // print_r($errors);die;
			// Push up to three validation messages out to the user.
			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++)
			{
				if ($errors[$i] instanceof Exception)
				{
					$app->enqueueMessage($errors[$i]->getMessage(), 'warning');
				} else {
					$app->enqueueMessage($errors[$i], 'warning');
				}
			}

			// Save the data in the session.
			$app->setUserState('com_users.edit.profile.data', $data);

			// Redirect back to the edit screen.
			$userId = (int) $app->getUserState('com_users.edit.profile.id');
			$this->setRedirect(JRoute::_('index.php?option=com_users&view=profile&layout=step1&user_id='.$userId, false));
			return false;
		}
		// Validate the posted data.
		//$data = $model->validate($form, $data);
		//echo '<pre>'; print_r($data);
		// Attempt to save the data.
		$return	= $model->save($data); 
		//echo '<pre>'; print_r($data);
            $db =& JFactory::getDBO();
		    $q = "UPDATE  #__users set `email` = '$data[email1]' WHERE `id` = '$userId' LIMIT 1";
			$db->setQuery($q);
			$db->query();
		
		// Check for errors.
		if ($return === false)
		{
			// Save the data in the session.
			$app->setUserState('com_users.edit.profile.data', $data);
			// Redirect back to the edit screen.
			$userId = (int) $app->getUserState('com_users.edit.profile.id');
			$this->setMessage(JText::sprintf('COM_USERS_PROFILE_SAVE_FAILED', $model->getError()), 'warning');
			$this->setRedirect(JRoute::_('index.php?option=com_users&view=profile&layout=step1&Itemid=123&user_id='.$userId, false));
			return false;
		}
		// Redirect the user and adjust session state based on the chosen task.
		switch ($this->getTask())
		{
			case 'apply':
				// Check out the profile.
				$app->setUserState('com_users.edit.profile.id', $return);
				$model->checkout($return);

				// Redirect back to the edit screen.
				//$this->setMessage(JText::_('COM_USERS_PROFILE_SAVE_SUCCESS'));
				$this->setRedirect(JRoute::_(($redirect = $app->getUserState('com_users.edit.profile.redirect')) ? $redirect : 'index.php?option=com_users&view=profile&layout=step2&Itemid=124&hidemainmenu=1', false));
				break;

			default:
				// Check in the profile.
				$userId = (int) $app->getUserState('com_users.edit.profile.id');
				if ($userId)
				{
					$model->checkin($userId);
				}

				// Clear the profile id from the session.
				$app->setUserState('com_users.edit.profile.id', null);

				// Redirect to the list screen.
				//$this->setMessage(JText::_('COM_USERS_PROFILE_SAVE_SUCCESS'));
				$this->setRedirect(JRoute::_(($redirect = $app->getUserState('com_users.edit.profile.redirect')) ? $redirect : 'index.php?option=com_users&view=profile&layout=step2&Itemid=124&user_id='.$return, false));
				break;
		}
		// Flush the data from the session.
		$app->setUserState('com_users.edit.profile.data', null);
	}

	//function for account update

	public function update1(){

		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$app	= JFactory::getApplication();
		$model	= $this->getModel('Profile', 'UsersModel');
		$user	= JFactory::getUser();

		//echo '<pre>'; print_r($user);die;
		$userId	= (int) $user->get('id');
		// Get the user data.
		$data = JRequest::getVar('jform', array(), 'post', 'array');
        
		// Force the ID to this user.
		$data['id'] = $userId;

		// Validate the posted data.
		$form = $model->getForm();
		if (!$form)
		{
			JError::raiseError(500, $model->getError());
			return false;
		}
		// Validate the posted data.
		//echo '<pre>';print_r($data);
		 //var_dump($crm_customer_id); die;
		$data = $model->validate($form, $data);

		// Check for errors.
		if ($data === false)
		{

			// Get the validation messages.
			$errors	= $model->getErrors();

            $_SESSION['msg']=$errors[0];
			$_SESSION['update']= 'error';
		
           // print_r($errors);die;
			// Push up to three validation messages out to the user.
			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++)
			{
				if ($errors[$i] instanceof Exception)
				{
					$app->enqueueMessage($errors[$i]->getMessage(), 'warning');
				} else {
					$app->enqueueMessage($errors[$i], 'warning');
				}
			}

			// Save the data in the session.
			$app->setUserState('com_users.edit.profile.data', $data);

			// Redirect back to the edit screen.
			$userId = (int) $app->getUserState('com_users.edit.profile.id');
			$this->setRedirect(JRoute::_('index.php?option=com_users&view=profile&layout=step1&Itemid=140&user_id='.$userId, false));
			return false;
		}
		// Validate the posted data.
		//$data = $model->validate($form, $data);
		
		// Attempt to save the data.
		 //echo '<pre>';print_r($data);die;
		$return	= $model->save($data);
       
		 if($return !== false && $data !== false){
			   $return	= $model->save($data);
			   $_SESSION['msg']='User Information has been updated successfully.';
			   $_SESSION['update']= 'success';
		  }else{
               $_SESSION['msg']=$errors[0];
			   $_SESSION['update']= 'error';
		  }
		
		// Check for errors.
		if ($return === false)
		{
			// Save the data in the session.
			$app->setUserState('com_users.edit.profile.data', $data);
			// Redirect back to the edit screen.
			$userId = (int) $app->getUserState('com_users.edit.profile.id');
			$this->setMessage(JText::sprintf('COM_USERS_PROFILE_SAVE_FAILED', $model->getError()), 'warning');
			$this->setRedirect(JRoute::_('index.php?option=com_users&view=profile&layout=step1&Itemid=140&user_id='.$userId, false));
			return false;
		}
		// Redirect the user and adjust session state based on the chosen task.
		switch ($this->getTask())
		{
			case 'apply':
				// Check out the profile.
				$app->setUserState('com_users.edit.profile.id', $return);
				$model->checkout($return);

				// Redirect back to the edit screen.
				//$this->setMessage(JText::_('COM_USERS_PROFILE_SAVE_SUCCESS'));
				$this->setRedirect(JRoute::_(($redirect = $app->getUserState('com_users.edit.profile.redirect')) ? $redirect : 'index.php?option=com_users&view=profile&layout=step1&Itemid=140', false));
				break;

			default:
				// Check in the profile.
				$userId = (int) $app->getUserState('com_users.edit.profile.id');
				if ($userId)
				{
					$model->checkin($userId);
				}

				// Clear the profile id from the session.
				$app->setUserState('com_users.edit.profile.id', null);

				// Redirect to the list screen.
				//$this->setMessage(JText::_('COM_USERS_PROFILE_SAVE_SUCCESS'));
				$this->setRedirect(JRoute::_(($redirect = $app->getUserState('com_users.edit.profile.redirect')) ? $redirect : 'index.php?option=com_users&view=profile&layout=step1&Itemid=140&user_id='.$return, false));
				break;
		}
		// Flush the data from the session.
		$app->setUserState('com_users.edit.profile.data', null);


	}

	function xml2array($xml)
	{
		$arXML = array();
		$arXML['name'] = trim($xml->getName());
		$arXML['value'] = trim((string)$xml);
		$t = array();
		foreach($xml -> attributes() as $name => $value){
			$t[$name] = trim($value);
		}
		$arXML['attr'] = $t;
		$t=array();
		foreach($xml -> children() as $name => $xmlchild) {
			$t[$name][] = xml2array($xmlchild); //FIX : For multivalued node
		}
		$arXML['children'] = $t;
		return($arXML);
	}
	
	

	public function save2()
	{
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$app	= JFactory::getApplication();
		$model	= $this->getModel('Profile', 'UsersModel');
		$user	= JFactory::getUser();
		$userId	= (int) $user->get('id');
	    $userName	= $user->get('username');
		
        //echo '<pre>';print_r($user);
		$db =& JFactory::getDBO();

		// Get the user data.
		$data = $app->input->post->get('jform', array(), 'array');
		$last_name = str_replace($data['name'], '', $data['username']);
		//echo '<pre>';print_r($data);die;
		// Force the ID to this user.
		$data['id'] = $userId;
		// extract Credit card details and prevent to save it in our DB.
		$cc		=	$data['profile'];
		//echo '<pre>';print_r($cc);
		// Validate the posted data.
		$form = $model->getForm();
		if (!$form)
		{
			JError::raiseError(500, $model->getError());
			return false;
		}
		// Validate the posted data.
		$data = $model->validate($form, $data);
		// Check for errors.
		if ($data === false)
		{
			// Get the validation messages.
			$errors	= $model->getErrors();
			// Push up to three validation messages out to the user.
			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++)
			{
				if ($errors[$i] instanceof Exception)
				{
					$app->enqueueMessage($errors[$i]->getMessage(), 'warning');
				}
				else
				{
					$app->enqueueMessage($errors[$i], 'warning');
				}
			}
			// Save the data in the session.
			$app->setUserState('com_users.edit.profile.data', $data);
			// Redirect back to the edit screen.
			$userId = (int) $app->getUserState('com_users.edit.profile.id');
			$this->setRedirect(JRoute::_('index.php?option=com_users&view=profile&layout=step3&Itemid=125&user_id='.$userId, false));
			return false;
		}
		// Validate the posted data.
		//$data = $model->validate($form, $data);
		// Attempt to save the data.
		$return	= $model->save($data);


			/* Process Response CRM api for insert customer
			 * Gaurav Bansal
			* August 28, 2013
			*
			* */
			$headers = array();
			$headers[] = 'Accept: application/xml';
			$headers[] = 'Content-Type: application/xml; charset=UTF-8';
			$url = "https://api.responsecrm.com/customer";
			$request = '<?xml version="1.0" encoding="utf-8"?>'.
					'<insert_customer>'.
					'<authorization>'.
					'<username>teeshirt</username>'.
					'<password>teeshirt1</password>'.
					'</authorization>'.
					'<customers>'.
					'<customer>'.
					'<siteid>1003884</siteid>'.
					'<phone>(714) 555-1234</phone>'.
					'<email>'.$data['email1'].'</email>'.
					'<ipaddress>'.$_SERVER["REMOTE_ADDR"].'</ipaddress>'.
					'<address>'.
					'<firstname>'.$data['name'].'</firstname>'.
					'<lastname>'.$last_name.'</lastname>'.
					'<address1>'.$cc['address1'].'</address1>'.
					'<address2></address2>'.
					'<city>'.$cc['city'].'</city>'.
					'<state>'.$cc['region'].'</state>'.
					'<zipcode>'.$cc['postal_code'].'</zipcode>'.
					'<country_iso>US</country_iso>'.
					'</address>'.
					'</customer>'.
					'</customers>'.
					'</insert_customer>';
			$request = str_replace("\n","",$request);
			$request = str_replace("\t","",$request);
			$request = trim($request);
			// Initialize handle and set options
			$ch1 = curl_init();
			curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
			curl_setopt ($ch1, CURLOPT_URL, $url);
			curl_setopt ($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt ($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
			curl_setopt ($ch1, CURLOPT_TIMEOUT, 60);
			curl_setopt($ch1, CURLOPT_POSTFIELDS, $request);
			curl_setopt ($ch1, CURLOPT_FOLLOWLOCATION, 0);
			curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, 1);
			$result = curl_exec ($ch1);
			//echo $result;die;
			// Close the handle
			curl_close($ch1);
			//convert to xml object
			if ( !empty($result) )
				$xml_array = json_decode(json_encode((array)simplexml_load_string($result)),1);
			$customerid	=	$xml_array['insert_customer_results']['insert_customer_result']['customerid'];
			$response	=	$xml_array['insert_customer_results']['insert_customer_result']['response'];
			if($response == 1){
				$result_key = 'success';
			}elseif($response == 2){
				$result_key = 'error';
			}
			$result_data	=	$xml_array['insert_customer_results']['insert_customer_result']['response_text'];

			$user_id	=	$data['id'];
			$db =& JFactory::getDBO();
			$q = "UPDATE  #__users set `crm_customer_id` = '$customerid' WHERE `id` = '$user_id' LIMIT 1";
			$db->setQuery($q);
			$db->query();
			//save logs
			$q1 = "INSERT INTO  #__shipping_logs (`user_id`, `cust_id`, `name`, `s_addr`, `s_city`, `s_state`, `s_zip`, `request_string`, `response`, `result_key`, `result_data`, `modified_date`, `type`) VALUES ('$user_id', '$customerid', '".$data['name']."', '".$data['profile']['address1']."', '".$data['profile']['city']."', '".$data['profile']['region']."', '".$data['profile']['postal_code']."', '$request', '$result', '$result_key', '$result_data', '".time()."', 'insert')";
			$db->setQuery($q1);
			$db->query();
	
	/*Get customer id*/
			$query = "SELECT * FROM #__users where id = '$userId'";
		    $db->setQuery( $query );
		    $ses_var = $db->loadObjectList();
		    $crm_customer_id	= (int) $ses_var[0]->crm_customer_id;
    /*Get customer id*/


		/* Process Response CRM api for save cc info
		 * Gaurav Bansal
		* September 19, 2013
		*
		* */
		$pos = strpos($cc['ccnumber'], '*');
		if($crm_customer_id !=0 && $pos === false){
			$headers = array();
			$headers[] = 'Accept: application/xml';
			$headers[] = 'Content-Type: application/xml; charset=UTF-8';
		/*	$url = "https://api.responsecrm.com/customer/".$crm_customer_id;

		 $send = '<?xml version="1.0" encoding="utf-8"?>'.
				 '<CustomerChangeRequest>'.
					'<Security>'.
					'<UserName>teeshirt</UserName>'.
					'<Password>teeshirt1</Password>'.
					'</Security>'.
					'<CreditCardData>'.
					'<CardType>'.$cc['cardtype'].'</CardType>'.
					'<CreditCardNumber>'.$cc['ccnumber'].'</CreditCardNumber>'.
					'<NameOnCard>'.$cc['name_on_card'].'</NameOnCard>'.
					'<CVV>'.$cc['cvv'].'</CVV>'.
					'<ExpMonth>'.$cc['expmonth'].'</ExpMonth>'.
					'<ExpYear>'.$cc['expyear'].'</ExpYear>'.
					'</CreditCardData>'.
					'</CustomerChangeRequest>';
				$send = str_replace("\n","",$send);
		 $send = str_replace("\t","",$send);
		 $send = trim($send);

		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		 curl_setopt ($ch, CURLOPT_URL, $url);
		 curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		 curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
		 curl_setopt ($ch, CURLOPT_TIMEOUT, 60);

		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Get response
		 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		 curl_setopt($ch, CURLOPT_POSTFIELDS,$send);


		 $result = curl_exec ($ch);	*/
			
			/* Process of $0 Transaction  */
			$url = "https://api.responsecrm.com/transaction";
			$request ='<?xml version="1.0" encoding="utf-8"?>
								<run_transaction>
								<authorization>
									<username>teeshirt</username>
									<password>teeshirt1</password>
								</authorization>
								<transactions>
									<transaction>
										<customerid>'.$crm_customer_id.'</customerid>
										<ordertype>signup</ordertype>
										<ipaddress>'.$_SERVER["REMOTE_ADDR"].'</ipaddress>
										<cardtype>'.$cc['cardtype'].'</cardtype>
                                        <ccnumber>'.$cc['ccnumber'].'</ccnumber>
                                        <name_on_card>'.$cc['name_on_card'].'</name_on_card>   
                                        <cvv>'.$cc['cvv'].'</cvv>
                                        <expmonth>'.$cc['expmonth'].'</expmonth>
                                        <expyear>'.$cc['expyear'].'</expyear>
												
										<product_groups>
											<product_group>
												<product_group_key>d264a3b6-e78e-4429-9c11-896bc9b567c6</product_group_key>
												<products>
													<product>
														<product_id>1</product_id>
														<amount>0</amount>
													</product>
												</products>
											</product_group>
										</product_groups>
									</transaction>
								</transactions>
							</run_transaction>';
			
		 $ch1 = curl_init();
					curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
					curl_setopt ($ch1, CURLOPT_URL, $url);
					curl_setopt ($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
					curl_setopt ($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
					curl_setopt ($ch1, CURLOPT_TIMEOUT, 60);
					curl_setopt($ch1, CURLOPT_POSTFIELDS, $request);
					curl_setopt ($ch1, CURLOPT_FOLLOWLOCATION, 0);
					curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, 1);
					$result = curl_exec ($ch1);
					//echo $result;die;
		 //convert to xml object
		 $xml_array	=	array();
		 if ( !empty($result) )
		 	$xml_array = json_decode(json_encode((array)simplexml_load_string($result)),1);
			$response = $xml_array['run_transaction_results']['run_transaction_result']['response'];
			$response_text = $xml_array['run_transaction_results']['run_transaction_result']['response_text'];
		    $transaction_id  = $xml_array['run_transaction_results']['run_transaction_result']['transactionid'];
		 //echo '<pre>';print_r($xml_array); die;
		/* foreach ($xml_array['Result'] as $res_array){

		 }
		 $rescnt =  count($res_array);
		 if($rescnt > 1){
		 	 $result_key	= $res_array['ResultKey'];
		 	 $result_data= $res_array['ResultData'];
		 }else{
		 	$result_key	=	$xml_array['Result']['ResultKey'];
		 	$result_data	=	$xml_array['Result']['ResultData'];
		 }*/
		 
		 $user_id	=	$data['id'];
		 $db =& JFactory::getDBO();
		 $cnt = strlen($cc['ccnumber']);
		 $cnt_no = $cnt-4;
		 $star = '';
		 for($i=0; $i< $cnt_no; $i++){

		 	$star = $star.'*';
		 }
		 $cc_no = $star.substr_replace($cc['ccnumber'],'',0,$cnt_no);
		 $q = "UPDATE  #__users set `cc_type` = '".$cc['cardtype']."', `cc_number` = '".$cc_no."', `cc_name` = '".$cc['name_on_card']."', `cc_cvv` = '".$cc['cvv']."', `cc_exp_month` = '".$cc['expmonth']."', `cc_exp_year` = '".$cc['expyear']."' WHERE `id` = '$user_id' and `crm_customer_id` = '$crm_customer_id' LIMIT 1";
		 $db->setQuery($q);
		 $db->query();
		 //save logs
		 $q1 = "INSERT INTO  #__cc_logs (`user_id`, `cust_id`, `cc_type`, `cc_name`, `cc_number`, `cc_exp_month`, `cc_exp_year`, `cc_cvv`, `request_string`, `response`, `result_key`, `result_data`, `modified_date`, `type`) VALUES ('$user_id', '$crm_customer_id', '".$cc['cardtype']."', '".$cc['name_on_card']."', '".$cc_no."', '".$cc['expmonth']."', '".$cc['expyear']."', '".$cc['cvv']."', '$request', '$result', ' $transaction_id', '$response_text', '".time()."', 'insert')";
		 $db->setQuery($q1);
		 $db->query();


		}
		
		/*Process Automatic transation When user sign up*/
		include 'twitLogs.php';		
		require_once( JPATH_LIBRARIES. '/TwitterAPIExchange.php');
		include 'manage-api-key.php';
		
		$virtue = new customFunctions();
		
		/* Get Active product has tag form db */
		$hashes = $virtue->getHash();
		//echo '<pre>';print_r($hashes);die;
		foreach ($hashes as $hashtag){
			$name = $hashtag->product_sku;
			$pro_id = $hashtag->virtuemart_product_id;
            $pro_price = $hashtag->product_price;
			$pro_stock = $hashtag->product_in_stock;
			/* Get twits */
			$url = 'https://api.twitter.com/1.1/search/tweets.json';
			$getfield = '?q=%23'.$name.'%2BAND%2B%23twt2pay&count=&include_entities=true';
		
			$requestMethod = 'GET';
		
			$twitter = new TwitterAPIExchange($settings);
			$ape	=	$twitter->setGetfield($getfield)
			->buildOauth($url, $requestMethod)
			->performRequest();
			$twits = json_decode($ape);
			//echo '<pre>';print_r($twits);die;
			foreach($twits as $twit)
			{
				foreach($twit as $twi)
				{
					 //echo '<pre>'; print_r($twi); echo '</pre>';die;
					 if($twi->id_str != 0){
					 	$tuserId = $twi->user->id;
					 	$tuserName = str_replace(' ', '', strtolower($twi->user->name));
					 	$tscreenName = $twi->user->screen_name;
                        
						$q = "SELECT * FROM #__users WHERE `username` LIKE '".str_replace(' ','',$tuserName)."' LIMIT 1";
  		                $db->setQuery($q);
                        $db->query();
  		                $usrcnt = $db->getNumRows();
						if($pro_stock != 0){
						  
							//if($ses_var[0]->username == $tuserName){
							  if($usrcnt != 0){ 
								/*Get id from __twit_logs  */
								$q_twit = "SELECT * FROM #__twits_logs WHERE `twit_id` = '$twi->id_str' LIMIT 1";
								$db->setQuery($q_twit);
								$db->query();
								$twit_logs = $db->loadObject();
								$twit_logId = $twit_logs->id;
								 
								/* Check Previous transaction for perticular twit */
								$q_tra = "SELECT * FROM #__transactions WHERE `tweet_id` LIKE '$twi->id_str' LIMIT 1";
								$db->setQuery($q_tra);
								$db->query();
								$trcnt=$db->getNumRows();
								if($trcnt == 0){
									/* Process Response CRM */
									$headers = array();
									$headers[] = 'Accept: application/xml';
									$headers[] = 'Content-Type: application/xml; charset=UTF-8';
									$url = "https://api.responsecrm.com/transaction";
							        $request ='<?xml version="1.0" encoding="utf-8"?>
									<run_transaction>
									<authorization>
										<username>teeshirt</username>
										<password>teeshirt1</password>
									</authorization>
									<transactions>
										<transaction>
											<customerid>'.$crm_customer_id.'</customerid>
											<ordertype>signup</ordertype>
											<ipaddress>'.$_SERVER["REMOTE_ADDR"].'</ipaddress>
											<product_groups>
												<product_group>
													<product_group_key>'.$pro_groupId.'</product_group_key>
													<products>
														<product>
															<product_id>'.$pro_id.'</product_id>
															<amount>'.$pro_price.'</amount>
														</product>
													</products>
												</product_group>
											</product_groups>
										</transaction>
									</transactions>
								</run_transaction>';
									
									$ch1 = curl_init();
									curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);
									curl_setopt ($ch1, CURLOPT_URL, $url);
									curl_setopt ($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
									curl_setopt ($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
									curl_setopt ($ch1, CURLOPT_TIMEOUT, 60);
									curl_setopt($ch1, CURLOPT_POSTFIELDS, $request);
									curl_setopt ($ch1, CURLOPT_FOLLOWLOCATION, 0);
									curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, 1);
									$result = curl_exec ($ch1);
									//echo $result;die;
									$xml_array	=	array();
									
									/* genrate random string */
									$alphabet = "0123456789";
									$pass = array(); //remember to declare $pass as an array
									for ($i = 0; $i < 8; $i++) {
										$n = rand(0, strlen($alphabet)-1); //use strlen instead of count
										$pass[$i] = $alphabet[$n];
									}
									$rand = implode($pass); //turn the array into a string
									/* genrate random string */
									
									//echo $rand = $this->randomToken();die
									if ( !empty($result) )
										$xml_array = json_decode(json_encode((array)simplexml_load_string($result)),1);
									//echo '<pre>';print_r($xml_array);
									$response = $xml_array['run_transaction_results']['run_transaction_result']['response'];
									$response_text = $xml_array['run_transaction_results']['run_transaction_result']['response_text'];
									$transaction_id  = $xml_array['run_transaction_results']['run_transaction_result']['transactionid'];
									if($response == 1){
										$transaction='Approved';
											
										/* post thank you message on twitter */

										
										$url = 'https://api.twitter.com/1.1/direct_messages/new.json';
										$postfields = array(
												'text' => 'Thank you for purchase '.$name.' on twt2pay http://twt2pay.com ##'.$rand,
												'screen_name' => $tscreenName
										);
										$requestMethod = 'POST';
										$twitter = new TwitterAPIExchange($settings);
										$response =	$twitter->buildOauth($url, $requestMethod)
										->setPostfields($postfields)
										->performRequest();
										
										$responsedmsg = json_decode($response);
										$errcode = $responsedmsg->errors[0]->code;
										 
										if($errcode != ''){
										$url = 'https://api.twitter.com/1.1/statuses/update.json';
										$postfields = array(
												'status' => '@'.$tscreenName.' thank you for purchase '.$name.' on twt2pay http://twt2pay.com ##'.$rand,
												'in_reply_to_status_id' => $twi->id_str
										);
										$requestMethod = 'POST';
										$twitter = new TwitterAPIExchange($settings);
										$twitter->buildOauth($url, $requestMethod)
										->setPostfields($postfields)
										->performRequest();
										}
											
									}elseif($response == 2){
										$transaction='Declined';
											
										/* Post failed transaction message on twitter */

										$url = 'https://api.twitter.com/1.1/direct_messages/new.json';
										$postfields = array(
												'text' => 'Your transaction for '.$name.' has been failed, check your transaction status on twt2pay http://twt2pay.com ##'.$rand,
												'screen_name' => $tscreenName
										);
										$requestMethod = 'POST';
										$twitter = new TwitterAPIExchange($settings);
										$response =	$twitter->buildOauth($url, $requestMethod)
										->setPostfields($postfields)
										->performRequest();
										
										$responsedmsg = json_decode($response);
										$errcode = $responsedmsg->errors[0]->code;
										 
										if($errcode != ''){
										$url = 'https://api.twitter.com/1.1/statuses/update.json';
										$postfields = array(
												'status' => '@'.$tscreenName.' your transaction for '.$name.' has been failed, check your transaction status on twt2pay http://twt2pay.com ##'.$rand,
												'in_reply_to_status_id' => $twi->id_str
										);
										$requestMethod = 'POST';
										$twitter = new TwitterAPIExchange($settings);
										$twitter->buildOauth($url, $requestMethod)
										->setPostfields($postfields)
										->performRequest();
										}
											
									}elseif($response == 3){
										$transaction='Error in data';
											
										/* Post failed transaction message on twitter */
									
										$url = 'https://api.twitter.com/1.1/direct_messages/new.json';
										$postfields = array(
												'text' => 'Your transaction for '.$name.' has been failed, check your transaction status on twt2pay http://twt2pay.com ##'.$rand,
												'screen_name' => $tscreenName
										);
										$requestMethod = 'POST';
										$twitter = new TwitterAPIExchange($settings);
										$response =	$twitter->buildOauth($url, $requestMethod)
										->setPostfields($postfields)
										->performRequest();
										
										$responsedmsg = json_decode($response);
										$errcode = $responsedmsg->errors[0]->code;
										 
										if($errcode != ''){
										$url = 'https://api.twitter.com/1.1/statuses/update.json';
										$postfields = array(
												'status' => '@'.$tscreenName.' your transaction for '.$name.' has been failed, check your transaction status on twt2pay http://twt2pay.com ##'.$rand,
												'in_reply_to_status_id' => $twi->id_str
										);
										$requestMethod = 'POST';
										$twitter = new TwitterAPIExchange($settings);
										$twitter->buildOauth($url, $requestMethod)
										->setPostfields($postfields)
										->performRequest();
										}
											
									}else{
										$transaction = 'Failed';

										$url = 'https://api.twitter.com/1.1/direct_messages/new.json';
										$postfields = array(
												'text' => 'Your transaction for '.$name.' has been failed, check your transaction status on twt2pay http://twt2pay.com ##'.$rand,
												'screen_name' => $tscreenName
										);
										$requestMethod = 'POST';
										$twitter = new TwitterAPIExchange($settings);
										$response =	$twitter->buildOauth($url, $requestMethod)
										->setPostfields($postfields)
										->performRequest();
										
										$responsedmsg = json_decode($response);
										$errcode = $responsedmsg->errors[0]->code;
										 
										if($errcode != ''){
											$url = 'https://api.twitter.com/1.1/statuses/update.json';
											$postfields = array(
													'status' => '@'.$tscreenName.' your transaction for '.$name.' has been failed, check your transaction status on twt2pay http://twt2pay.com ##'.$rand,
													'in_reply_to_status_id' => $twi->id_str
											);
											$requestMethod = 'POST';
											$twitter = new TwitterAPIExchange($settings);
											$twitter->buildOauth($url, $requestMethod)
											->setPostfields($postfields)
											->performRequest();
										}
									}
									/* update response in __transactions */
									$cc = "SELECT * FROM #__users WHERE `id` = '$userId'";
									$db->setQuery($cc);
									$db->query();
									$ccInfo = $db->loadObject();
									$cc_number = $ccInfo->cc_number;
									
									
									$q = "INSERT INTO #__transactions (`tweet_id`, `twit_log_id`, `cc_number`, `transaction_id`, `replyed_user_id`, `replyed_usr_s_name`, `status`, `request_string`, `response`, `response_text`, `transaction_date`,`hastag`, `price`) VALUES ('$twi->id_str', '$twit_logId', '$cc_number', '$transaction_id', '$userId', '$userName', '$transaction', '$request', '$result', '$response_text', now(), '$name', '$pro_price')";
									
									$db->setQuery($q);
									$db->query();
										
									/*update on __twit_logs  */
									$q2 = "UPDATE  #__twits_logs set `transaction` = 'yes' WHERE `twit_id` = '$twi->id_str' LIMIT 1";
									$db->setQuery($q2);
									$db->query();
									
								}
								
							}
					 	}else{
						       $q_msg = "SELECT * FROM #__twits_logs WHERE `twit_id` = '$twi->id_str' and `message` = 'no' and `transaction` = 'no'";
								  $db->setQuery($q_msg); 
								  $db->query();
								  $msgcnt = $db->getNumRows();
									if($msgcnt != 0){ 
									 /* retweet for out of stock information */
										$rand = randomToken();
										$trans_comment = $virtue->getCustomValues(17, 6);
										$pro_os = strip_tags($trans_comment->custom_value);
										$url = 'https://api.twitter.com/1.1/statuses/update.json';
										$postfields = array(
												'status' => '@'.$tscreenName.' '.$pro_os.' in '.JURI::base().' ##'.$rand,
												'in_reply_to_status_id' => $twi->id_str
										);
										$requestMethod = 'POST';
										$twitter = new TwitterAPIExchange($settings);
										$twitter->buildOauth($url, $requestMethod)
										->setPostfields($postfields)
										->performRequest(); 
										$q2 = "UPDATE  #__twits_logs set `message` = 'yes' WHERE `twit_id` = '$twi->id_str' LIMIT 1";
										$db->setQuery($q2);
										$db->query();
										
									} 
						}
					 }
				}
			}	
		}

		
		/*
		 if ( count($xml_array) >0 )
		 {
		$customerid	=	$xml_array['insert_customer_results']['insert_customer_result']['customerid'];
		$user_id	=	$data['id'];
		$db =& JFactory::getDBO();
		$q = "UPDATE  #__users set `crm_customer_id` = '$customerid' WHERE `id` = '$user_id' LIMIT 1";
		$db->setQuery($q);
		$db->query();
		}*/
		// Check for errors.
		if ($return === false)
		{
			// Save the data in the session.
			$app->setUserState('com_users.edit.profile.data', $data);

			// Redirect back to the edit screen.
			$userId = (int) $app->getUserState('com_users.edit.profile.id');
			$this->setMessage(JText::sprintf('COM_USERS_PROFILE_SAVE_FAILED', $model->getError()), 'warning');
			$this->setRedirect(JRoute::_('index.php?option=com_users&view=profile&layout=step2&Itemid=124&user_id='.$userId, false));
			return false;
		}


		// Redirect the user and adjust session state based on the chosen task.
		switch ($this->getTask())
		{
			case 'apply':
				// Check out the profile.
				$app->setUserState('com_users.edit.profile.id', $return);
				$model->checkout($return);

				// Redirect back to the edit screen.
				//$this->setMessage(JText::_('COM_USERS_PROFILE_SAVE_SUCCESS'));
				$this->setRedirect(JRoute::_(($redirect = $app->getUserState('com_users.edit.profile.redirect')) ? $redirect : 'index.php?option=com_users&view=profile&layout=step3&Itemid=125&hidemainmenu=1', false));
				break;
			default:
				// Check in the profile.
				$userId = (int) $app->getUserState('com_users.edit.profile.id');
				if ($userId)
				{
					$model->checkin($userId);
				}

				// Clear the profile id from the session.
				$app->setUserState('com_users.edit.profile.id', null);
				// Redirect to the list screen.
				//$this->setMessage(JText::_('COM_USERS_PROFILE_SAVE_SUCCESS'));
				//$this->setRedirect(JRoute::_(($redirect = $app->getUserState('com_users.edit.profile.redirect')) ? $redirect : 'index.php?option=com_users&view=profile&layout=step3&Itemid=125&user_id='.$return, false));

				$this->setRedirect(JRoute::_(($redirect = $app->getUserState('com_users.edit.profile.redirect')) ? $redirect : 'index.php?option=com_content&view=article&id=10&Itemid=127', false));
				break;
		}
		// Flush the data from the session.
		$app->setUserState('com_users.edit.profile.data', null);
	}

	
	public function update2(){

		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$app	= JFactory::getApplication();
		$model	= $this->getModel('Profile', 'UsersModel');
		$user	= JFactory::getUser();
		$userId	= (int) $user->get('id');

		$db =& JFactory::getDBO();
		$query = "SELECT * FROM #__users where id = '$userId'";
		$db->setQuery( $query );
		$ses_var = $db->loadObjectList();
		
		//for save logs
		$profile = JUserHelper::getProfile($user->id);
		if($profile->profile['baddress'] == ''){
			$type = 'insert';
		}else{
			$type = 'update';
		}
		//for save logs
		
		//$crm_customer_id	= (int) $user->get('crm_customer_id');
		$crm_customer_id	= (int) $ses_var[0]->crm_customer_id;

		// Get the user data.
		$data = $app->input->post->get('jform', array(), 'array');
		//echo '<pre>';print_r($data);die;
		$same_as_ship =  $data['profile']['same_as_ship'];
		// Force the ID to this user.
		$data['id'] = $userId;
		// extract Credit card details and prevent to save it in our DB.
		$cc		=	$data['profile'];
		//echo '<pre>';print_r($cc);die;
		// Validate the posted data.
		$form = $model->getForm();
		if (!$form)
		{
			JError::raiseError(500, $model->getError());
			return false;
		}
		// Validate the posted data.
		$data = $model->validate($form, $data);
		// Check for errors.
		if ($data === false)
		{
			// Get the validation messages.
			$errors	= $model->getErrors();
			// Push up to three validation messages out to the user.
			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++)
			{
				if ($errors[$i] instanceof Exception)
				{
					$app->enqueueMessage($errors[$i]->getMessage(), 'warning');
				}
				else
				{
					$app->enqueueMessage($errors[$i], 'warning');
				}
			}
			// Save the data in the session.
			$app->setUserState('com_users.edit.profile.data', $data);
			// Redirect back to the edit screen.
			$userId = (int) $app->getUserState('com_users.edit.profile.id');
			$this->setRedirect(JRoute::_('index.php?option=com_users&view=profile&layout=step2&Itemid=141&user_id='.$userId, false));
			return false;
		}
		// Validate the posted data.
		//$data = $model->validate($form, $data);
		// Attempt to save the data.
		//$return	= $model->save($data);
       
		
		
		/*$q = "UPDATE  #__users set `same_as_ship` = '$same_as_ship' WHERE `id` = '$userId' and `crm_customer_id` = '$crm_customer_id' LIMIT 1";
		$db->setQuery($q);
		$db->query();
		//save logs
		$q2 = "INSERT INTO  #__billing_logs (`user_id`, `cust_id`, `b_addr`, `b_city`, `b_state`, `b_zip`, `modified_date`, `type`) VALUES ('$userId', '$crm_customer_id', '".$data['profile']['baddress']."', '".$data['profile']['bcity']."', '".$data['profile']['bregion']."', '".$data['profile']['bpostal_code']."', '".time()."', '$type')";
		$db->setQuery($q2);
		$db->query();*/
		
		/* Process Response CRM api
		 * Gaurav Bansal
		* September 19, 2013
		*
		* */
		$result_key = '';
		$pos = strpos($cc['ccnumber'], '*');
		if($crm_customer_id !=0 && $pos === false){
			$headers = array();
			$headers[] = 'Accept: application/xml';
			$headers[] = 'Content-Type: application/xml; charset=UTF-8';
			$url = "https://api.responsecrm.com/customer/".$crm_customer_id;

		 $send = '<?xml version="1.0" encoding="utf-8"?>'.
				 '<CustomerChangeRequest>'.
					'<Security>'.
					'<UserName>teeshirt</UserName>'.
					'<Password>teeshirt1</Password>'.
					'</Security>'.
					'<ShippingAddress>'.
                    '<Address1>'.$cc['address1'].'</Address1>'.
                    '<Address2/>'.
                    '<City>'.$cc['city'].'</City>'.
                    '<StateProvinceCounty>'.$cc['region'].'</StateProvinceCounty>'.
                    '<ZipOrPostcode>'.$cc['postal_code'].'</ZipOrPostcode>'.
                    '<CountryISO>US</CountryISO>'.
                    '</ShippingAddress>'.
					'<CreditCardData>'.
					'<CardType>'.$cc['cardtype'].'</CardType>'.
					'<CreditCardNumber>'.$cc['ccnumber'].'</CreditCardNumber>'.
					'<NameOnCard>'.$cc['name_on_card'].'</NameOnCard>'.
					'<CVV>'.$cc['cvv'].'</CVV>'.
					'<ExpMonth>'.$cc['expmonth'].'</ExpMonth>'.
					'<ExpYear>'.$cc['expyear'].'</ExpYear>'.
					'</CreditCardData>'.
					'</CustomerChangeRequest>';

		 $send = str_replace("\n","",$send);
		 $send = str_replace("\t","",$send);
		 $send = trim($send);

		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		 curl_setopt ($ch, CURLOPT_URL, $url);
		 curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		 curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
		 curl_setopt ($ch, CURLOPT_TIMEOUT, 60);

		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Get response
		 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		 curl_setopt($ch, CURLOPT_POSTFIELDS,$send);


		 $result = curl_exec ($ch);
		//echo $result; die;
		 // Close the handle
		 curl_close($ch);
		 //convert to xml object
		 $xml_array	=	array();
		 if ( !empty($result) )
		 	$xml_array = json_decode(json_encode((array)simplexml_load_string($result)),1);
		 //echo '<pre>';print_r($xml_array); die;
		 
		 foreach ($xml_array['Result'] as $res_array){

		 }
		 $rescnt =  count($res_array);
		 if($rescnt > 1){
		 	$result_key	= $res_array['ResultKey'];
		 	$result_data= $res_array['ResultData'];
		 }else{
		 	$result_key	=	$xml_array['Result']['ResultKey'];
		 	$result_data	=	$xml_array['Result']['ResultData'];
		 }
		 	
		 	
		 $user_id	=	$data['id'];
		 $db =& JFactory::getDBO();
		 $cnt = strlen($cc['ccnumber']);
		 $cnt_no = $cnt-4;
		 $star = '';
		 for($i=0; $i< $cnt_no; $i++){

		 	$star = $star.'*';
		 }
		 $cc_no = $star.substr_replace($cc['ccnumber'],'',0,$cnt_no);
		if($result_key == 'SUCCESS'){ 
		 $q = "UPDATE  #__users set `cc_type` = '".$cc['cardtype']."', `cc_number` = '".$cc_no."', `cc_name` = '".$cc['name_on_card']."', `cc_cvv` = '".$cc['cvv']."', `cc_exp_month` = '".$cc['expmonth']."', `cc_exp_year` = '".$cc['expyear']."' WHERE `id` = '$user_id' and `crm_customer_id` = '$crm_customer_id' LIMIT 1";
		 $db->setQuery($q);
		 $db->query();
		}
		 //save logs
		 
		 $q1 = "INSERT INTO  #__shipping_logs (`user_id`, `cust_id`, `name`, `s_addr`, `s_city`, `s_state`, `s_zip`, `request_string`, `response`, `result_key`, `result_data`, `modified_date`, `type`) VALUES ('$userId', '$crm_customer_id', '$uName', '".$cc['address1']."', '".$cc['city']."', '".$cc['region']."', '".$cc['postal_code']."', '$send', '$result', '$result_key', '$result_data', '".time()."', 'update')";
			$db->setQuery($q1);
			$db->query();
			
		 $q2 = "INSERT INTO  #__cc_logs (`user_id`, `cust_id`, `cc_type`, `cc_name`, `cc_number`, `cc_exp_month`, `cc_exp_year`, `cc_cvv`, `request_string`, `response`, `result_key`, `result_data`, `modified_date`, `type`) VALUES ('$user_id', '$crm_customer_id', '".$cc['cardtype']."', '".$cc['name_on_card']."', '".$cc_no."', '".$cc['expmonth']."', '".$cc['expyear']."', '".$cc['cvv']."', '$send', '$result', '$result_key', '$result_data', '".time()."', 'update')";
		 $db->setQuery($q2);
		 $db->query();
		 

		}

         if($result_key == 'SUCCESS'){
			   $return	= $model->save($data);
			   $_SESSION['msg']='User Information has been updated successfully.';
			   $_SESSION['update']= 'success';
		  }else{
               $_SESSION['msg']='Some error occured, please update your cc number and try again.';
			   $_SESSION['update']= 'error';
		  }
		/*
		 if ( count($xml_array) >0 )
		 {
		$customerid	=	$xml_array['insert_customer_results']['insert_customer_result']['customerid'];
		$user_id	=	$data['id'];
		$db =& JFactory::getDBO();
		$q = "UPDATE  #__users set `crm_customer_id` = '$customerid' WHERE `id` = '$user_id' LIMIT 1";
		$db->setQuery($q);
		$db->query();
		}*/
		// Check for errors.
		if ($return === false)
		{
			// Save the data in the session.
			$app->setUserState('com_users.edit.profile.data', $data);

			// Redirect back to the edit screen.
			$userId = (int) $app->getUserState('com_users.edit.profile.id');
			$this->setMessage(JText::sprintf('COM_USERS_PROFILE_SAVE_FAILED', $model->getError()), 'warning');
			$this->setRedirect(JRoute::_('index.php?option=com_users&view=profile&layout=step2&Itemid=141&user_id='.$userId, false));
			return false;
		}


		// Redirect the user and adjust session state based on the chosen task.
		switch ($this->getTask())
		{
			case 'apply':
				// Check out the profile.
				$app->setUserState('com_users.edit.profile.id', $return);
				$model->checkout($return);

				// Redirect back to the edit screen.
				//$this->setMessage(JText::_('COM_USERS_PROFILE_SAVE_SUCCESS'));
				$this->setRedirect(JRoute::_(($redirect = $app->getUserState('com_users.edit.profile.redirect')) ? $redirect : 'index.php?option=com_users&view=profile&layout=step2&Itemid=141', false));
				break;
			default:
				// Check in the profile.
				$userId = (int) $app->getUserState('com_users.edit.profile.id');
				if ($userId)
				{
					$model->checkin($userId);
				}

				// Clear the profile id from the session.
				$app->setUserState('com_users.edit.profile.id', null);
				// Redirect to the list screen.
				//$this->setMessage(JText::_('COM_USERS_PROFILE_SAVE_SUCCESS'));
				//$this->setRedirect(JRoute::_(($redirect = $app->getUserState('com_users.edit.profile.redirect')) ? $redirect : 'index.php?option=com_users&view=profile&layout=step3&Itemid=125&user_id='.$return, false));

				$this->setRedirect(JRoute::_(($redirect = $app->getUserState('com_users.edit.profile.redirect')) ? $redirect : 'index.php?option=com_users&view=profile&layout=step2&Itemid=141', false));
				break;
		}
		// Flush the data from the session.
		$app->setUserState('com_users.edit.profile.data', null);


	}

	public function save3()
	{

		/*$db =& JFactory::getDBO();
		 $query = "SELECT * FROM twit2pay_users";
		$db->setQuery( $query );
		$ses_var = $db->loadObjectList();


		print_r($ses_var);die;*/

		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$app	= JFactory::getApplication();
		$model	= $this->getModel('Profile', 'UsersModel');
		$user	= JFactory::getUser();
		$userId	= (int) $user->get('id');

		// Get the user data.
		$data = $app->input->post->get('jform', array(), 'array');

		// Force the ID to this user.
		$data['id'] = $userId;
		// Validate the posted data.
		$form = $model->getForm();
		if (!$form)
		{
			JError::raiseError(500, $model->getError());
			return false;
		}
		// Validate the posted data.
			
		$data = $model->validate($form, $data);

		// Check for errors.
		if ($data === false)
		{
			// Get the validation messages.
			$errors	= $model->getErrors();

			// Push up to three validation messages out to the user.
			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++)
			{
				if ($errors[$i] instanceof Exception)
				{
					$app->enqueueMessage($errors[$i]->getMessage(), 'warning');
				} else {
					$app->enqueueMessage($errors[$i], 'warning');
				}
			}

			// Save the data in the session.
			$app->setUserState('com_users.edit.profile.data', $data);

			// Redirect back to the edit screen.
			$userId = (int) $app->getUserState('com_users.edit.profile.id');
			$this->setRedirect(JRoute::_('index.php?option=com_users&view=profile&layout=step4&Itemid=126&user_id='.$userId, false));
			return false;
		}
		// Validate the posted data.
		//$data = $model->validate($form, $data);

		// Attempt to save the data.
		$return	= $model->save($data);
		//echo '<pre>';print_r($data);die;
		// Check for errors.
		if ($return === false)
		{
			// Save the data in the session.
			$app->setUserState('com_users.edit.profile.data', $data);

			// Redirect back to the edit screen.
			$userId = (int) $app->getUserState('com_users.edit.profile.id');
			$this->setMessage(JText::sprintf('COM_USERS_PROFILE_SAVE_FAILED', $model->getError()), 'warning');
			$this->setRedirect(JRoute::_('index.php?option=com_users&view=profile&layout=step3&Itemid=125&user_id='.$userId, false));
			return false;
		}

		// Redirect the user and adjust session state based on the chosen task.
		switch ($this->getTask())
		{
			case 'apply':
				// Check out the profile.
				$app->setUserState('com_users.edit.profile.id', $return);
				$model->checkout($return);

				// Redirect back to the edit screen.
				//$this->setMessage(JText::_('COM_USERS_PROFILE_SAVE_SUCCESS'));
				$this->setRedirect(JRoute::_(($redirect = $app->getUserState('com_users.edit.profile.redirect')) ? $redirect : 'index.php?option=com_users&view=profile&layout=step4&Itemid=126&hidemainmenu=1', false));
				break;

			default:
				// Check in the profile.
				$userId = (int) $app->getUserState('com_users.edit.profile.id');
				if ($userId)
				{
					$model->checkin($userId);
				}

				// Clear the profile id from the session.
				$app->setUserState('com_users.edit.profile.id', null);

				// Redirect to the list screen.
				//$this->setMessage(JText::_('COM_USERS_PROFILE_SAVE_SUCCESS'));
				$this->setRedirect(JRoute::_(($redirect = $app->getUserState('com_users.edit.profile.redirect')) ? $redirect : 'index.php?option=com_users&view=profile&layout=step4&Itemid=126&user_id='.$return, false));
				break;
		}

		// Flush the data from the session.
		$app->setUserState('com_users.edit.profile.data', null);
	}


	public function save4()
	{
		/*$db =& JFactory::getDBO();
		 $query = "SELECT * FROM twit2pay_users";
		$db->setQuery( $query );
		$ses_var = $db->loadObjectList();


		print_r($ses_var);die;*/

		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$app	= JFactory::getApplication();
		$model	= $this->getModel('Profile', 'UsersModel');
		$user	= JFactory::getUser();
		$userId	= (int) $user->get('id');

		// Get the user data.
		$data = $app->input->post->get('jform', array(), 'array');

		// Force the ID to this user.
		$data['id'] = $userId;
		// Validate the posted data.
		$form = $model->getForm();
		if (!$form)
		{
			JError::raiseError(500, $model->getError());
			return false;
		}
		// Validate the posted data.

		$data = $model->validate($form, $data);

		// Check for errors.
		if ($data === false)
		{
			// Get the validation messages.
			$errors	= $model->getErrors();

			// Push up to three validation messages out to the user.
			for ($i = 0, $n = count($errors); $i < $n && $i < 3; $i++)
			{
				if ($errors[$i] instanceof Exception)
				{
					$app->enqueueMessage($errors[$i]->getMessage(), 'warning');
				} else {
					$app->enqueueMessage($errors[$i], 'warning');
				}
			}

			// Save the data in the session.
			$app->setUserState('com_users.edit.profile.data', $data);

			// Redirect back to the edit screen.
			$userId = (int) $app->getUserState('com_users.edit.profile.id');
			$this->setRedirect(JRoute::_('index.php?option=com_content&view=article&id=10&Itemid=127', false));
			return false;
		}
		// Validate the posted data.
		//$data = $model->validate($form, $data);

		// Attempt to save the data.
		$return	= $model->save($data);
		// Check for errors.
		if ($return === false)
		{
			// Save the data in the session.
			$app->setUserState('com_users.edit.profile.data', $data);

			// Redirect back to the edit screen.
			$userId = (int) $app->getUserState('com_users.edit.profile.id');
			$this->setMessage(JText::sprintf('COM_USERS_PROFILE_SAVE_FAILED', $model->getError()), 'warning');
			$this->setRedirect(JRoute::_('index.php?option=com_users&view=profile&layout=step4&Itemid=126&user_id='.$userId, false));
			return false;
		}

		// Redirect the user and adjust session state based on the chosen task.
		switch ($this->getTask())
		{
			case 'apply':
				// Check out the profile.
				$app->setUserState('com_users.edit.profile.id', $return);
				$model->checkout($return);

				// Redirect back to the edit screen.
				//$this->setMessage(JText::_('COM_USERS_PROFILE_SAVE_SUCCESS'));
				$this->setRedirect(JRoute::_(($redirect = $app->getUserState('com_users.edit.profile.redirect')) ? $redirect : 'index.php?option=com_content&view=article&id=10&Itemid=127', false));
				break;

			default:
				// Check in the profile.
				$userId = (int) $app->getUserState('com_users.edit.profile.id');
				if ($userId)
				{
					$model->checkin($userId);
				}

				// Clear the profile id from the session.
				$app->setUserState('com_users.edit.profile.id', null);

				// Redirect to the list screen.
				//$this->setMessage(JText::_('COM_USERS_PROFILE_SAVE_SUCCESS'));
				$this->setRedirect(JRoute::_(($redirect = $app->getUserState('com_users.edit.profile.redirect')) ? $redirect : 'index.php?option=com_content&view=article&id=10&Itemid=127', false));
				break;
		}

		// Flush the data from the session.
		$app->setUserState('com_users.edit.profile.data', null);
	}

}

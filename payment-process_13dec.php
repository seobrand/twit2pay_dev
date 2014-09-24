<?php
$directory = realpath(dirname(__FILE__)).'/'; // path to joomla installation
define( '_JEXEC', 1 );
define( 'JPATH_BASE', $directory);
define( 'DS', '/' );

require_once ( JPATH_BASE .DS . 'configuration.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );

require_once ( JPATH_BASE .DS.'libraries'.DS.'joomla'.DS.'factory.php' );
require_once ( JPATH_BASE .DS.'libraries'.DS.'TwitterAPIExchange.php' );
require_once ( JPATH_BASE .DS . 'manage-api-key.php' );

/*$token = '788739937-h59OmiJ567yosl8COmBEctwqSBakFgKApF07BbYc';
$token_secret = 'gy5mtTdysLVQ0bDxL4P0vBcL8tGV6FKgZuufQE844';
$consumer_key = 'Lgondc3bWLQ9SNUw3wDkxg';
$consumer_secret = '6cwRoSM6j4cSFuZgTfBFtpb2gvofERnd5DcSJrKyj6U';

$settings = array(
		'oauth_access_token' => "$token",
		'oauth_access_token_secret' => "$token_secret",
		'consumer_key' => "$consumer_key",
		'consumer_secret' => "$consumer_secret"
);
*/
/*function for genrate random string */
function randomToken() {
	$alphabet = "0123456789";
	$pass = array(); //remember to declare $pass as an array
	for ($i = 0; $i < 8; $i++) {
		$n = rand(0, strlen($alphabet)-1); //use strlen instead of count
		$pass[$i] = $alphabet[$n];
	}
	return implode($pass); //turn the array into a string
}

/*save twits on __twits_logs  */
date_default_timezone_set('Europe/London');
$db =& JFactory::getDBO();
//echo strtotime("Wed Sep 25 20:00:49 +0000 2013").'</br>';
//echo date('y-m-d h:i:s a',strtotime("Wed Sep 25 20:00:49 +0000 2013"));
//get has tag form db
$qu = "SELECT name FROM #__tweet_strings";
$db->setQuery($qu);
$db->query();
$hashes = $db->loadObjectList();

//get last id from twits logs
$qu1 = "SELECT twit_id FROM #__twits_logs order by twit_id desc limit 1";
$db->setQuery($qu1);
$db->query();
$cnt = $db->getNumRows();

if($cnt != 0){
	$twitId = $db->loadObject();
	$since_id = $twitId->twit_id;
	$until = date('Y-m-d',time());
}

foreach ($hashes as $hashtag){
	$name = $hashtag->name;
	$url = 'https://api.twitter.com/1.1/search/tweets.json';
	if($cnt != 0){
		$getfield = '?q=%23'.$name.'%2BAND%2B%23twt2pay&since_id='.$since_id.'&include_entities=true';
	}else{
		$getfield = '?q=%23'.$name.'%2BAND%2B%23twt2pay&count=&include_entities=true';
	}


	$requestMethod = 'GET';

	$twitter = new TwitterAPIExchange($settings);
	$ape	=	$twitter->setGetfield($getfield)
	->buildOauth($url, $requestMethod)
	->performRequest();
	$twits = json_decode($ape);
	//echo '<pre>';print_r($twits);
	foreach($twits as $twit)
	{
		foreach($twit as $twi)
		{
			if($twi->id_str != 0){
				$tuserId = $twi->user->id;
				$tuserName = $twi->user->name;
				$tscreenName = $twi->user->screen_name;
				// echo '<pre>'; print_r($twi); echo '</pre>';die;
				$twit_date = strtotime($twi->created_at);
				$q1 = "INSERT INTO  #__twits_logs (`twit_id`, `twit_user`, `twit_screen_name`, `twit_text`, `hastag`, `created_date`, `twit_uid`, `message`) VALUES ('$twi->id_str', '$tuserName', '$tscreenName', '$twi->text', '$name', '$twit_date', '$tuserId', 'no')";
				$db->setQuery($q1);
				$db->query();
			}
		}
	}
}


/* Process Registration twit*/

    //get last id from twits logs
    $qu1 = "SELECT twit_id FROM #__twits_logs order by twit_id desc limit 1";
    $db->setQuery($qu1);
    $db->query();
    $cnt = $db->getNumRows();

     if($cnt != 0){
	    $twitId = $db->loadObject();
	    $since_id = $twitId->twit_id;
	    $until = date('Y-m-d',time());
     }
	 
	$url = 'https://api.twitter.com/1.1/search/tweets.json';
	if($cnt != 0){
	    $getfield = '?q=%23register%2BAND%2B%23twt2pay&since_id='.$since_id.'&include_entities=true';
	}else{
		$getfield = '?q=%23register%2BAND%2B%23twt2pay&count=&include_entities=true';
	}

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
			if($twi->id_str != 0){
				$tuserId = $twi->user->id;
				$tuserName = $twi->user->name;
				$tscreenName = $twi->user->screen_name;
				
				$q = "SELECT * FROM #__users WHERE `username` LIKE '".str_replace(' ','',$tuserName)."' LIMIT 1";
  		        $db->setQuery($q);
  		        $db->query();
  		        $usrcnt = $db->getNumRows();
  		      if($usrcnt == 0){
				// echo '<pre>'; print_r($twi); echo '</pre>';die;
				$twit_date = strtotime($twi->created_at);
				$q1 = "INSERT INTO  #__twits_logs (`twit_id`, `twit_user`, `twit_screen_name`, `twit_text`, `hastag`, `created_date`, `twit_uid`, `message`) VALUES ('$twi->id_str', '$tuserName', '$tscreenName', '$twi->text', 'register', '$twit_date', '$tuserId', 'no')";
				$db->setQuery($q1);
				$db->query();
				
			     $q_msg = "SELECT * FROM #__twits_logs WHERE `twit_id` = '$twi->id_str' and `message` = 'no' and `transaction` = 'no'";
  		         $db->setQuery($q_msg); 
  		         $db->query();
  		         $msgcnt = $db->getNumRows();
  		    	if($msgcnt != 0){ 
		         /* retweet for create account */
  		    		$rand = randomToken();
  		    		
  		    		$url = 'https://api.twitter.com/1.1/statuses/update.json';
  		    		$postfields = array(
  		    				'status' => '@'.$tscreenName.' create your account on twt2pay '.JURI::base().' ##'.$rand,
  		    				'in_reply_to_status_id' => $twi->id_str
  		    		);
					//print_r($postfields);
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



/* Process Registration twit */



/* Process Transaction */


$db =& JFactory::getDBO();

/* Get Active product has tag form db */
$qu = "SELECT * FROM #__tweet_strings where `status` = 'active'";
$db->setQuery($qu);
$db->query();
$hashes = $db->loadObjectList();

foreach ($hashes as $hashtag){
  $name = $hashtag->name;
  $pro_id = $hashtag->product_id;
  $pro_price = $hashtag->price;
  $pro_groupId = $hashtag->product_group_id;
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
  		// echo '<pre>'; print_r($twi); echo '</pre>';die;
  		if($twi->id_str != 0){
  		  $tuserId = $twi->user->id;
  		  $tuserName = str_replace(' ', '', strtolower($twi->user->name));
  		  $tscreenName = $twi->user->screen_name;
  		  /* check registered user for payment process */
  		  $q = "SELECT * FROM #__users WHERE `username` LIKE '".str_replace(' ','',$tuserName)."' LIMIT 1";
  		  $db->setQuery($q);
  		  $db->query();
  		  $usrcnt = $db->getNumRows();
  		 
  		    if($usrcnt != 0){
  		       $userinfo = $db->loadObject();
  		       $crm_customer_id = $userinfo->crm_customer_id;
  		       $userId = $userinfo->id;
  		       $userName = $userinfo->username;
			   
			 /*Check CC info for crm id */  
  		       $q_checkcc = "SELECT * FROM #__cc_logs WHERE `cust_id` = '$crm_customer_id' LIMIT 1";
  		       $db->setQuery($q_checkcc);
  		       $db->query();
			   $checkcc = $db->getNumRows();
			   
			   
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
  		        if($trcnt == 0 && $checkcc != 0){
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
					
					if ( !empty($result) )
						$xml_array = json_decode(json_encode((array)simplexml_load_string($result)),1);
					//echo '<pre>';print_r($xml_array);
					$response = $xml_array['run_transaction_results']['run_transaction_result']['response'];
					$response_text = $xml_array['run_transaction_results']['run_transaction_result']['response_text'];
					$transaction_id  = $xml_array['run_transaction_results']['run_transaction_result']['transactionid'];
					$rand = randomToken();
					if($response == 1){
						$transaction='Approved';
					
						/* post thank you message on twitter */

						

						$url = 'https://api.twitter.com/1.1/direct_messages/new.json';
						$postfields = array(
								'text' => 'Thank you for purchase '.$name.' on twt2pay '.JURI::base().' ##'.$rand,
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
								'status' => '@'.$tscreenName.' thank you for purchase '.$name.' on twt2pay '.JURI::base().' ##'.$rand,
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
					 						'text' => 'Your transaction for '.$name.' has been failed, check your transaction status on twt2pay '.JURI::base().' ##'.$rand,
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
					 						'status' => '@'.$tscreenName.' your transaction for '.$name.' has been failed, check your transaction status on twt2pay '.JURI::base().' ##'.$rand,
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
					 						'text' => 'Your transaction for '.$name.' has been failed, check your transaction status on twt2pay '.JURI::base().' ##'.$rand,
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
					 						'status' => '@'.$tscreenName.' your transaction for '.$name.' has been failed, check your transaction status on twt2pay '.JURI::base().' ##'.$rand,
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
						 
						/* Post failed transaction message on twitter */
					
					 				$url = 'https://api.twitter.com/1.1/direct_messages/new.json';
					 				$postfields = array(
					 						'text' => 'Your transaction for '.$name.' has been failed, check your transaction status on twt2pay '.JURI::base().' ##'.$rand,
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
					 						'status' => '@'.$tscreenName.' your transaction for '.$name.' has been failed, check your transaction status on twt2pay '.JURI::base().' ##'.$rand,
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
  		    }else{
  		      $q_msg = "SELECT * FROM #__twits_logs WHERE `twit_id` = '$twi->id_str' and `message` = 'no' and `transaction` = 'no'";
  		      $db->setQuery($q_msg); 
  		      $db->query();
  		      $msgcnt = $db->getNumRows();
  		    	if($msgcnt != 0){ 
		         /* retweet for create account */
  		    		$rand = randomToken();
  		    		
  		    		$url = 'https://api.twitter.com/1.1/statuses/update.json';
  		    		$postfields = array(
  		    				'status' => '@'.$tscreenName.' create your account on twt2pay '.JURI::base().' ##'.$rand,
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

?>
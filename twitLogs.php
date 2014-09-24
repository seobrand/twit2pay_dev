<?php
$directory = realpath(dirname(__FILE__)).'/'; // path to joomla installation
define( '_JEXEC', 1 );
define( 'JPATH_BASE', $directory);
define( 'DS', '/' );

require_once ( JPATH_BASE .DS . 'configuration.php' );
require_once ( JPATH_BASE .DS . 'virtue-function.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );

require_once ( JPATH_BASE .DS.'libraries'.DS.'joomla'.DS.'factory.php' );
require_once ( JPATH_BASE .DS.'libraries'.DS.'TwitterAPIExchange.php' );
require_once ( JPATH_BASE .DS . 'manage-api-key.php' );
$virtue = new customFunctions();

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
$hashes = $virtue->getHash();

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
	$name = $hashtag->product_sku;
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
	//echo '<pre>';print_r($twits);die;
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
?>
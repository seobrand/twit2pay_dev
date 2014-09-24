<?php
/**
 * @package                Joomla.Site
 * @subpackage	Templates.beez_20
 * @copyright        Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

$template_base_url=$this->baseurl . '/templates/twit-home';
$template_image_base_url=$template_base_url.'/images/';
$template_css_base_url=$template_base_url.'/css/';
$template_js_base_url=$template_base_url.'/js/';

// get title
$mydoc =JFactory::getDocument();
$mytitle = $mydoc->getTitle();

$app = JFactory::getApplication();

$menu = $app->getMenu();
// get active menu id
 $activeId = $menu->getActive()->id;

// get active menu
$active   = $menu->getActive();

if ($menu->getActive() == $menu->getDefault()) {

	$home = 1;

}

jimport('joomla.filesystem.file');

// check modules
$showRightColumn	= ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom			= ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft			= ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn==0 and $showleft==0) {
	$showno = 0;
}

JHtml::_('behavior.framework', true);

// get params
$color				= $this->params->get('templatecolor');
$logo				= $this->params->get('logo');
$navposition		= $this->params->get('navposition');
$app				= JFactory::getApplication();
$doc				= JFactory::getDocument();
$templateparams		= $app->getTemplate(true)->params;



$files = JHtml::_('stylesheet', 'templates/'.$this->template.'/css/general.css', null, false, true);
if ($files):
	if (!is_array($files)):
		$files = array($files);
	endif;
	foreach($files as $file):
		$doc->addStyleSheet($file);
	endforeach;
endif;

//$doc->addStyleSheet('templates/'.$this->template.'/css/'.htmlspecialchars($color).'.css');
if ($this->direction == 'rtl') {
	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/template_rtl.css');
	if (file_exists(JPATH_SITE . '/templates/' . $this->template . '/css/' . $color . '_rtl.css')) {
		$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/'.htmlspecialchars($color).'_rtl.css');
	}
}

//$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/md_stylechanger.js', 'text/javascript');
//$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/hide.js', 'text/javascript');
$doc->addStyleSheet($template_css_base_url. 'reset.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($template_css_base_url. 'style.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($template_css_base_url. 'colorbox.css', $type = 'text/css', $media = 'screen,projection');

$doc->addScript($template_js_base_url.'pie_class.js', 'text/javascript');

$user =& JFactory::getUser();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<jdoc:include type="head" />
<script src="<?php echo $template_js_base_url?>jquery.colorbox.js"></script>
<script src="<?php echo $template_js_base_url?>script.js"></script>
<!--[if (IE 7)|(IE 8)]>
<script src="<?php echo $template_js_base_url?>html5.js" type="text/javascript"></script>
<![endif]-->
<!--[if lt IE 10]>
<script type="text/javascript" src="<?php echo $template_js_base_url?>PIE.js"></script>
<![endif]-->

<script>
jQuery(document).ready(function (){
	jQuery("li.welcome_nav").hover(function() {
	jQuery("#loginpopup").css({"display":"block"});
		
	}, function(){
		jQuery("#loginpopup").css({"display":"none"});
		});
});

jQuery(document).ready(function (){
	jQuery(".welcome_nav").hover(function() {
	jQuery("#header_inner_cus ul li ul").toggle();
		
	})
})

function onCustomButtonClick2(){
eval("$SL.util.openWindow('https://twit2pay-93.hub.loginradius.com/requesthandlor.aspx?apikey=46326c47-80d8-4655-adff-03e5cbe5dedf&provider=twitter&callback=http%3A%2F%2F192.168.100.93%2Fgaurav%2Ftwt2pay%2Fpro%2F&scope=')")
}
</script>
<!--[if lte IE 6]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ieonly.css" rel="stylesheet" type="text/css" />
<?php if ($color=="personal") : ?>
<style type="text/css">
#line {
	width:98% ;
}
.logoheader {
	height:200px;
}
#header ul.menu {
	display:block !important;
	width:98.2% ;
}
</style>
<?php endif; ?>
<![endif]-->

<!--[if IE 7]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 8]>
  <link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie8.css" />
  
<![endif]-->
<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/css3-mediaqueries.js"></script>
<script type="text/javascript">
	var big ='<?php echo (int)$this->params->get('wrapperLarge');?>%';
	var small='<?php echo (int)$this->params->get('wrapperSmall'); ?>%';
	var altopen='<?php echo JText::_('TPL_BEEZ2_ALTOPEN', true); ?>';
	var altclose='<?php echo JText::_('TPL_BEEZ2_ALTCLOSE', true); ?>';
	var bildauf='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/plus.png';
	var bildzu='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/minus.png';
	var rightopen='<?php echo JText::_('TPL_BEEZ2_TEXTRIGHTOPEN', true); ?>';
	var rightclose='<?php echo JText::_('TPL_BEEZ2_TEXTRIGHTCLOSE', true); ?>';
	var fontSizeTitle='<?php echo JText::_('TPL_BEEZ2_FONTSIZE', true); ?>';
	var bigger='<?php echo JText::_('TPL_BEEZ2_BIGGER', true); ?>';
	var reset='<?php echo JText::_('TPL_BEEZ2_RESET', true); ?>';
	var smaller='<?php echo JText::_('TPL_BEEZ2_SMALLER', true); ?>';
	var biggerTitle='<?php echo JText::_('TPL_BEEZ2_INCREASE_SIZE', true); ?>';
	var resetTitle='<?php echo JText::_('TPL_BEEZ2_REVERT_STYLES_TO_DEFAULT', true); ?>';
	var smallerTitle='<?php echo JText::_('TPL_BEEZ2_DECREASE_SIZE', true); ?>';
</script>
<script type="text/javascript" src="<?php echo $template_js_base_url ?>jquery.fancybox.js?v=2.1.5"></script>
<link href="<?php echo $template_css_base_url ?>jquery.fancybox.css?v=2.1.5" rel="stylesheet" type="text/css" />
<script type="text/javascript">
jQuery(document).ready(function() {
/*
*  Simple image gallery. Uses default settings
*/

jQuery('.fancybox').fancybox();

/*
*  Different effects
*/

// Change title type, overlay closing speed
jQuery(".fancybox-effects-a").fancybox({
helpers: {
title : {
	type : 'outside'
},
overlay : {
	speedOut : 0
}
}
});

// Disable opening and closing animations, change title type
jQuery(".fancybox-effects-b").fancybox({
openEffect  : 'none',
closeEffect	: 'none',

helpers : {
title : {
	type : 'over'
}
}
});

// Set custom style, close if clicked, change title type and overlay color
jQuery(".fancybox-effects-c").fancybox({
wrapCSS    : 'fancybox-custom',
closeClick : true,

openEffect : 'none',

helpers : {
title : {
	type : 'inside'
},
overlay : {
	css : {
		'background' : 'rgba(238,238,238,0.85)'
	}
}
}
});

// Remove padding, set opening and closing animations, close if clicked and disable overlay
jQuery(".fancybox-effects-d").fancybox({
padding: 0,

openEffect : 'elastic',
openSpeed  : 150,

closeEffect : 'elastic',
closeSpeed  : 150,

closeClick : true,

helpers : {
overlay : null
}
});

/*
*  Button helper. Disable animations, hide close button, change title type and content
*/

jQuery('.fancybox-buttons').fancybox({
openEffect  : 'none',
closeEffect : 'none',

prevEffect : 'none',
nextEffect : 'none',

closeBtn  : false,

helpers : {
title : {
	type : 'inside'
},
buttons	: {}
},

afterLoad : function() {
this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
}
});


/*
*  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
*/

jQuery('.fancybox-thumbs').fancybox({
prevEffect : 'none',
nextEffect : 'none',

closeBtn  : false,
arrows    : false,
nextClick : true,

helpers : {
thumbs : {
	width  : 50,
	height : 50
}
}
});

/*
*  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
*/
jQuery('.fancybox-media')
.attr('rel', 'media-gallery')
.fancybox({
openEffect : 'none',
closeEffect : 'none',
prevEffect : 'none',
nextEffect : 'none',

arrows : false,
helpers : {
	media : {},
	buttons : {}
}
});

/*
*  Open manually
*/

jQuery("#fancybox-manual-a").click(function() {
jQuery.fancybox.open('1_b.jpg');
});

jQuery("#fancybox-manual-b").click(function() {
jQuery.fancybox.open({
href : 'iframe.html',
type : 'iframe',
padding : 5
});
});

jQuery("#fancybox-manual-c").click(function() {
jQuery.fancybox.open([
{
	href : '1_b.jpg',
	title : 'My title'
}, {
	href : '2_b.jpg',
	title : '2nd title'
}, {
	href : '3_b.jpg'
}
], {
helpers : {
	thumbs : {
		width: 75,
		height: 50
	}
}
});
});


});
</script>
<?php if(!$user->guest) { ?>
<script type="text/javascript">

var timer = 0;
function set_interval() {
  // the interval 'timer' is set as soon as the page loads
  timer = setInterval("auto_logout()", 300000);
  // the figure '10000' above indicates how many milliseconds the timer be set to.
  // Eg: to set it to 5 mins, calculate 5min = 5x60 = 300 sec = 300,000 millisec.
  // So set it to 300000
}

function reset_interval() {
  //resets the timer. The timer is reset on each of the below events:
  // 1. mousemove   2. mouseclick   3. key press 4. scroliing
  //first step: clear the existing timer

  if (timer != 0) {
    clearInterval(timer);
    timer = 0;
    // second step: implement the timer again
    timer = setInterval("auto_logout()", 300000);
    // completed the reset of the timer
  }
}

function auto_logout() {
  // this function will redirect the user to the logout script
  window.location = "index.php?option=com_quicklogout&view=quicklogout&Itemid=111";
}

// Add the following attributes into your BODY tag
</script>
<?php }?>
</head>
<?php if(!$user->guest) { ?>
<body onload="set_interval()" onmousemove="reset_interval()" onclick="reset_interval()" onkeypress="reset_interval()" onscroll="reset_interval()">
<?php }else{?>
<body>
<?php }?>
<a class="fancybox" href="#inline1" title="" style="display:none">Inline</a>
<?php if($_SESSION['update'] != ''){?>
<script type="text/javascript">
jQuery( document ).ready(function() {
                		jQuery(".fancybox").trigger('click');
                		});
                	</script>
                    <div id="inline1" style="width:450px;display: none;">
                    <div class="user_update">
                    <h3>Message</h3>
                    <?php if($_SESSION['update'] == 'success'){?>
			        <p><img src="<?php echo $template_image_base_url?>mess_right.gif" alt="pic" style="vertical-align:middle"/><?php echo  $_SESSION['msg']?></p>
                    <?php }elseif($_SESSION['update'] == 'error'){?>
                     <p><img src="<?php echo $template_image_base_url?>mess_wrong.png" alt="pic" style="vertical-align:middle"/><?php echo  $_SESSION['msg']?></p>
                     <?php }?>
                    </div>
                    </div>
                    
<?php 
unset($_SESSION['update']);
unset($_SESSION['msg']);
}?>                  
<!--start header-->
<header id="header_main">
  <div id="header_outer">
  
   
     <?php if($user->guest) { ?>
      <div id="header_inner_cus" class="clearfix">
      <ul>
        <li><a>Log in</a>
        </li>
        <li class="welcome_nav"><a href="javascript:void(0)">Buyer</a>
        <ul>
        <li style="background:none; display:inline; height:60px; padding:0">
        <a href="#" onclick="onCustomButtonClick2();"><img src="<?php echo $template_image_base_url?>signin-twitter.png" width="170" height="27" alt="dk"></a>
        <div class="step_one" style="display:none">
        <div class="social_log">
      <jdoc:include type="modules" name="social-login" />
      </div>
      </div></li>
        </ul>
        </li>
        <li><a href="http://mojopay.com/twt2pay.html" target="_blank">Merchant</a></li>      
      </ul>
    </div>
     <?php }else{?>
     <div id="header_inner" class="clearfix">
      <ul>
        <li class="welcome_nav"><a href="#" >Welcome <?php echo $user->name?>!</a>
        <div style="display:none;" id="loginpopup">
          <ul>
            <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_users&view=profile&layout=step1&Itemid=140">My Account</a></li>
           <!-- <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_users&view=profile&layout=step1&Itemid=140">My Profile</a></li>-->
            <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_users&view=profile&layout=step2&Itemid=141">Update My Credit Card</a></li>
            <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=article&id=13&Itemid=139">My Purchase</a></li>
            <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_quicklogout&view=quicklogout&Itemid=111">Log Out</a></li>
          </ul>
          </div>
        </li>
      </ul>
      
      </div>
      <?php }?>
    
  </div>
  <div id="header_logo"><a href="<?php echo JURI::base() ?>"><img src="<?php echo $template_image_base_url?>logo.png" width="201" height="71" alt=" "></a></div>
</header>
<!--end header-->
<section id="container_outer">
  <div class="page_heading">Account Settings</div>
  <div id="main_pg_container">
    <div id="main_page_inner">
      <div class="menu_outer clearfix">
        <div class="site_title"><span><?php echo $mytitle?></span></div>
        <nav>
          <ul class="clearfix">
           <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_users&view=profile&layout=step1&Itemid=140" class="address_link <?php if($activeId == 140){?>active<?php }?>"><span>Profile</span></a></li>
            <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=article&id=13&Itemid=139" class="history_link <?php if($activeId == 139){?>active<?php }?>"><span>History</span></a></li>
          
            <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_users&view=profile&layout=step1&Itemid=141" class="billing_link <?php if($activeId == 141){?>active<?php }?>"><span>Billing</span></a></li>
          </ul>
        </nav>
      </div>
    
  <?php  
  function randomToken() {
  	$alphabet = "0123456789";
  	$pass = array(); //remember to declare $pass as an array
  	for ($i = 0; $i < 8; $i++) {
  		$n = rand(0, strlen($alphabet)-1); //use strlen instead of count
  		$pass[$i] = $alphabet[$n];
  	}
  	return implode($pass); //turn the array into a string
  }
  
   if ($activeId == 139)
		{
   ?>
   </div>
   <div class="payment_history_box">
	<?php 		
	
	
			$db =& JFactory::getDBO();
			
			$user	= JFactory::getUser();
			$userId	= (int) $user->get('id');
		
			$q = "SELECT * FROM #__transactions WHERE `replyed_user_id` = '$userId'";
			$db->setQuery($q);
			$db->query();
			$ses_var = $db->getNumRows(); 

			
			if ( $ses_var != 0 )
			{
				$ses_var = $db->loadObjectList();
				
				//echo '<pre>';print_r($ccInfo);
			echo '<table  class="payment_tbl">';
			echo '<thead><tr>';
			echo '<td colspan="7" class="right_txt_td"><a href="#inline_content" class="inline">Customer Support</a></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<th class="history_order_no">Order Number</th>
			      <th class="cc_info">Card Number</th>
			      <th class="pay_trans_date">Date</th>
                  <th class="pay_purchase">Item</th>
                  <th class="pay_hash">Hashtag</th>
                  <th class="pay_cost">Cost</th>
			      <th class="status">Status</th>';
			echo '</tr></thead><tbody>'; 
			foreach( $ses_var as $ses_va)
			{
				if($ses_va->transaction_id == 0 || $ses_va->transaction_id == ''){
					$orderNo = '--';
				}else{
					
					$orderNo = $ses_va->transaction_id;
				} 
				echo '<tr>';
				echo '<td style="text-align:center">'.$orderNo.'</td>';  
				echo '<td>'.$ses_va->cc_number.'</td>'; 
				echo '<td>'.date('Y-m-d',strtotime($ses_va->transaction_date)).'</td>';
				echo '<td>'.$ses_va->hastag.'</td>';
				echo '<td>#'.$ses_va->hastag.'</td>';
				echo '<td>$'.$ses_va->price.'</td>';
				echo '<td>'.$ses_va->response_text.'</td>';
				echo '</tr>';
			}
			echo '</tbody></table>';
			
			}else{
              echo "<p style='padding-left:36px;'>No transaction exist..</p>";
             }
		}elseif ($activeId == 140 || $activeId == 141){?>
              <jdoc:include type="component" />
        <?php  }elseif($activeId == 136){?>

     <!--   <jdoc:include type="component" />-->
      <?php
      include 'twitLogs.php';
		require_once( JPATH_LIBRARIES. '/TwitterAPIExchange.php');
		$token = '788739937-h59OmiJ567yosl8COmBEctwqSBakFgKApF07BbYc';
		$token_secret = 'gy5mtTdysLVQ0bDxL4P0vBcL8tGV6FKgZuufQE844';
		$consumer_key = 'Lgondc3bWLQ9SNUw3wDkxg';
		$consumer_secret = '6cwRoSM6j4cSFuZgTfBFtpb2gvofERnd5DcSJrKyj6U';

		$settings = array(
			'oauth_access_token' => "$token",
			'oauth_access_token_secret' => "$token_secret",
			'consumer_key' => "$consumer_key",
			'consumer_secret' => "$consumer_secret"
		);


		if ( $_POST['test_me'] == 1)
		{
			$db =& JFactory::getDBO();
			
			foreach($_POST['tweet_usr'] as $key=>$balue) 
			{
				$hastag = $_POST['tweet_screen_name'][$key];
				
				$q_twlogs = "SELECT * FROM #__twits_logs WHERE `twit_id` = '$key' and `message` = 'no' and `transaction` = 'no'";
				$db->setQuery($q_twlogs);
				$db->query();
				$msgcnt = $db->getNumRows();
				
			    $q = "SELECT * FROM #__users WHERE `username` LIKE '$balue' LIMIT 1";
				$db->setQuery($q);
				$db->query();
			    $ses_var = $db->getNumRows();
				
				$replyed_user_id	=	0;
				if ( $ses_var != 0 )
				{
					$ses_var = $db->loadObject();
					$replyed_user_id	=	$ses_var->id;
					$crm_customer_id	=	$ses_var->crm_customer_id;
				}
				elseif($msgcnt != 0)   // re tweet because it is not in our DB. ask user to register with us.
				{
					$rand = randomToken();
				
					$url = 'https://api.twitter.com/1.1/statuses/update.json';
					$postfields = array(
						'status' => '@'.$_POST['tweet_screen_name'][$key].' create your account on twt2pay http://twt2pay.com ##'.$rand,
						'in_reply_to_status_id' => $key
					);
					$requestMethod = 'POST';
					$twitter = new TwitterAPIExchange($settings);
					$twitter->buildOauth($url, $requestMethod)
								 ->setPostfields($postfields)
								 ->performRequest();
					
					//perform update on twit logs
					$q2 = "UPDATE  #__twits_logs set `message` = 'yes' WHERE `twit_id` = '$key' LIMIT 1";
					$db->setQuery($q2);
					$db->query();
					
					/*$url = 'https://api.twitter.com/1.1/direct_messages/new.json';
				$postfields = array(
						'text' => 'create your account on twt2pay http://twt2pay.com ##'.$rand,
						'screen_name' => $_POST['tweet_screen_name'][$key]
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
		                'status' => '@'.$_POST['tweet_screen_name'][$key].' create your account on twt2pay http://twt2pay.com ##'.$rand,
		                'in_reply_to_status_id' => $key
                         );
                        $requestMethod = 'POST';
                        $twitter = new TwitterAPIExchange($settings);
                        $twitter->buildOauth($url, $requestMethod)
                        ->setPostfields($postfields)
                        ->performRequest();
	
                      //perform update on twit logs
                     $q2 = "UPDATE  #__twits_logs set `message` = 'yes' WHERE `twit_id` = '$key' LIMIT 1";
                     $db->setQuery($q2);
                     $db->query();
                     }*/

					
					//echo '<pre>';print_r($responsedmsg);die;
				}
				
				//get twit info from twit logs
				
				$q2 = "SELECT * FROM #__transactions WHERE `tweet_id` LIKE '$key' LIMIT 1";
				$db->setQuery($q2);
				$db->query();
				$cnt = $db->getNumRows();
				
				//checking active product in db
				$p_name=	$_POST['product_name'];
				$db =& JFactory::getDBO();
				$qu = "SELECT product_id, price, name, product_group_id FROM #__tweet_strings WHERE name like '$p_name' and status = 'active'";
				$db->setQuery($qu);
				$db->query();
			    $procnt = $db->getNumRows();
				$p_lists = $db->loadObject();
				
				/*Get id from __twit_logs  */
				$q_twit = "SELECT * FROM #__twits_logs WHERE `twit_id` = '$key' LIMIT 1";
				$db->setQuery($q_twit);
				$db->query();
				$twit_logs = $db->loadObject();
				$twit_logId = $twit_logs->id;
				
				
				if ( $cnt == 0 && $replyed_user_id != 0 && $procnt !=0)
				{
					
							
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
												<product_group_key>'.$p_lists->product_group_id.'</product_group_key>
												<products>
													<product>
														<product_id>'.$p_lists->product_id.'</product_id>
														<amount>'.$p_lists->price.'</amount>
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
                          
                          //post thank you message on twitter
                           
                          $url = 'https://api.twitter.com/1.1/direct_messages/new.json';
                          $postfields = array(
                          		'text' => 'Thank you for purchase '.$p_lists->name.' on twt2pay http://twt2pay.com ##'.$rand,
                          		'screen_name' => $_POST['tweet_screen_name'][$key]
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
		                    'status' => '@'.$_POST['tweet_screen_name'][$key].' Thank you for purchase '.$p_lists->name.' on twt2pay http://twt2pay.com ##'.$rand,
		                    'in_reply_to_status_id' => $key
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
                          		'text' => 'Your transaction for '.$p_lists->name.' has been failed, check your transaction status on twt2pay http://twt2pay.com ##'.$rand,
                          		'screen_name' => $_POST['tweet_screen_name'][$key]
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
                          			'status' => '@'.$_POST['tweet_screen_name'][$key].' Your transaction for '.$p_lists->name.' has been failed, check your transaction status on twt2pay http://twt2pay.com ##'.$rand,
                          			'in_reply_to_status_id' => $key
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
                           		'text' => 'Your transaction for '.$p_lists->name.' has been failed, check your transaction status on twt2pay http://twt2pay.com ##'.$rand,
                           		'screen_name' => $_POST['tweet_screen_name'][$key]
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
                           			'status' => '@'.$_POST['tweet_screen_name'][$key].' Your transaction for '.$p_lists->name.' has been failed, check your transaction status on twt2pay http://twt2pay.com ##'.$rand,
                           			'in_reply_to_status_id' => $key
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
                          		'text' => 'Your transaction for '.$p_lists->name.' has been failed, check your transaction status on twt2pay http://twt2pay.com ##'.$rand,
                          		'screen_name' => $_POST['tweet_screen_name'][$key]
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
                          			'status' => '@'.$_POST['tweet_screen_name'][$key].' Your transaction for '.$p_lists->name.' has been failed, check your transaction status on twt2pay http://twt2pay.com ##'.$rand,
                          			'in_reply_to_status_id' => $key
                          	);
                          	$requestMethod = 'POST';
                          	$twitter = new TwitterAPIExchange($settings);
                          	$twitter->buildOauth($url, $requestMethod)
                          	->setPostfields($postfields)
                          	->performRequest();
                          }
                     } 
					/* update response in __transactions */
					
				    $q = "INSERT INTO #__transactions (`tweet_id`, `twit_log_id`, `transaction_id`, `replyed_user_id`, `replyed_usr_s_name`, `status`, `response`, `response_text`, `transaction_date`,`hastag`, `price`) VALUES ('$key', '$twit_logId', '$transaction_id', '$replyed_user_id', '$balue', '$transaction', '$result', '$response_text', now(), '$p_lists->name', '$p_lists->price')";
					$db->setQuery($q);
					$db->query(); 
					
					/*update on __twit_logs  */
					$q2 = "UPDATE  #__twits_logs set `transaction` = 'yes' WHERE `twit_id` = '$key' LIMIT 1";
					$db->setQuery($q2);
					$db->query();
					
				}
			}
		}
		
		
		if ($_REQUEST['option'] =='com_content' && $_REQUEST['Itemid'] == 136 && $_REQUEST['id'] == 12 ) 
		{ 
			$db =& JFactory::getDBO();
			$qu = "SELECT name FROM #__tweet_strings";
			$db->setQuery($qu);
			$db->query();
			$hashes = $db->loadObjectList();
			$name=	$_POST['twit_text'];
			echo "<br />";
			echo "<br />";
			?>
			<form id="member-profile" action="" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
				<input type="hidden" name="test_me" value="2"/>
				<select style="width:250px; height:38px; padding:5px;" name="twit_text">
					<?php foreach ($hashes as $hash) { ?>
					<option  value="<?php echo $hash->name;?>" <?php if($name == $hash->name){?> selected="selected" <?php }?>><?php echo $hash->name;?></option>
					<?php } ?>
				</select>
				<input style="height:38px; padding:5px;" type="submit" name="Update_Tweets" value="Get Tweets" />
			</form>
			<?php
			echo "<br />";
			echo "<br />";
			echo "<br />";
			$name	=	'';
			if ( $_POST['test_me'] == 2)
			{
				$name=	$_POST['twit_text'];
				$url = 'https://api.twitter.com/1.1/search/tweets.json';
				//$getfield = '?q=%23'.$name.'%2BAND%2B%23twt2pay&since_id=383222944404873216&include_entities=true';
				$getfield = '?q=%23'.$name.'%2BAND%2B%23twt2pay&include_entities=true';
				$requestMethod = 'GET';
				
				$twitter = new TwitterAPIExchange($settings);
				$ape	=	$twitter->setGetfield($getfield)
									 ->buildOauth($url, $requestMethod)
									 ->performRequest();
				$twits = json_decode($ape);
				
				?>
				<form id="member-profile" action="" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
				<input type="hidden" name="test_me" value="1"/>
				
				<?php
				echo "<h2>Recent from #$name and #twt2pay </h2>";
				echo "<br />";
				
				if ( count($twits->statuses) > 0) :
				echo "<ul>";
				foreach($twits as $twit)
				{
					foreach($twit as $twi)
					{
						//echo '<pre>'; print_r($twi); echo '</pre>';
						if ( $twi->text != '')
						{
							echo '<li style="padding-top:20px;">';
							echo $twi->text; 
							if ( $twi->user->screen_name != '')
							{
								echo "<br />";
								echo '<input type="hidden" name="tweet_id['.$twi->id_str.']" value="'.$twi->id_str.'"/>';
								echo '<input type="hidden" name="tweet_usr['.$twi->id_str.']" value="'.str_replace(' ', '', strtolower($twi->user->name)).'"/>';
								echo '<input type="hidden" name="tweet_screen_name['.$twi->id_str.']" value="'.$twi->user->screen_name.'"/>';
								echo "   ";
								echo '<a href="http://twitter.com/'.$twi->user->screen_name.'">@'.$twi->user->screen_name.'</a>';
							}
							echo '</li>';
						}
					}
				}
				echo "</ul>";
				echo '<input type="hidden" name="product_name" value="'.$name.'"/>';
				echo  '<p style="padding-top:20px; padding-bottom:15px;"><input type="submit" name="Process" value="Process" /></p>';
				else :
					echo '<p style="padding-top:20px; padding-bottom:15px;">No data found.</p>';
				endif;
				
			}
		}
			
		
      ?>
		</form>
  
		<?php }?>
		
		<?php  if ($activeId != 139){?>
		</div>  
		<?php }?>
        
        
<!-- contact form popup -->
<div style='display:none'>
<div id='inline_content' style=" overflow:hidden;width: 354px; margin:0 auto;">
<div class="payment_popup">
<div class="pop_close"></div>
<h1>Customer Support</h1>
<div class="list_ph"><ul>
<li class="phone_blck">
<span class="phoneIcon"></span>
Call<br>
<strong>(949) 274-8975</strong>
</li>
<li class="mal_blkc">
<span class="emailIcon"></span>
Email<br>
<a href="mailto:services@twy2pay.com">services@twy2pay.com</a>
</li>
<li class="chat_blkck">
<span class="chatIcon"></span>
Chat<br>
<a href="#">Launch Live Chat</a>
</li>
</ul>
</div>
<div class="pop_form">
<form name="cus_support" id="cus_support" onsubmit="return checkform();" method="post">
<div class="errorBox" style="color: #008000;float: left;padding-bottom: 9px;padding-left: 56px;"></div>
<div class="msgBox" style="color: green;float: left;padding-bottom: 9px;padding-left: 56px;"></div>
<ul>
<li><input type="text" class="pop_up_text_box" name="cname" value="" placeholder="Clay massey"></li>
<li><input type="text" class="pop_up_text_box" name="cmail" value="" placeholder="Clay@youngcompany.com"></li>
<li><input type="text" class="pop_up_text_box" name="corder" value="" placeholder="Order Number"></li>
<li><textarea class="pop_up_text_box2" name="cmessage" placeholder="Message"></textarea></li>
<li><input type="submit" class="snd" value="send"></li>
</ul>
</form>
</div>
<script>
function checkform(){
	/*validation goes here*/
	var validation="";
	var cname	=	document.cus_support.cname.value;
	var cmail	=	document.cus_support.cmail.value;
	var corder	=	document.cus_support.corder.value;
	var cmessage	=	document.cus_support.cmessage.value;
	
	
	if(cname == ''){
		validation +='Please Enter Your Name\n';
	}
	
	if(cmail==''){	

		validation +='Please Enter E-mail Address\n';

	}else if(cmail!=''){	

		filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		if (filter.test(cmail)) 

			{		

			}

		  else

			{

				validation +='Please Enter Valid E-mail Address\n';

			}

	

	}
	
	if(corder == ''){
		validation +='Please Enter Your Order Number\n';
	}
	
	if(cmessage == ''){
		validation +='Please Enter Message\n';
	}

	/*validation goes here*/
	
	if(validation){
		//validation error
		alert(validation);
		return false;
	}else{
		var cname	=	document.cus_support.cname.value;
		var cmail	=	document.cus_support.cmail.value;
		var corder	=	document.cus_support.corder.value;
		var cmessage	=	document.cus_support.cmessage.value;
		
		jQuery.post("<?php echo JURI::root();?>sendmail.php",{ "name":cname, "email":cmail, "order_number":corder ,"message":cmessage  }, function( data ) {
			if(data == "true"){
				jQuery(".msgBox").html(data);
			
			}else{
				jQuery(".errorBox").html(data);
			}
		});
		return false;
	}
	
}
</script>
</div>
</div>
</div>
    <!-- contact form popup -->
    
  </div>  
  
</section> 

<div class="pricing_title">
  <p><?php echo $mytitle; ?></p>
</div>
<!--start middle-->

<!--end middle-->
<!--start footer-->
<footer id="footer_outer">
<div class="footer_inner">
  <div class="footer_nav">
    <jdoc:include type="modules" name="footer-resorce" />
  </div>
  <div class="footer_address">
   <jdoc:include type="modules" name="footer-text" />
  </div>
</div>
</footer>

<!--end footer-->


<!-- begin olark code -->
<script data-cfasync="false" type='text/javascript'>/*{literal}<![CDATA[*/
window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){f[z]=function(){(a.s=a.s||[]).push(arguments)};var a=f[z]._={},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={0:+new Date};a.P=function(u){a.p[u]=new Date-a.p[0]};function s(){a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{b.contentWindow[g].open()}catch(w){c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{var t=b.contentWindow[g];t.write(p());t.close()}catch(x){b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('1784-120-10-2042');/*]]>{/literal}*/</script><noscript><a href="https://www.olark.com/site/1784-120-10-2042/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript><!-- end olark code -->







<?php /*?><jdoc:include type="modules" name="position-5" /><?php */?>
 

<jdoc:include type="modules" name="debug" />
</body>
				
      
</html>

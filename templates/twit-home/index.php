<?php
/**
 * @package                Joomla.Site
 * @subpackage	Templates.beez_20
 * @copyright        Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;
if(JRequest::getVar("option") == "com_socialloginandsocialshare" && JRequest::getVar("view") == "profile" ){
 $app = JFactory::getApplication();
  $link = JURI::base().'index.php';
   
  $app->redirect($link);
}
$template_base_url=$this->baseurl . '/templates/twit-home';
$template_image_base_url=$template_base_url.'/images/';
$template_css_base_url=$template_base_url.'/css/';
$template_js_base_url=$template_base_url.'/js/';

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

//$doc->addStyleSheet($this->baseurl.'/templates/system/css/system.css');
//$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/position.css', $type = 'text/css', $media = 'screen,projection');
//$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/layout.css', $type = 'text/css', $media = 'screen,projection');
//$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/print.css', $type = 'text/css', $media = 'print');

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


$doc->addStyleSheet($template_css_base_url. 'reset.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($template_css_base_url. 'style.css', $type = 'text/css', $media = 'screen,projection');


$doc->addScript($template_js_base_url.'pie_class.js', 'text/javascript');



$home = 0 ;
$menu = $app->getMenu();
$activeId = $menu->getActive()->id;
if ($menu->getActive() == $menu->getDefault()) {

	$home = 1;

}
$user =& JFactory::getUser();
//echo '<pre>';print_r($user);
$db =& JFactory::getDBO();
$query = "SELECT * FROM #__users where id = '$user->id'";
$db->setQuery( $query );
$ses_var = $db->loadObject();
//echo '<pre';print_r($ses_var);
$crmId = $ses_var->crm_customer_id;
//echo $crmId  = $user->crm_customer_id;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<jdoc:include type="head" />
<script src="<?php echo $template_js_base_url?>jquery.cycle2.js"></script>
<!--<script src="<?php //echo $template_js_base_url?>jquery.colorbox.js"></script>
<script src="<?php //echo $template_js_base_url?>script.js"></script>-->

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
<div class="bg_bdy">

<img src="<?php echo $template_image_base_url?>bg.jpg" width="1800" height="692" alt="bg"></div>
<div class="cont_upper">

<header id="header_main">
  <div id="header_outer_home">
  <?php if($user->guest) { ?>
    <div id="header_inner_cus" class="clearfix">
      <ul>
        <li class="nav_active"><a>Log in</a>
        </li>
        <li class="welcome_nav"><a href="javascript:void(0)" >Buyer</a>
        <ul>
        <li style="background:none; display:inline; height:60px; padding:0">
        <a href="#" onclick="onCustomButtonClick2();"><img src="<?php echo $template_image_base_url?>signin-twitter.png" width="170" height="27" alt="dk"></a>
        <!--<div class="step_one">
        <div class="social_log">
      <jdoc:include type="modules" name="social-login" />
      </div>
      </div>--></li>
        </ul>
        </li>
        <li><a href="http://mojopay.com/twt2pay.html" target="_blank">Merchant</a></li>      
      </ul>
    </div>
	<?php }elseif(empty($crmId)){?>
	<div id="header_inner" class="clearfix">
      <ul>
        <li class="welcome_nav"><a href="#" >Welcome <?php echo $user->name?>!</a>
	
        <div style="display:none;" id="loginpopup">
          <ul>
            
            <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_quicklogout&view=quicklogout&Itemid=111">Log Out</a></li>
          </ul>
          </div>
		 
        </li>
      </ul>
       </div>
    <?php }else{?>
      <div id="header_inner" class="clearfix">
      <ul>
        <li class="welcome_nav"><a href="#" >Welcome <?php echo $user->name?>!</a>
	
        <div style="display:none;" id="loginpopup">
          <ul>
            <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_users&view=profile&layout=step1&Itemid=140">My Account</a></li>
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
  <div id="header_logo2"><a href="<?php echo JURI::base() ?>"><img src="<?php echo $template_image_base_url?>logo2.png" width="197" height="64" alt=" "></a></div>
</header>

<section id="container_outer">

<div id="home_container" class="clearfix">
 <?php if($user->guest) { ?>
<!-- buy this power-->
<div class="buyer_outer">
<div class="left_twt_slider">
<div class="cycle-pager"></div>
<div id="da-slider" class="da-slider">
<div class="cycle-slideshow" 
data-cycle-fx=fade
data-cycle-timeout=6000
data-cycle-manual-speed="2000"
data-cycle-slides=">div"
data-cycle-pager=".cycle-pager"
>

<div><img src="<?php echo $template_image_base_url?>east.png" width="247" height="320" alt="wj"><div class="slie1_ct"><h2>Find promotions and<br> 
#tag it to bag it</h2></div></div>

<div><div class="nare_width"><img src="<?php echo $template_image_base_url?>slide2.png" alt="wj"><div class="slie1_ct"><h2>Tweet the promotion<br>
hashtags to buy</h2></div></div></div>


<div>
<div class="slie1_ct">
<ul class="slde_ul">
<li>
<div class="left_slide_ico"><span class="icon"><img src="<?php echo $template_image_base_url?>ar1.png" width="46" height="36" alt="atr"></span></div>
<div class="right_slde_ct"><h1>Buy on the Fly</h1>
<p>Skip the checkout and buy the 
easy way. TWT2PAY makes
 purchasing anything simple and quick.</p></div>
</li>
<li>
<div class="left_slide_ico"><span class="icon"><img src="<?php echo $template_image_base_url?>ar2.png" alt="atr"></span></div>
<div class="right_slde_ct">
<h1>Get Exclusive Products</h1>
<p>Find unique products that aren't 
sold in stores, and buy the latest
stuff from the hottest stars.</p>
</div>
</li>
<li>
<div class="left_slide_ico"><span class="icon"><img src="<?php echo $template_image_base_url?>ar3.png" alt="atr"></span></div>
<div class="right_slde_ct">
<h1>Bag it for Free</h1>
<p>Using TWT2PAY to purchase is 
completely free and safe. 
Buy what you want securely 
and at no additional change.</p>
</div>
</li>

</ul>
</div>
</div>

</div>

</div>
</div>
<div class="buyer_pow">
<h1>Buy with the power of the #hashtag</h1>
<p>You can purchase products, buy concert tickets and everything in-between instantly. TWT2PAY is the fastest way to process online transactions.</p>
<a href="javascript:void(0)" onclick="return showpopup()" id="inline_button" class="inline"><img src="<?php echo $template_image_base_url?>strat_now.png" width="168" height="54" alt="start"></a>
</div>
</div>


  
<!-- buy this power-->

 <?php }elseif((empty($crmId)) || $activeId == 123 || $activeId == 124 || $activeId == 127 || $activeId == 111)
    {
	?>
	<div class="home_signup_box">
		<jdoc:include type="component" />
    </div>
 <?php }else{
 	$app = JFactory::getApplication();
 	$link = JURI::base().'index.php?option=com_users&view=profile&layout=step2&Itemid=141';
 		
 	$app->redirect($link);
  }?>
</div>
</section>
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
</div>


<?php /*?>
<header id="header_main">
  <div id="header_outer">
  
    <div id="header_inner" class="clearfix">
     <?php if($user->guest) { ?>
    <ul>
        <li class="welcome_nav"><a href="javascript:void(0)" >Welcome guest!</a>
       
         <ul style="display:none;">
        <li><div class="step_one">
        <div class="social_log">
      <jdoc:include type="modules" name="social-login" />
      </div>
      </div></li>
        </ul>
         </li>
      </ul>
     <?php }else{?>
      <ul>
        <li class="welcome_nav"><a href="#" >Welcome <?php echo $user->name?>!</a>
        <?php if(!empty($crmId)){?>
         <ul style="display:none;">
            <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_users&view=profile&layout=step1&Itemid=141">My Account</a></li>
          
            <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_users&view=profile&layout=step2&Itemid=141">Update My Credit Card</a></li>
            <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=article&id=13&Itemid=139">My Purchase</a></li>
            <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_quicklogout&view=quicklogout&Itemid=111">Log Out</a></li>
          </ul>
         <?php }elseif(!$user->guest && empty($crmId)){?> 
          <ul style="display:none;">
            <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_quicklogout&view=quicklogout&Itemid=111">Log Out</a></li>
             <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_quicklogout&view=quicklogout&Itemid=111">Login With Another Account</a></li>
          </ul>
         <?php }?>
        </li>
      </ul>
      <?php }?>
    </div>
  </div>
  <div id="header_logo"><a href="<?php echo JURI::base() ?>"><img src="<?php echo $template_image_base_url?>logo.png" width="201" height="71" alt=" "></a></div>
</header>
<section id="container_outer">
  <div id="home_container" class="clearfix">
  
    <div class="home_signup_box <?php if($user->guest){?> step1_home<?php }?>">
    
        <?php if($user->guest) { ?>
	  <!--start Sign Up Form-->
		<div class="step_one">
      <div class="home_text_title">Sign up: Step 1 </div>
      <div class="home_text_subtitle"><span>Use the power of the hashtag to buy</span>
       <div class="social_log2">
      <jdoc:include type="modules" name="social-login" />
      </div>
      </div>
      </div>
			
		
        
    <!--end Sign Up Form-->
     <?php }elseif(empty($crmId) || $activeId == 123 || $activeId == 124 || $activeId == 127 || $activeId == 111)
    {
	?>
	
		<jdoc:include type="component" />
   
 <?php }else{
 	
 	$app = JFactory::getApplication();
 	$link = JURI::base().'index.php?option=com_users&view=profile&layout=step1&Itemid=141';
 		
 	$app->redirect($link);
  }?>
 
    </div>
    
    <?php  
		$_option	=	JRequest::getVar('option', '');
		$_layout	=	JRequest::getVar('layout', '');
		
    if ($_option == 'com_users' && $_layout == 'step1') {  ?>
     <div class="home_right_text">
		<p>To streamline the transaction process, we will need both your current shipping and billing address. This will simplify the process so that you can “Tweet, Tag and Bag!” with no problem.</p>		
	</div>
	<?php } else if ($_option == 'com_users' && $_layout == 'step2') { ?>
		<div class="home_right_text">
			<p>To make sure we are charging the right person, we’ll need your CVV code and expiration date.  This way, you won’t have to read us the numbers every time you want to bag what you’ve tagged.</p>
		</div>
	<?php } else {  ?>
		<div class="home_right_text">
			<p>Twt2Pay is the fastest way to process online transactions.Using nothing more than hashtags, you can purchase products, buy concert tickets and everything in-between.</p>	
			
			<a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=article&id=14&Itemid=142" class="how_link">How it works</a>
				
		</div>
	<?php }?>
  </div>
</section>
<?php */?>

<!--end footer-->
<!-- begin olark code -->
<script data-cfasync="false" type='text/javascript'>/*{literal}<![CDATA[*/
window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){f[z]=function(){(a.s=a.s||[]).push(arguments)};var a=f[z]._={},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={0:+new Date};a.P=function(u){a.p[u]=new Date-a.p[0]};function s(){a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{b.contentWindow[g].open()}catch(w){c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{var t=b.contentWindow[g];t.write(p());t.close()}catch(x){b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('1784-120-10-2042');/*]]>{/literal}*/</script>
<noscript>
<a href="https://www.olark.com/site/1784-120-10-2042/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a>
</noscript>
<!-- end olark code -->


				<jdoc:include type="modules" name="debug" />
 <!-- popup -->
 
 <script>

	function showpopup(){
		jQuery("#inline_content").show("slow");
		jQuery("#Overlay").show();
		
	}
	function closepopup(){
		jQuery("#inline_content").hide();
		jQuery("#Overlay").hide();
	}
	function onCustomButtonClick2(){
eval("$SL.util.openWindow('https://twit2pay-93.hub.loginradius.com/requesthandlor.aspx?apikey=46326c47-80d8-4655-adff-03e5cbe5dedf&provider=twitter&callback=http%3A%2F%2F192.168.100.93%2Fgaurav%2Ftwt2pay%2Fpro%2F&scope=')")
}
	
</script>

   <div id='home_container' style="width: 388px;">
   
	<div id='inline_content' style=" display:none;overflow:hidden;margin:0 auto;position:absolute;z-index:99999;top: 20%;width: 388px;">
		
		<div class="payment_popup" style="background: none repeat scroll 0 0 #3E1D0B;padding: 25px 15px;border: 2px solid #F6F6F6;border-radius: 10px;">
		<div style="position: absolute;top: 12px;right: 9px;width: 12px;height: 12px;cursor:pointer" onclick="return closepopup()">
			<img src="<?php echo $template_image_base_url?>close_popup.png"/>
		</div>
		<div class="pop_close"></div>
		<div class="margin_40"></div>
		<div class="sign_up_pop_up_trol">
		<div class="upper_trol_li">
		<div class="inneer_narrow"><div class="left_trol"><img src="<?php echo $template_image_base_url?>trol.png" width="25" height="25" alt="ejk"></div>
		<div class="left_trol image-position"><a href="#" onclick="onCustomButtonClick2();"><img src="<?php echo $template_image_base_url?>trol2.png" width="195" height="55" alt="dk"></a><div class="home_text_subtitle"><jdoc:include type="modules" name="social-login" /></div></div></div>
		</div>
		<div class="upper_trol_li">
		<div class="left_trol"><h1>Use TWT2PAY to buy  products 
		with the power of the hashtag</h1></div>
		<div class="left_trol"><img src="<?php echo $template_image_base_url?>trol3.png" width="31" height="35" alt="f" class="que"></div>
		<div class="left_trol"><a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=article&id=24&Itemid=154"> How it works</a></div>
		</div>
		<div class="pop_line"></div>


		<div class="upper_trol_li">
		<div class="inneer_narrow">
		<div class="left_trol"><img src="<?php echo $template_image_base_url?>trol4.png" width="38" height="31" alt="fk"></div>
		<div class="left_trol"><a href="http://mojopay.com/twt2pay.html" target="_blank"><img src="<?php echo $template_image_base_url?>trol5.png" width="195" height="55" alt="dxjk"></a></div></div>
		</div>
		<div class="upper_trol_li">
		<div class="left_trol"><h1>Use TWT2PAY to sell product 
		fast and easy with hashtags</h1></div>
		<div class="left_trol"><img src="<?php echo $template_image_base_url?>trol3.png" width="31" height="35" alt="f" class="que"></div>
		<div class="left_trol"><a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=article&id=25&Itemid=153"> How it works</a></div>
		</div> 

		</div>


		</div>
	</div>
    </div>
    <!-- popup -->                
<div id="Overlay" onclick="return closepopup();" style=" display:none; background-color: #000000;height: 100%; left: 0;opacity: 0.5;position: fixed;top: 0;width: 100%;z-index: 999;"></div>                
        </body>
</html>

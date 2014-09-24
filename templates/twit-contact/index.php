<?php
/**
 * @package                Joomla.Site
 * @subpackage	Templates.beez_20
 * @copyright        Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.

$template_base_url=$this->baseurl . '/templates/twit-home';
$template_image_base_url=$template_base_url.'/images/';
$template_css_base_url=$template_base_url.'/css/';
$template_js_base_url=$template_base_url.'/js/';

// get title
$mydoc =JFactory::getDocument();
$mytitle = $mydoc->getTitle();

$app = JFactory::getApplication();

$activeId = $activeMenuTitle = '';
// get active menu details...
$menu = $app->getMenu();
$activeId = $menu->getActive()->id;
$activeMenuTitle = $menu->getActive()->title;

// get active menu
$active   = $menu->getActive();

if ($menu->getActive() == $menu->getDefault()) {

	$home = 1;

}

defined('_JEXEC') or die;

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

$doc->addStyleSheet($this->baseurl.'/templates/system/css/system.css');
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

//$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/md_stylechanger.js', 'text/javascript');
//$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/hide.js', 'text/javascript');


$doc->addStyleSheet($template_css_base_url. 'reset.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($template_css_base_url. 'style.css', $type = 'text/css', $media = 'screen,projection');


$doc->addScript($template_js_base_url.'pie_class.js', 'text/javascript');
$user =& JFactory::getUser();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<?php if($activeId != 115){?>
<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<?php }?>
<jdoc:include type="head" />
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

<header id="header_main">
  <div id="header_outer">
  
   
     <?php if($user->guest) { ?>
      <div id="header_inner_cus" class="clearfix">
      <ul>
        <li class="nav_active"><a>Log in</a>
        </li>
        <li class="welcome_nav"><a href="javascript:void(0)" >Buyer</a>
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
        <li><a href="http://mojopay.com/twt2pay.html" target="_blank" class="">Merchant</a></li>      
      </ul>
    </div>
     <?php }else{?>
      <div id="header_inner" class="clearfix">
      <ul>
        <li class="welcome_nav"><a href="#" >Welcome <?php echo $user->name?>!</a>
        <div style="display:none;" id="loginpopup">
          <ul>
            <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_users&view=profile&layout=step1&Itemid=140">My Account</a></li>
            <!--<li><a href="<?php echo $this->baseurl ?>/index.php?option=com_users&view=profile&layout=step1&Itemid=140">My Profile</a></li>-->
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
  <div class="page_heading"><?php echo $mytitle; ?></div>
  <div id="main_pg_container">
  <?php if($activeId == 142){?>
  <div id="main_page_inner">
      <div class="menu_outer clearfix">
        <div class="site_title"><span><?php echo $activeMenuTitle; //$mytitle; ?></span></div>
        <nav>
          <ul class="clearfix">
           <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=article&id=14&Itemid=142" class="about_link <?php if($activeId == 142){?>active<?php }?>"><span>About</span></a></li>
           <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=article&id=25&Itemid=153" class="merchant_link <?php if($activeId == 153){?>active<?php }?>"><span>Merchant</span></a></li>
           <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=article&id=24&Itemid=154" class="buyer_link <?php if($activeId == 154){?>active<?php }?>"><span>Buyer</span></a></li>
                <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=article&id=3&Itemid=120" class="faq_link <?php if($activeId == 120){?>active<?php }?>"><span>FAQ</span></a></li>
                <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=article&id=5&Itemid=114" class="legal_link <?php if($activeId == 114){?>active<?php }?>"><span>Legal</span></a></li>
                <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_aicontactsafe&view=message&layout=message&pf=1&redirect_on_success=&Itemid=115" class="contact_link <?php if($activeId == 115){?>active<?php }?>"><span>Contact</span></a></li>
                <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=category&layout=blog&id=8&Itemid=112" class="press_link <?php if($activeId == 112){?>active<?php }?>"><span>Press</span></a></li>
                <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_rsmonials&view=rsmonials&Itemid=113" class="testimonils_link <?php if($activeId == 113){?>active<?php }?>"><span>Testimonials</span></a></li> 
          </ul>
        </nav>
      </div>
      </div>
      <jdoc:include type="component" />
  <?php }else{?>
    <div id="main_page_inner">
      <div class="menu_outer clearfix">
        <div class="site_title"><span><?php echo $activeMenuTitle; //$mytitle; ?></span></div>
        <nav>
          <ul class="clearfix">
           <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=article&id=14&Itemid=142" class="about_link <?php if($activeId == 142){?>active<?php }?>"><span>About</span></a></li>
            <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=article&id=25&Itemid=153" class="merchant_link <?php if($activeId == 153){?>active<?php }?>"><span>Merchant</span></a></li>
           <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=article&id=24&Itemid=154" class="buyer_link <?php if($activeId == 154){?>active<?php }?>"><span>Buyer</span></a></li>
                <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=article&id=3&Itemid=120" class="faq_link <?php if($activeId == 120){?>active<?php }?>"><span>FAQ</span></a></li>
                <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=article&id=5&Itemid=114" class="legal_link <?php if($activeId == 114){?>active<?php }?>"><span>Legal</span></a></li>
                <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_aicontactsafe&view=message&layout=message&pf=1&redirect_on_success=&Itemid=115" class="contact_link <?php if($activeId == 115){?>active<?php }?>"><span>Contact</span></a></li>
                <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_content&view=category&layout=blog&id=8&Itemid=112" class="press_link <?php if($activeId == 112){?>active<?php }?>"><span>Press</span></a></li>
                <li><a href="<?php echo $this->baseurl ?>/index.php?option=com_rsmonials&view=rsmonials&Itemid=113" class="testimonils_link <?php if($activeId == 113){?>active<?php }?>"><span>Testimonials</span></a></li> 
          </ul>
        </nav>
      </div>
       <div class="update_form_main">
        <?php if($activeId == 112 || $activeId == 113){?>
        <div class="legal_box">
        <p>Coming Soon...</p>
        </div>
        <?php }else{?>
        <?php if($activeId == 115){?>
<div class="contactContent">
<p>Our team will get back to you within 48 hours once we receive your message. Thank you for contacting us!</p>

<div class="contactLinks">
<ul>
<li>
<span class="phoneIcon"></span>
Call<br />
<strong>(949) 274-8975</strong>
</li>


<li>
<span class="emailIcon"></span>
Email<br />
<a href="mailto:services@twt2pay.com">services@twt2pay.com</a>
</li>

<li>
<span class="chatIcon"></span>
Chat<br />
<a href="#">Launch Live Chat</a>
</li>




</ul>
</div>
</div>
<?php }?>
        <jdoc:include type="component" />
        <?php }?>
      
       </div>  
      
    </div>
    <?php }?>
    </div>  
</section>  

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








 <jdoc:include type="modules" name="position-5" />
<jdoc:include type="modules" name="debug" />

</body>
				
</html>

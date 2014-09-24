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


$doc->addScript($template_js_base_url.'jquery.cycle.all.min.js', 'text/javascript');
$doc->addScript($template_js_base_url.'script.js', 'text/javascript');
$doc->addScript($template_js_base_url.'border-radius.js', 'text/javascript');
$doc->addScript($template_js_base_url.'css-support-script.js', 'text/javascript');
$doc->addScript($template_js_base_url.'html5.js', 'text/javascript');
$doc->addScript($template_js_base_url.'IE9.js', 'text/javascript');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />

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

</head>

<header>
  <div class="wrapper">
    <div class="logo"><a href="<?php echo JURI::base()?>"><img src="<?php echo $template_image_base_url  ?>logo2.png" alt="Logo" title="Twit 2 Pay" width="300" height="84"></a></div>
    <nav>
     <jdoc:include type="modules" name="position-7" />
     
     
      
    </nav>
  </div>
</header>
<!--end header-->
<div class="pricing_title">
  <p><?php echo $mytitle; ?></p>
</div>
<!--start middle-->
<section class="middle">
  
     <div class="wrapper">
      <div class="contact_three_box">
      <div class="contact_box_title">
        <p>Got a Question or Suggestion? We’d love to hear from You.</p>
      </div>
      <ul>
        <li>
          <div class="contact_type_outer"> <img src="images/phone-icon.gif" alt="Phone" width="21" height="22">
            <p class="contact_type">PHONE</p>
            <p class="fontsize14">999-444-3333</p>
          </div>
        </li>
        <li>
          <div class="contact_type_outer"> <img src="images/email.gif" alt="Email" width="30" height="23">
            <div class="contact_type">EMAIL</div>
            <p class="fontsize14"><a href="mailto:info@mojopay.com" class="email">info@mojopay.com</a></p>
          </div>
        </li>
        <li>
          <div class="contact_type_outer"> <img src="images/live-support-icon.gif" alt="Live Support" width="21" height="22">
            <p class="contact_type">LIVE SUPPORT</p>
            <p class="fontsize14"><a href="javascript:void(0);" onClick="olark('api.box.expand')">Launch Live Chat</a></p>
          </div>
        </li>
      </ul>
    </div>
     	 
    	</div>
    	
    	<div class="message_send_container">
         <div class="message_send_inner">
          <div class="send_message_title">SEND US A MESSAGE</div>
            <div class="message_form_inner">
                <jdoc:include type="component" />
                </div>
                </div>
                </div>
                
     
    
  
  
  
</section>
<!--end middle-->
<!--start footer-->
<footer>
  <div class="wrapper">
    <section class="footer_box_outer">
      <ul>
        
        <li>
          <div class="footer_box">
            <div class="footer_box_title">RESOURCES</div>
            <div class="box_title_type">
            
            <jdoc:include type="modules" name="footer-resorce" />
            
            <?php /*?>
              <ul>
                <li><a href="help-center.html">Help Center</a></li>
                <li><a href="javascript:void(0);" onClick="olark('api.box.expand')">Live Chat</a></li>
				<li><a href="faq.html">FAQ</a></li>
				<li><a href="developers.html">Developers</a></li>
              </ul><?php */?>
            </div>
          </div>
        </li>
        <li>
          <div class="footer_box">
            <div class="footer_box_title">ABOUT</div>
            <div class="box_title_type">
             <jdoc:include type="modules" name="footer-about" />
            
            <?php /*?>  <ul>
                <li><a href="press.html">Press</a></li>
                <li><a href="testimonial.html">Testimonials</a></li>
                <li><a href="legal.html">Legal</a></li>
                <li><a href="contact.html">Contact</a></li>
              </ul><?php */?>
            </div>
          </div>
        </li>
        <li>
          <div class="footer_box">
            <div class="footer_box_title">SOCIAL</div>
            <div class="social_type">
             <jdoc:include type="modules" name="footer-social" />
            </div>
          </div>
        </li>
      </ul>
    </section>
    <section class="copyright">&copy; 2012 Mojo Pay </section>
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

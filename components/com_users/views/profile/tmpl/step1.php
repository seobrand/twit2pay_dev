<?php
/**
* @package     Joomla.Site
* @subpackage  com_users
*
* @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
* @license     GNU General Public License version 2 or later; see LICENSE.txt
*/

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
//load user_profile plugin language
$lang = JFactory::getLanguage();
$lang->load('plg_user_profile', JPATH_ADMINISTRATOR);
?>
<script>
function validation(){
var validation="";
var fname= document.getElementById("jform_profile_fname").value;
var lname= document.getElementById("jform_profile_lname").value;
var name = fname+' '+lname;
document.getElementById('jform_name').value = name;

var phone= document.getElementById("jform_profile_phone").value;
var year = document.getElementById('year').value;

var month = document.getElementById('month').value;

var date = document.getElementById('date').value;

var dob = year+'-'+month+'-'+date;

document.getElementById('jform_profile_dob').value = dob;
	

    var email = document.getElementById('jform_email').value;
	document.getElementById('jform_email1').value = email;
	document.getElementById('jform_email2').value = email;
	
if(fname=='' || fname=='First Name :')

{	

validation +='Please Enter First Name\n';
document.getElementById("jform_profile_fname").style.border="solid 2px #FF0000";

}

if(lname=='' || lname=='Last Name :')

{	

validation +='Please Enter Last Name\n';
document.getElementById("jform_profile_lname").style.border="solid 2px #FF0000";

}

if(email=='' || email=='Email :'){	

		validation +='Please Enter E-mail Address\n';
		document.getElementById("jform_email").style.border="solid 2px #FF0000";

	}else if(email!=''){	

		filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		if (filter.test(email)){	
			 
			 if(document.getElementById("checkexistance").innerHTML == "exist"){
					validation +='E-mail Address already exists!\n';
					document.getElementById("jform_email").style.border="1px solid #FF0000";				
			 }
			}

		  else

			{

				validation +='Please Enter Valid E-mail Address\n';
				document.getElementById("jform_email").style.border="solid 2px #FF0000";

			}

	

	}

if(phone=='' || phone=='Phone :')

{	

validation +='Please Enter Phone no.\n';
document.getElementById("jform_profile_phone").style.border="solid 2px #FF0000";


}

if(validation)

{

alert(validation);

return false;

}else

{

return true;

}
}


function checkemail(email){
    jQuery.post("<?php echo JURI::root();?>checkemail.php",{"email":email}, function( data ) {
					  if(data == "exist"){
		                 jQuery("#checkexistance").html("exist");
					  
					  }else{
						jQuery("#checkexistance").html("");
					  }
				  });	
 }
function setValues(){

	var year = document.getElementById('year').value;

	var month = document.getElementById('month').value;

	var date = document.getElementById('date').value;

	var dob = year+'-'+month+'-'+date;

	document.getElementById('jform_profile_dob').value = dob;
	
	var email = document.getElementById('jform_email').value;
	document.getElementById('jform_email1').value = email;
	document.getElementById('jform_email2').value = email;

}
</script>

<div class="profile-edit<?php echo $this->pageclass_sfx?>">
<?php if ($this->params->get('show_page_heading')) : ?>
<div class="page-header">
<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
</div>
<?php endif; ?>

<?php 


$app			= JFactory::getApplication();
$user			= JFactory::getUser();
$loginUserId	= (int) $user->get('id');

jimport('joomla.user.helper');
$user = & JFactory::getUser();
$profile = JUserHelper::getProfile($user->id);
//echo '<pre>';print_r($profile);
$db =& JFactory::getDBO();
$query = "SELECT * FROM #__users where id = '$user->id'";
$db->setQuery( $query );
$ses_var = $db->loadObject();
//echo '<pre>';print_r($ses_var);
$crm_id = $ses_var->crm_customer_id;
$app = JFactory::getApplication();

$menu = $app->getMenu();
// get active menu id
$activeId = $menu->getActive()->id;

//check twitter id
$pos = strpos($ses_var->email, '@twitter.com');

?>

<?php if($crm_id != 0 && $activeId == 140){?>
<form id="member-profile" action="<?php echo JRoute::_('index.php?option=com_users&task=profile.update1'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
<div class="update_form_main update_form_main2">
<ul class="update_collm">
<li class="clearfix">
<div class="update_left_text">First Name </div>
<div class="update_right_box">
<input type="text" class="update_input required" aria-required="true" required="required" name="jform[profile][fname]" id="jform_profile_fname" value="<?php echo $profile->profile['fname'];?>" size="30"/><pre class="str"><img src="images/str.jpg" width="8" height="7" alt="star"></pre>
</div>
</li>

<li class="clearfix">
<div class="update_left_text">Last Name </div>
<div class="update_right_box">
<input type="text" class="update_input required" aria-required="true" required="required" name="jform[profile][lname]" id="jform_profile_lname" value="<?php echo $profile->profile['lname'];?>" size="30"/><pre class="str"><img src="images/str.jpg" width="8" height="7" alt="star"></pre>
</div>
</li>

<li class="clearfix">
<div class="update_left_text">Email </div>
<div class="update_right_box">
<input type="email" class="update_input validate-email required" aria-required="true" required="required" name="jform[email]" id="jform_email" value="<?php if($pos === false){echo $ses_var->email;}?>" size="30"/><pre class="str"><img src="images/str.jpg" width="8" height="7" alt="star"></pre>
</div>
</li>

<li class="clearfix">
<div class="update_left_text">Phone Number </div>
<div class="update_right_box">
<input type="text" class="update_input required" aria-required="true" required="required" name="jform[profile][phone]" id="jform_profile_phone" value="<?php echo $profile->profile['phone'];?>" size="30"/><pre class="str"><img src="images/str.jpg" width="8" height="7" alt="star"></pre>
</div>
</li>

<li class="clearfix">
<div class="update_left_text">
Date of Birth
<span>(MM|DD|YY)</span>
</div>

<?php $date = explode('-',$profile->profile['dob']);

$year = $date[0];

$month = $date[1];

$day = $date[2];

?>
<div class="update_right_box">
<!--<input class="update_sel" type="text" value="">
<input class="update_sel" type="text" value="">
<input class="update_sel" type="text" value="">-->
<select name="month" id="month" class="update_sel required" aria-required="true" required="required">

                  <option value="">Month</option>

                  <option value="1" <?php if($month == 1){?>selected="selected"<?php }?>>January</option>

                  <option value="2" <?php if($month == 2){?>selected="selected"<?php }?>>February</option>

                  <option value="3" <?php if($month == 3){?>selected="selected"<?php }?>>March</option>

                  <option value="4" <?php if($month == 4){?>selected="selected"<?php }?>>April</option>

                  <option value="5" <?php if($month == 5){?>selected="selected"<?php }?>>May</option>

                  <option value="6" <?php if($month == 6){?>selected="selected"<?php }?>>June</option>

                  <option value="7" <?php if($month == 7){?>selected="selected"<?php }?>>July</option>

                  <option value="8" <?php if($month == 8){?>selected="selected"<?php }?>>August</option>

                  <option value="9" <?php if($month == 9){?>selected="selected"<?php }?>>September</option>

                  <option value="10" <?php if($month == 10){?>selected="selected"<?php }?>>October</option>

                  <option value="11" <?php if($month == 11){?>selected="selected"<?php }?>>November</option>

                  <option value="12" <?php if($month == 12){?>selected="selected"<?php }?>>December</option>

                </select>

                <select name="date" id="date" class="update_sel required" aria-required="true" required="required">

                  <option value="">Date</option>

                  <?php for($i=1; $i<=31; $i++){?>

                  <option value="<?php echo $i?>" <?php if($day == $i){?>selected="selected"<?php }?>><?php echo $i?></option>

                  <?php }?>

                 

                </select>

                <select name="year" id="year" class="update_sel marginright0 required" aria-required="true" required="required">

                  <option value="">Year</option>

                  <?php for($i=1950; $i<=2013; $i++){?>

                   <option value="<?php echo $i?>" <?php if($year == $i){?>selected="selected"<?php }?>><?php echo $i?></option>

                  <?php }?>

                 

                  

                </select><pre class="str"><img src="images/str.jpg" width="8" height="7" alt="star"></pre>
</div>
</li>

<li class="clearfix">
<div class="update_left_text">Gender </div>
<div class="update_right_box">
<div class="radio_grp">
<p>
<label>
<input id="jform_profile_gender0" type="radio" <?php if($profile->profile['gender'] == 1){?> checked="checked" <?php }?> value="1" name="jform[profile][gender]">
Male
</label>
<label>

<input id="jform_profile_gender1" type="radio" <?php if($profile->profile['gender'] == 0){?> checked="checked" <?php }?> value="0" name="jform[profile][gender]">
Female
</label>
</p>
</div>
</div>
</li>
<li class="clearfix no_bodr">
            <div class="req_fld">*Required Fields</div>
          </li>
</ul>


<input type="submit" value="Update" class="update_button" onClick="return validation()">
</div>
<div class="form-actions">
<input type="hidden" name="jform[username]" id="jform_username" value="<?php echo $user->username; ?>"/>
<input type="hidden" name="jform[name]" id="jform_name" value="<?php echo $user->name; ?>" size="30"/>
<input type="hidden" name="jform[email1]" id="jform_email1" value="<?php echo $user->email; ?>" size="30"/>
<input type="hidden" name="jform[email2]" id="jform_email2" value="<?php echo $user->email; ?>" size="30"/>
<input type="hidden" name="jform[profile][address1]" id="jform_profile_address1" value="<?php echo $profile->profile['address1']; ?>"/>
<input type="hidden" name="jform[profile][city]" id="jform_profile_city" value="<?php echo $profile->profile['city']; ?>"/>
<input type="hidden" name="jform[profile][region]" id="jform_profile_region" value="<?php echo $profile->profile['region']; ?>"/>
<input type="hidden" name="jform[profile][postal_code]" id="jform_profile_postal_code" value="<?php echo $profile->profile['postal_code']; ?>"/>
<input type="hidden" name="jform[profile][dob]" id="jform_profile_dob" value="<?php echo $profile->profile['dob']; ?>"/>

<input type="hidden" name="option" value="com_users" />
<input type="hidden" name="task" value="profile.update1" />
<?php echo JHtml::_('form.token'); ?> </div>
</form>
<?php }else{?>
<form id="member-profile" action="<?php echo JRoute::_('index.php?option=com_users&task=profile.save1'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
<div class="step_secound">
<div class="home_text_title">Sign up: Step 1 </div>
<div class="home_billing_subtitle">Profile Information: </div>


<ul class="step_listing">
<li> 
<input type="text" class="step_input required" aria-required="true" required="required" name="jform[profile][fname]" id="jform_profile_fname" value="<?php if($profile->profile['fname'] != ''){ echo $profile->profile['fname'];}else{ echo 'First Name :';} ?>" onfocus="if(this.value=='First Name :'){this.value=''}" onblur="if(this.value=='') {this.value='First Name :'}" size="30"/>

</li>
<li>
<input type="text" class="step_input required" aria-required="true" required="required" name="jform[profile][lname]" id="jform_profile_lname" value="<?php if($profile->profile['lname'] != ''){ echo $profile->profile['lname'];}else{ echo 'Last Name :';} ?>" onfocus="if(this.value=='Last Name :'){this.value=''}" onblur="if(this.value=='') {this.value='Last Name :'}" size="30"/>
</li>
<li>
<input type="email" class="step_input validate-email required" aria-required="true" required="required" name="jform[email]" id="jform_email"  value="<?php if($pos === false){echo $ses_var->email;}else{ echo 'Email :';} ?>" onfocus="if(this.value=='Email :'){this.value=''}" onblur="if(this.value=='') {this.value='Email :'} checkemail(this.value);" onkeyup="checkemail(this.value);" onkeydown="checkemail(this.value);" size="30"/>
<div id="checkexistance" style="display:none"></div>
</li>
<li>
<input type="text" class="step_input required" aria-required="true" required="required" name="jform[profile][phone]" id="jform_profile_phone" value="<?php if($profile->profile['phone'] != ''){ echo $profile->profile['phone'];}else{ echo 'Phone :';} ?>" onfocus="if(this.value=='Phone :'){this.value=''}" onblur="if(this.value=='') {this.value='Phone :'}"  size="30"/>

</li>
<?php $date = explode('-',$profile->profile['dob']);

$year = $date[0];

$month = $date[1];

$day = $date[2];

?>
<li style="padding:0 0 0 13px;">
<select name="month" id="month" class="step_input step_sel01 required" aria-required="true" required="required">

                  <option value="">Month</option>

                  <option value="1" <?php if($month == 1){?>selected="selected"<?php }?>>January</option>

                  <option value="2" <?php if($month == 2){?>selected="selected"<?php }?>>February</option>

                  <option value="3" <?php if($month == 3){?>selected="selected"<?php }?>>March</option>

                  <option value="4" <?php if($month == 4){?>selected="selected"<?php }?>>April</option>

                  <option value="5" <?php if($month == 5){?>selected="selected"<?php }?>>May</option>

                  <option value="6" <?php if($month == 6){?>selected="selected"<?php }?>>June</option>

                  <option value="7" <?php if($month == 7){?>selected="selected"<?php }?>>July</option>

                  <option value="8" <?php if($month == 8){?>selected="selected"<?php }?>>August</option>

                  <option value="9" <?php if($month == 9){?>selected="selected"<?php }?>>September</option>

                  <option value="10" <?php if($month == 10){?>selected="selected"<?php }?>>October</option>

                  <option value="11" <?php if($month == 11){?>selected="selected"<?php }?>>November</option>

                  <option value="12" <?php if($month == 12){?>selected="selected"<?php }?>>December</option>

                </select>

                <select name="date" id="date" class="step_input step_sel01 required" aria-required="true" required="required">

                  <option value="">Date</option>

                  <?php for($i=1; $i<=31; $i++){?>

                  <option value="<?php echo $i?>" <?php if($day == $i){?>selected="selected"<?php }?>><?php echo $i?></option>

                  <?php }?>

                 

                </select>

                <select name="year" id="year" class="step_input step_sel01 marginright0 required" aria-required="true" required="required">

                  <option value="">Year</option>

                  <?php for($i=1950; $i<=2013; $i++){?>

                   <option value="<?php echo $i?>" <?php if($year == $i){?>selected="selected"<?php }?>><?php echo $i?></option>

                  <?php }?>
                  </select>


</li>
<li>
<p class="gender_ifo">
<label>
<input id="jform_profile_gender0" type="radio" <?php if($profile->profile['gender'] == 1){?> checked="checked" <?php }?> value="1" name="jform[profile][gender]">
Male
</label>
<label>
<input id="jform_profile_gender1" type="radio" <?php if($profile->profile['gender'] == 0){?> checked="checked" <?php }?> value="0" name="jform[profile][gender]">
Female
</label>
</p>
</li>

<li><input type="submit" value="Next" class="step_next" onClick="return validation()" ></li>
</ul>



</div>

<div class="form-actions">
<input type="hidden" name="jform[username]" id="jform_username" value="<?php echo $user->username; ?>"/>
<input type="hidden" name="jform[name]" id="jform_name" value="<?php echo $user->name; ?>" size="30"/>
<input type="hidden" name="jform[email1]" id="jform_email1" value="<?php echo $user->email; ?>" size="30"/>
<input type="hidden" name="jform[email2]" id="jform_email2" value="<?php echo $user->email; ?>" size="30"/>
<input type="hidden" name="jform[profile][address1]" id="jform_profile_address1" value="<?php echo $profile->profile['address1']; ?>"/>
<input type="hidden" name="jform[profile][city]" id="jform_profile_city" value="<?php echo $profile->profile['city']; ?>"/>
<input type="hidden" name="jform[profile][region]" id="jform_profile_region" value="<?php echo $profile->profile['region']; ?>"/>
<input type="hidden" name="jform[profile][postal_code]" id="jform_profile_postal_code" value="<?php echo $profile->profile['postal_code']; ?>"/>
<input type="hidden" name="jform[profile][dob]" id="jform_profile_dob" value="<?php echo $profile->profile['dob']; ?>"/>

<input type="hidden" name="option" value="com_users" />
<input type="hidden" name="task" value="profile.save1"/>
<?php echo JHtml::_('form.token'); ?> </div>



</form>
<?php }?>
</div>

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
var address= document.getElementById("jform_profile_address1").value;
var city= document.getElementById("jform_profile_city").value;
var zip= document.getElementById("jform_profile_postal_code").value;

if(address=='' || address=='Address :')

{	

validation +='Please Enter Address\n';

}

if(city=='' || city=='City :')

{	

validation +='Please Enter City\n';

}

if(zip=='' || zip=='Zip :')

{	

validation +='Please Enter Zip\n';

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
//echo '<pre';print_r($ses_var);
$crm_id = $ses_var->crm_customer_id;
$app = JFactory::getApplication();

$menu = $app->getMenu();
// get active menu id
$activeId = $menu->getActive()->id;

?>

<?php if($crm_id != 0 && $activeId == 140){?>

<form id="member-profile" action="<?php echo JRoute::_('index.php?option=com_users&task=profile.update1'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
<div class="update_form_main update_form_main2">
<ul class="update_collm">
<li class="clearfix">
<div class="update_left_text">Name </div>
<div class="update_right_box">
<input type="text" class="update_input required" aria-required="true" required="required" name="jform[name]" id="jform_name" value="<?php echo $ses_var->name; ?>" size="30"/>
</div>
</li>
<?php /*?> <li class="clearfix">
<div class="update_left_text"> Last Name  </div>
<div class="update_right_box">
<input type="text" value="Massey" class="update_input">
</div>
</li><?php */?>



<li class="clearfix">
<div class="update_left_text">Shipping  Address</div>
<div class="update_right_box">
<input type="text" class="update_input required" aria-required="true" required="required" name="jform[profile][address1]" id="jform_profile_address1" value="<?php echo $profile->profile['address1'];?>" size="30"/>
</div>
</li>
<li class="clearfix">
<div class="update_left_text">City</div>
<div class="update_right_box">
<input type="text" class="update_input required" aria-required="true" required="required" name="jform[profile][city]" id="jform_profile_city" value="<?php echo $profile->profile['city']; ?>" size="30"/>
</div>
</li>
<li class="clearfix">
<div class="update_left_text">State</div>
<div class="update_right_box">
<select id="jform_profile_region" name="jform[profile][region]" class="update_sel" aria-invalid="false">
<option value="AL" <?php  if($profile->profile['region'] == 'AL'){?>selected="selected"<?php }?>>Alabama</option>
<option value="AK" <?php  if($profile->profile['region'] == 'AK'){?>selected="selected"<?php }?>>Alaska</option>
<option value="AS" <?php  if($profile->profile['region'] == 'AS'){?>selected="selected"<?php }?>>American Samoa</option>
<option value="AZ" <?php  if($profile->profile['region'] == 'AZ'){?>selected="selected"<?php }?>>Arizona</option>
<option value="AR" <?php  if($profile->profile['region'] == 'AR'){?>selected="selected"<?php }?>>Arkansas</option>
<option value="CA" <?php  if($profile->profile['region'] == 'CA'){?>selected="selected"<?php }?>>California</option>
<option value="CO" <?php  if($profile->profile['region'] == 'CO'){?>selected="selected"<?php }?>>Colorado</option>
<option value="CT" <?php  if($profile->profile['region'] == 'CT'){?>selected="selected"<?php }?>>Connecticut</option>
<option value="DE" <?php  if($profile->profile['region'] == 'DE'){?>selected="selected"<?php }?>>Delaware</option>
<option value="DC" <?php  if($profile->profile['region'] == 'DC'){?>selected="selected"<?php }?>>District of Columbia</option>
<option value="FL" <?php  if($profile->profile['region'] == 'FL'){?>selected="selected"<?php }?>>Florida</option>
<option value="GA" <?php  if($profile->profile['region'] == 'GA'){?>selected="selected"<?php }?>>Georgia</option>
<option value="GU" <?php  if($profile->profile['region'] == 'GU'){?>selected="selected"<?php }?>>Guam</option>
<option value="HI" <?php  if($profile->profile['region'] == 'HI'){?>selected="selected"<?php }?>>Hawaii</option>
<option value="ID" <?php  if($profile->profile['region'] == 'ID'){?>selected="selected"<?php }?>>Idaho</option>
<option value="IL" <?php  if($profile->profile['region'] == 'IL'){?>selected="selected"<?php }?>>Illinois</option>
<option value="IN" <?php  if($profile->profile['region'] == 'IN'){?>selected="selected"<?php }?>>Indiana</option>
<option value="IA" <?php  if($profile->profile['region'] == 'IA'){?>selected="selected"<?php }?>>Iowa</option>
<option value="KS" <?php  if($profile->profile['region'] == 'KS'){?>selected="selected"<?php }?>>Kansas</option>
<option value="KY" <?php  if($profile->profile['region'] == 'KY'){?>selected="selected"<?php }?>>Kentucky</option>
<option value="LA" <?php  if($profile->profile['region'] == 'LA'){?>selected="selected"<?php }?>>Louisiana</option>
<option value="ME" <?php  if($profile->profile['region'] == 'ME'){?>selected="selected"<?php }?>>Maine</option>
<option value="MD" <?php  if($profile->profile['region'] == 'MD'){?>selected="selected"<?php }?>>Maryland</option>
<option value="MA" <?php  if($profile->profile['region'] == 'MA'){?>selected="selected"<?php }?>>Massachusetts</option>
<option value="MI" <?php  if($profile->profile['region'] == 'MI'){?>selected="selected"<?php }?>>Michigan</option>
<option value="MN" <?php  if($profile->profile['region'] == 'MN'){?>selected="selected"<?php }?>>Minnesota</option>
<option value="MS" <?php  if($profile->profile['region'] == 'MS'){?>selected="selected"<?php }?>>Mississippi</option>
<option value="MO" <?php  if($profile->profile['region'] == 'MO'){?>selected="selected"<?php }?>>Missouri</option>
<option value="MT" <?php  if($profile->profile['region'] == 'MT'){?>selected="selected"<?php }?>>Montana</option>
<option value="NE" <?php  if($profile->profile['region'] == 'NE'){?>selected="selected"<?php }?>>Nebraska</option>
<option value="NV" <?php  if($profile->profile['region'] == 'NV'){?>selected="selected"<?php }?>>Nevada</option>
<option value="NH" <?php  if($profile->profile['region'] == 'NH'){?>selected="selected"<?php }?>>New Hampshire</option>
<option value="NJ" <?php  if($profile->profile['region'] == 'NJ'){?>selected="selected"<?php }?>>New Jersey</option>
<option value="NM" <?php  if($profile->profile['region'] == 'NM'){?>selected="selected"<?php }?>>New Mexico</option>
<option value="NY" <?php  if($profile->profile['region'] == 'NY'){?>selected="selected"<?php }?>>New York</option>
<option value="NC" <?php  if($profile->profile['region'] == 'NC'){?>selected="selected"<?php }?>>North Carolina</option>
<option value="ND" <?php  if($profile->profile['region'] == 'ND'){?>selected="selected"<?php }?>>North Dakota</option>
<option value="MP" <?php  if($profile->profile['region'] == 'MP'){?>selected="selected"<?php }?>>Northern Marianas Islands</option>
<option value="OH" <?php  if($profile->profile['region'] == 'OH'){?>selected="selected"<?php }?>>Ohio</option>
<option value="OK" <?php  if($profile->profile['region'] == 'OK'){?>selected="selected"<?php }?>>Oklahoma</option>
<option value="OR" <?php  if($profile->profile['region'] == 'OR'){?>selected="selected"<?php }?>>Oregon</option>
<option value="PA" <?php  if($profile->profile['region'] == 'PA'){?>selected="selected"<?php }?>>Pennsylvania</option>
<option value="PR" <?php  if($profile->profile['region'] == 'PR'){?>selected="selected"<?php }?>>Puerto Rico</option>
<option value="RI" <?php  if($profile->profile['region'] == 'RI'){?>selected="selected"<?php }?>>Rhode Island</option>
<option value="SC" <?php  if($profile->profile['region'] == 'SC'){?>selected="selected"<?php }?>>South Carolina</option>
<option value="SD" <?php  if($profile->profile['region'] == 'SD'){?>selected="selected"<?php }?>South Dakota</option>
<option value="TN" <?php  if($profile->profile['region'] == 'TN'){?>selected="selected"<?php }?>>Tennessee</option>
<option value="TX" <?php  if($profile->profile['region'] == 'TX'){?>selected="selected"<?php }?>>Texas</option>
<option value="UT" <?php  if($profile->profile['region'] == 'UT'){?>selected="selected"<?php }?>>Utah</option>
<option value="VT" <?php  if($profile->profile['region'] == 'VT'){?>selected="selected"<?php }?>>Vermont</option>
<option value="VA" <?php  if($profile->profile['region'] == 'VA'){?>selected="selected"<?php }?>>Virginia</option>
<option value="VI" <?php  if($profile->profile['region'] == 'VI'){?>selected="selected"<?php }?>>Virgin Islands</option>
<option value="WA" <?php  if($profile->profile['region'] == 'WA'){?>selected="selected"<?php }?>>Washington</option>
<option value="WV" <?php  if($profile->profile['region'] == 'WV'){?>selected="selected"<?php }?>>West Virginia</option>
<option value="WI" <?php  if($profile->profile['region'] == 'WI'){?>selected="selected"<?php }?>>Wisconsin</option>
<option value="WY" <?php  if($profile->profile['region'] == 'WY'){?>selected="selected"<?php }?>>Wyoming</option>
</select>
</div>
</li>
<li class="clearfix">
<div class="update_left_text">Zip</div>
<div class="update_right_box">
<ul class="user_action">
<li>
<input id="jform_profile_postal_code" type="text" class="update_input_03 required" aria-required="true" required="required" size="30" value="<?php echo $profile->profile['postal_code']; ?>" name="jform[profile][postal_code]">

</ul>
</div>
</li>
</ul>

<input type="submit" value="Update" class="update_button">
</div>
<div class="form-actions">
<input type="hidden" name="jform[username]" id="jform_username" value="<?php echo $user->username; ?>"/>
<input type="hidden" name="jform[email1]" id="jform_email1" value="<?php echo $user->email; ?>"/>
<input type="hidden" name="jform[email2]" id="jform_email2" value="<?php echo $user->email; ?>"/>
<input type="hidden" name="jform[profile][baddress]" id="jform_profile_baddress" value="<?php echo $profile->profile['baddress']; ?>"/>
<input type="hidden" name="jform[profile][bcity]" id="jform_profile_bcity" value="<?php echo $profile->profile['bcity']; ?>"/>
<input type="hidden" name="jform[profile][bregion]" id="jform_profile_bregion" value="<?php echo $profile->profile['bregion']; ?>"/>
<input type="hidden" name="jform[profile][bpostal_code]" id="jform_profile_bpostal_code" value="<?php echo $profile->profile['bpostal_code']; ?>"/>
<input type="hidden" name="jform[profile][dob]" id="jform_profile_dob" value="<?php echo $profile->profile['dob']; ?>"/>

<input type="hidden" name="option" value="com_users" />
<input type="hidden" name="task" value="profile.update1" />
<?php echo JHtml::_('form.token'); ?> </div>
</form>

<?php }else{?>

<form id="member-profile" action="<?php echo JRoute::_('index.php?option=com_users&task=profile.save1'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
<div class="step_secound">
<div class="home_text_title">Sign up: Step 2 </div>
<div class="home_billing_subtitle">Shipping Address: </div>


<ul class="step_listing">
<li> 
<input type="text" class="step_input required" aria-required="true" required="required" name="jform[profile][address1]" id="jform_profile_address1" value="<?php if($profile->profile['address1'] != ''){ echo $profile->profile['address1'];}else{ echo 'Address :';} ?>" onfocus="if(this.value=='Address :'){this.value=''}" onblur="if(this.value=='') {this.value='Address :'}" size="30"/>
</li>
<li>
<input type="text" class="step_input required" aria-required="true" required="required" name="jform[profile][city]" id="jform_profile_city" value="<?php if($profile->profile['city'] != ''){ echo $profile->profile['city'];}else{echo 'City :';} ?>" onfocus="if(this.value=='City :'){this.value=''}" onblur="if(this.value=='') {this.value='City :'}" size="30"/>
</li>
<li>
<select id="jform_profile_region" name="jform[profile][region]" class="step_select02" aria-invalid="false">
<option value="AL" <?php  if($profile->profile['region'] == 'AL'){?>selected="selected"<?php }?>>Alabama</option>
<option value="AK" <?php  if($profile->profile['region'] == 'AK'){?>selected="selected"<?php }?>>Alaska</option>
<option value="AS" <?php  if($profile->profile['region'] == 'AS'){?>selected="selected"<?php }?>>American Samoa</option>
<option value="AZ" <?php  if($profile->profile['region'] == 'AZ'){?>selected="selected"<?php }?>>Arizona</option>
<option value="AR" <?php  if($profile->profile['region'] == 'AR'){?>selected="selected"<?php }?>>Arkansas</option>
<option value="CA" <?php  if($profile->profile['region'] == 'CA'){?>selected="selected"<?php }?>>California</option>
<option value="CO" <?php  if($profile->profile['region'] == 'CO'){?>selected="selected"<?php }?>>Colorado</option>
<option value="CT" <?php  if($profile->profile['region'] == 'CT'){?>selected="selected"<?php }?>>Connecticut</option>
<option value="DE" <?php  if($profile->profile['region'] == 'DE'){?>selected="selected"<?php }?>>Delaware</option>
<option value="DC" <?php  if($profile->profile['region'] == 'DC'){?>selected="selected"<?php }?>>District of Columbia</option>
<option value="FL" <?php  if($profile->profile['region'] == 'FL'){?>selected="selected"<?php }?>>Florida</option>
<option value="GA" <?php  if($profile->profile['region'] == 'GA'){?>selected="selected"<?php }?>>Georgia</option>
<option value="GU" <?php  if($profile->profile['region'] == 'GU'){?>selected="selected"<?php }?>>Guam</option>
<option value="HI" <?php  if($profile->profile['region'] == 'HI'){?>selected="selected"<?php }?>>Hawaii</option>
<option value="ID" <?php  if($profile->profile['region'] == 'ID'){?>selected="selected"<?php }?>>Idaho</option>
<option value="IL" <?php  if($profile->profile['region'] == 'IL'){?>selected="selected"<?php }?>>Illinois</option>
<option value="IN" <?php  if($profile->profile['region'] == 'IN'){?>selected="selected"<?php }?>>Indiana</option>
<option value="IA" <?php  if($profile->profile['region'] == 'IA'){?>selected="selected"<?php }?>>Iowa</option>
<option value="KS" <?php  if($profile->profile['region'] == 'KS'){?>selected="selected"<?php }?>>Kansas</option>
<option value="KY" <?php  if($profile->profile['region'] == 'KY'){?>selected="selected"<?php }?>>Kentucky</option>
<option value="LA" <?php  if($profile->profile['region'] == 'LA'){?>selected="selected"<?php }?>>Louisiana</option>
<option value="ME" <?php  if($profile->profile['region'] == 'ME'){?>selected="selected"<?php }?>>Maine</option>
<option value="MD" <?php  if($profile->profile['region'] == 'MD'){?>selected="selected"<?php }?>>Maryland</option>
<option value="MA" <?php  if($profile->profile['region'] == 'MA'){?>selected="selected"<?php }?>>Massachusetts</option>
<option value="MI" <?php  if($profile->profile['region'] == 'MI'){?>selected="selected"<?php }?>>Michigan</option>
<option value="MN" <?php  if($profile->profile['region'] == 'MN'){?>selected="selected"<?php }?>>Minnesota</option>
<option value="MS" <?php  if($profile->profile['region'] == 'MS'){?>selected="selected"<?php }?>>Mississippi</option>
<option value="MO" <?php  if($profile->profile['region'] == 'MO'){?>selected="selected"<?php }?>>Missouri</option>
<option value="MT" <?php  if($profile->profile['region'] == 'MT'){?>selected="selected"<?php }?>>Montana</option>
<option value="NE" <?php  if($profile->profile['region'] == 'NE'){?>selected="selected"<?php }?>>Nebraska</option>
<option value="NV" <?php  if($profile->profile['region'] == 'NV'){?>selected="selected"<?php }?>>Nevada</option>
<option value="NH" <?php  if($profile->profile['region'] == 'NH'){?>selected="selected"<?php }?>>New Hampshire</option>
<option value="NJ" <?php  if($profile->profile['region'] == 'NJ'){?>selected="selected"<?php }?>>New Jersey</option>
<option value="NM" <?php  if($profile->profile['region'] == 'NM'){?>selected="selected"<?php }?>>New Mexico</option>
<option value="NY" <?php  if($profile->profile['region'] == 'NY'){?>selected="selected"<?php }?>>New York</option>
<option value="NC" <?php  if($profile->profile['region'] == 'NC'){?>selected="selected"<?php }?>>North Carolina</option>
<option value="ND" <?php  if($profile->profile['region'] == 'ND'){?>selected="selected"<?php }?>>North Dakota</option>
<option value="MP" <?php  if($profile->profile['region'] == 'MP'){?>selected="selected"<?php }?>>Northern Marianas Islands</option>
<option value="OH" <?php  if($profile->profile['region'] == 'OH'){?>selected="selected"<?php }?>>Ohio</option>
<option value="OK" <?php  if($profile->profile['region'] == 'OK'){?>selected="selected"<?php }?>>Oklahoma</option>
<option value="OR" <?php  if($profile->profile['region'] == 'OR'){?>selected="selected"<?php }?>>Oregon</option>
<option value="PA" <?php  if($profile->profile['region'] == 'PA'){?>selected="selected"<?php }?>>Pennsylvania</option>
<option value="PR" <?php  if($profile->profile['region'] == 'PR'){?>selected="selected"<?php }?>>Puerto Rico</option>
<option value="RI" <?php  if($profile->profile['region'] == 'RI'){?>selected="selected"<?php }?>>Rhode Island</option>
<option value="SC" <?php  if($profile->profile['region'] == 'SC'){?>selected="selected"<?php }?>>South Carolina</option>
<option value="SD" <?php  if($profile->profile['region'] == 'SD'){?>selected="selected"<?php }?>South Dakota</option>
<option value="TN" <?php  if($profile->profile['region'] == 'TN'){?>selected="selected"<?php }?>>Tennessee</option>
<option value="TX" <?php  if($profile->profile['region'] == 'TX'){?>selected="selected"<?php }?>>Texas</option>
<option value="UT" <?php  if($profile->profile['region'] == 'UT'){?>selected="selected"<?php }?>>Utah</option>
<option value="VT" <?php  if($profile->profile['region'] == 'VT'){?>selected="selected"<?php }?>>Vermont</option>
<option value="VA" <?php  if($profile->profile['region'] == 'VA'){?>selected="selected"<?php }?>>Virginia</option>
<option value="VI" <?php  if($profile->profile['region'] == 'VI'){?>selected="selected"<?php }?>>Virgin Islands</option>
<option value="WA" <?php  if($profile->profile['region'] == 'WA'){?>selected="selected"<?php }?>>Washington</option>
<option value="WV" <?php  if($profile->profile['region'] == 'WV'){?>selected="selected"<?php }?>>West Virginia</option>
<option value="WI" <?php  if($profile->profile['region'] == 'WI'){?>selected="selected"<?php }?>>Wisconsin</option>
<option value="WY" <?php  if($profile->profile['region'] == 'WY'){?>selected="selected"<?php }?>>Wyoming</option>
</select>
</li>
<li>
<input id="jform_profile_postal_code" type="text" class="step_input required" aria-required="true" required="required" size="30" value="<?php if($profile->profile['postal_code'] != ''){ echo $profile->profile['postal_code'];}else{echo 'Zip :';} ?>" onfocus="if(this.value=='Zip :'){this.value=''}" onblur="if(this.value=='') {this.value='Zip :'}" name="jform[profile][postal_code]">

</li>
<li><input type="submit" value="Next" class="step_next" onClick="return validation()" ></li>
</ul>



</div>

<div class="form-actions">
<input type="hidden" name="jform[username]" id="jform_username" value="<?php echo $user->username; ?>"/>
<input type="hidden" name="jform[name]" id="jform_name" value="<?php echo $user->name; ?>" />
<input type="hidden" name="jform[email1]" id="jform_email1" value="<?php echo $user->email; ?>"/>
<input type="hidden" name="jform[email2]" id="jform_email2" value="<?php echo $user->email; ?>"/>
<input type="hidden" name="jform[profile][baddress]" id="jform_profile_baddress" value="<?php echo $profile->profile['baddress']; ?>"/>
<input type="hidden" name="jform[profile][bcity]" id="jform_profile_bcity" value="<?php echo $profile->profile['bcity']; ?>"/>
<input type="hidden" name="jform[profile][bregion]" id="jform_profile_bregion" value="<?php echo $profile->profile['bregion']; ?>"/>
<input type="hidden" name="jform[profile][bpostal_code]" id="jform_profile_bpostal_code" value="<?php echo $profile->profile['bpostal_code']; ?>"/>
<input type="hidden" name="jform[profile][dob]" id="jform_profile_dob" value="<?php echo $profile->profile['dob']; ?>"/>

<input type="hidden" name="option" value="com_users" />
<input type="hidden" name="task" value="profile.save1"/>
<?php echo JHtml::_('form.token'); ?> </div>



</form>

<?php }?>
</div>


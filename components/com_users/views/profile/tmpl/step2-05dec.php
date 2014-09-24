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
JHTML::_('behavior.modal');
//load user_profile plugin language
$lang = JFactory::getLanguage();
$lang->load('plg_user_profile', JPATH_ADMINISTRATOR);
?>
<script>
function fill(value){
	if(value == 'Yes'){
		jQuery("#jform_same_as_ship").val('yes');
		
		var ship =	jQuery("#jform_profile_address1").val();
		jQuery("#jform_profile_baddress").val(ship);
		jQuery("#jbaddress").removeAttr("disabled");
		jQuery("#jform_profile_baddress").attr("disabled",true);
		
		var city =	jQuery("#jform_profile_city").val();
		jQuery("#jform_profile_bcity").val(city);
		jQuery("#jbcity").removeAttr("disabled");
		jQuery("#jform_profile_bcity").attr("disabled",true);

		var state =	jQuery("#jform_profile_region").val();
		jQuery("#jform_profile_bregion").val(state);
		jQuery("#jbregion").removeAttr("disabled");
		jQuery("#jform_profile_bregion").attr("disabled",true);

		var zip =	jQuery("#jform_profile_postal_code").val();
		jQuery("#jform_profile_bpostal_code").val(zip);
		jQuery("#jbzip").removeAttr("disabled");
		jQuery("#jform_profile_bpostal_code").attr("disabled",true);

	    jQuery("#input_action1").addClass("active"); 
	    jQuery("#input_action2").removeClass("active");
	 
	}else{
		jQuery("#jform_same_as_ship").val('no');
		
		var add =	jQuery("#baddress").val();
		jQuery("#jform_profile_baddress").val(add);
		jQuery("#jbaddress").attr("disabled",true);
		jQuery("#jform_profile_baddress").removeAttr("disabled");

		var city =	jQuery("#bcity").val();
		jQuery("#jform_profile_bcity").val(city);
		jQuery("#jbcity").attr("disabled",true);
		jQuery("#jform_profile_bcity").removeAttr("disabled");

		var state =	jQuery("#bregion").val();
		jQuery("#jform_profile_bregion").val(state);
		jQuery("#jbregion").attr("disabled",true);
		jQuery("#jform_profile_bregion").removeAttr("disabled");
		
		var zip =	jQuery("#bzip").val();
		jQuery("#jform_profile_bpostal_code").val(zip);
		jQuery("#jbzip").attr("disabled",true);
		jQuery("#jform_profile_bpostal_code").removeAttr("disabled");

		jQuery("#input_action2").addClass("active");
		jQuery("#input_action1").removeClass("active");
	}
}

function validation(){
	var validation="";
	var cc_name = document.getElementById("jform_profile_name_on_card").value;
	var address= document.getElementById("jform_profile_address1").value;
    var city= document.getElementById("jform_profile_city").value;
    var zip= document.getElementById("jform_profile_postal_code").value;
	var cc_no = document.getElementById("jform_profile_ccnumber").value;
	var cc_cvv = document.getElementById("jform_profile_cvv").value;

	if(cc_name=='' || cc_name=='Name on Card :')

	{	

		validation +='Please Enter Name on Card\n';

	}
	
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

	if(cc_no=='' || cc_no=='Card Number :')

	{	

		validation +='Please Enter Card number\n';

	}

	if(cc_cvv=='' || cc_cvv=='cvv :')

	{	

		validation +='Please Enter cvv\n';

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
$ses_var = $db->loadObjectList();
$crm_id = $ses_var[0]->crm_customer_id;
$app = JFactory::getApplication();

$menu = $app->getMenu();
// get active menu id
$activeId = $menu->getActive()->id;
 $same_as_ship = $ses_var[0]->same_as_ship;
?>

<?php if($crm_id != 0 && $activeId == 141){?>
<form id="member-profile" action="<?php echo JRoute::_('index.php?option=com_users&task=profile.update2'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
  <div class="update_form_main update_form_main2">
        <ul class="update_collm">
        <li class="clearfix">
            <div class="update_left_text"> Card Type </div>
            <div class="update_right_box">
              <select id="jform_profile_cardtype" class="update_sel" name="jform[profile][cardtype]" aria-invalid="false">
			<option value="Visa" <?php if($ses_var[0]->cc_type == 'Visa'){?>selected="selected"<?php }?>>Visa</option>
			<option value="Amex" <?php if($ses_var[0]->cc_type == 'Amex'){?>selected="selected"<?php }?>>Amex</option>
			<option value="Discover" <?php if($ses_var[0]->cc_type == 'Discover'){?>selected="selected"<?php }?>>Discover</option>
			<option value="MasterCard" <?php if($ses_var[0]->cc_type == 'MasterCard'){?>selected="selected"<?php }?>>Master Card</option>
		</select>
            </div>
          </li>
          <li class="clearfix">
            <div class="update_left_text"> Name on Card </div>
            <div class="update_right_box">
              <input id="jform_profile_name_on_card" type="text" class="update_input required" aria-required="true" required="required"  maxlength="40" size="30" value="<?php echo $ses_var[0]->cc_name;?>" name="jform[profile][name_on_card]" >
            </div>
          </li>
          <li class="clearfix">
            <div class="update_left_text"> Credit Card Number <img src="<?php echo $this->baseurl?>/templates/twit-home/images/payment-img.gif" width="51" height="40" alt=" " class="card_pay_img"></div>
            <div class="update_right_box">
             <input id="jform_profile_ccnumber" type="text" class="update_input required" aria-required="true" required="required" size="16" maxlength="16" value="<?php echo $ses_var[0]->cc_number; ?>" name="jform[profile][ccnumber]" >
            </div>
          </li>
          <li class="clearfix">
            <div class="update_left_text"> Expiration Date </div>
            <div class="update_right_box">
              <select id="jform_profile_expmonth" class="update_sel" name="jform[profile][expmonth]" aria-invalid="false">
			<option value="01" <?php if($ses_var[0]->cc_exp_month == '01'){?>selected="selected"<?php }?>>Jan</option>
			<option value="02" <?php if($ses_var[0]->cc_exp_month == '02'){?>selected="selected"<?php }?>>Feb</option>
			<option value="03" <?php if($ses_var[0]->cc_exp_month == '03'){?>selected="selected"<?php }?>>Mar</option>
			<option value="04" <?php if($ses_var[0]->cc_exp_month == '04'){?>selected="selected"<?php }?>>Apr</option>
			<option value="05" <?php if($ses_var[0]->cc_exp_month == '05'){?>selected="selected"<?php }?>>May</option>
			<option value="06" <?php if($ses_var[0]->cc_exp_month == '06'){?>selected="selected"<?php }?>>Jun</option>
			<option value="07" <?php if($ses_var[0]->cc_exp_month == '07'){?>selected="selected"<?php }?>>Jul</option>
			<option value="08" <?php if($ses_var[0]->cc_exp_month == '08'){?>selected="selected"<?php }?>>Aug</option>
			<option value="09" <?php if($ses_var[0]->cc_exp_month == '09'){?>selected="selected"<?php }?>>Sep</option>
			<option value="10" <?php if($ses_var[0]->cc_exp_month == '10'){?>selected="selected"<?php }?>>Oct</option>
			<option value="11" <?php if($ses_var[0]->cc_exp_month == '11'){?>selected="selected"<?php }?>>Nov</option>
			<option value="12" <?php if($ses_var[0]->cc_exp_month == '12'){?>selected="selected"<?php }?>>Dec</option>
		</select>
		<select id="jform_profile_expyear" class="update_sel" name="jform[profile][expyear]" aria-invalid="false">
			
			<?php for ($i= date('Y'); $i < (date('Y') + 8); $i++) { ?>
			<option value="<?php echo $i; ?>" <?php if($ses_var[0]->cc_exp_year == $i){?>selected="selected"<?php }?>><?php echo $i;?></option>
			<?php } ?>
		</select>
		
            </div>
          </li>
          <li class="clearfix">
            <div class="update_left_text"> CVV &nbsp; <a rel="{handler: 'iframe', size: {x: 500, y: 450}}" href="index.php?option=com_content&view=article&id=22&tmpl=component" class="modal" style="color: #A90B08">What is this?</a></div>
            <div class="update_right_box">
            <input id="jform_profile_cvv" type="text" class="update_input_02 required" aria-required="true" required="required" size="3"  maxlength="3" value="<?php echo $ses_var[0]->cc_cvv;?>" name="jform[profile][cvv]" >
            </div>
          </li>
          <?php /*?><li class="clearfix">
            <div class="update_left_text"> Billing Address Same as Shipping? </div>
            <div class="update_right_box">
              <ul class="user_action">
                <li>
                  <input type="button" value="Yes" class="input_action <?php if($same_as_ship == 'yes'){?>active<?php }?>" id="input_action1" onclick="fill(this.value)">
                  
                  <input type="button" value="No" class="input_action <?php if($same_as_ship == 'no' || $user->same_as_ship == ''){?>active<?php }?>" id="input_action2" onclick="fill(this.value)">
                </li>
              </ul>
            </div>
          </li><?php */?>
          <li class="clearfix">
            <div class="update_left_text">Billing Address</div>
            <div class="update_right_box">
              <input type="text" id="jform_profile_address1" name="jform[profile][address1]"  value="<?php echo $profile->profile['address1']?>" aria-required="true" required="required" class="update_input">
            </div>
          </li>
          <li class="clearfix">
            <div class="update_left_text">City</div>
            <div class="update_right_box">
              <input type="text" id="jform_profile_city" name="jform[profile][city]" value="<?php echo $profile->profile['city']?>" aria-required="true" required="required" class="update_input">
            </div>
          </li>
          <li class="clearfix">
            <div class="update_left_text">State</div>
            <div class="update_right_box">
              <select id="jform_profile_region" name="jform[profile][region]"  class="update_sel" aria-invalid="false">
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
                <input type="text" id="jform_profile_postal_code" name="jform[profile][postal_code]"  value="<?php echo $profile->profile['postal_code']?>" aria-required="true" required="required" class="update_input_03"></li>
                
                </ul>
            </div>
          </li>
        </ul>
        
        <input type="submit" value="Update" class="update_button">
      </div>
     <div class="form-actions">
<input type="hidden" name="jform[username]" id="jform_username" value="<?php echo $user->username; ?>" size="30"/>
<input type="hidden" name="jform[name]" id="jform_name" value="<?php echo $user->name; ?>" size="30"/>
<input type="hidden" name="jform[email1]" id="jform_email1" value="<?php echo $user->email; ?>" size="30"/>
<input type="hidden" name="jform[email2]" id="jform_email2" value="<?php echo $user->email; ?>" size="30"/>
<input type="hidden" name="jform[profile][dob]" id="jform_profile_dob" value="<?php echo $profile->profile['dob']; ?>"/>
<input type="hidden" id="baddress" value="<?php echo $profile->profile['baddress']?>">
<input type="hidden" id="bcity" value="<?php echo $profile->profile['bcity']?>">
<input type="hidden" id="bregion" value="<?php echo $profile->profile['bregion']?>">
<input type="hidden" id="bzip" value="<?php echo $profile->profile['bpostal_code']?>">
<input type="hidden" disabled="disabled" name="jform[profile][baddress]" id="jbaddress" value="<?php echo $profile->profile['address1']; ?>"/>
<input type="hidden" disabled="disabled" name="jform[profile][bcity]" id="jbcity" value="<?php echo $profile->profile['city']; ?>"/>
<input type="hidden" disabled="disabled" name="jform[profile][bregion]" id="jbregion" value="<?php echo $profile->profile['region']; ?>"/>
<input type="hidden" disabled="disabled" name="jform[profile][bpostal_code]" id="jbzip" value="<?php echo $profile->profile['postal_code']; ?>"/>
<input type="hidden" disabled="disabled" name="option" value="com_users" />
<input type="hidden" name="jform[profile][same_as_ship]" id="jform_same_as_ship" value="<?php echo $user->same_as_ship; ?>">
<input type="hidden" disabled="disabled" name="task" value="profile.update2" />

      <?php echo JHtml::_('form.token'); ?> </div>
     
       
  </form>
<?php }else{?>
<form id="member-profile" action="<?php echo JRoute::_('index.php?option=com_users&task=profile.save2'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
 <div class="step_third">
       <div class="home_text_title">Sign up: Step 2 </div>
      <div class="home_billing_subtitle">Credit Card Information: </div>
      
    
      <ul class="step_listing">
       <li>
      <input id="jform_profile_name_on_card" type="text" class="step_input required" aria-required="true" required="required"  maxlength="40" size="30" value="<?php if($ses_var[0]->cc_name != ''){ echo $ses_var[0]->cc_name;}else{echo 'Name on Card :';} ?>" onfocus="if(this.value=='Name on Card :'){this.value=''}" onblur="if(this.value=='') {this.value='Name on Card :'}" name="jform[profile][name_on_card]" >
      </li>
      </ul>
      <div class="home_billing_subtitle">Billing Address: </div>
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
      
      <li>
      <select id="jform_profile_cardtype" class="step_select_cc" name="jform[profile][cardtype]" aria-invalid="false">
			<option value="Visa" <?php if($ses_var[0]->cc_type == 'Visa'){?>selected="selected"<?php }?>>Visa</option>
			<option value="Amex" <?php if($ses_var[0]->cc_type == 'Amex'){?>selected="selected"<?php }?>>Amex</option>
			<option value="Discover" <?php if($ses_var[0]->cc_type == 'Discover'){?>selected="selected"<?php }?>>Discover</option>
			<option value="MasterCard" <?php if($ses_var[0]->cc_type == 'MasterCard'){?>selected="selected"<?php }?>>Master Card</option>
		</select>
      </li>
      
      <li>
      <input id="jform_profile_ccnumber" type="text" class="step_input required" aria-required="true" required="required" size="16" maxlength="16" value="<?php if($ses_var[0]->cc_number != ''){ echo $ses_var[0]->cc_number;}else{echo 'Card Number :';} ?>" onfocus="if(this.value=='Card Number :'){this.value=''}" onblur="if(this.value=='') {this.value='Card Number :'}" name="jform[profile][ccnumber]" >
      
      </li>
      <li>
      <input id="jform_profile_cvv" type="text" class="step_input3 required" aria-required="true" required="required" size="3"  maxlength="3" value="<?php if($ses_var[0]->cc_cvv != 0){ echo $ses_var[0]->cc_cvv; }else{echo 'cvv :';} ?>" onfocus="if(this.value=='cvv :'){this.value=''}" onblur="if(this.value=='') {this.value='cvv :'}" name="jform[profile][cvv]" >
      <!-- &nbsp; <a style="color:#FFF; font:12px 'MyriadProSemibold',Arial,Helvetica,sans-serif;" href="<?php echo JURI::base();?>index.php?option=com_content&view=article&id=22" class="modal">What's This?</a> -->
      &nbsp; <a rel="{handler: 'iframe', size: {x: 500, y: 450}}" href="index.php?option=com_content&view=article&id=22&tmpl=component" class="modal" style="color: #A90B08">What is this?</a>
     
      </li>
      
      <li>
		<select id="jform_profile_expmonth" class="step_select" name="jform[profile][expmonth]" aria-invalid="false">
			<option value="01" <?php if($ses_var[0]->cc_exp_month == '01'){?>selected="selected"<?php }?>>Jan</option>
			<option value="02" <?php if($ses_var[0]->cc_exp_month == '02'){?>selected="selected"<?php }?>>Feb</option>
			<option value="03" <?php if($ses_var[0]->cc_exp_month == '03'){?>selected="selected"<?php }?>>Mar</option>
			<option value="04" <?php if($ses_var[0]->cc_exp_month == '04'){?>selected="selected"<?php }?>>Apr</option>
			<option value="05" <?php if($ses_var[0]->cc_exp_month == '05'){?>selected="selected"<?php }?>>May</option>
			<option value="06" <?php if($ses_var[0]->cc_exp_month == '06'){?>selected="selected"<?php }?>>Jun</option>
			<option value="07" <?php if($ses_var[0]->cc_exp_month == '07'){?>selected="selected"<?php }?>>Jul</option>
			<option value="08" <?php if($ses_var[0]->cc_exp_month == '08'){?>selected="selected"<?php }?>>Aug</option>
			<option value="09" <?php if($ses_var[0]->cc_exp_month == '09'){?>selected="selected"<?php }?>>Sep</option>
			<option value="10" <?php if($ses_var[0]->cc_exp_month == '10'){?>selected="selected"<?php }?>>Oct</option>
			<option value="11" <?php if($ses_var[0]->cc_exp_month == '11'){?>selected="selected"<?php }?>>Nov</option>
			<option value="12" <?php if($ses_var[0]->cc_exp_month == '12'){?>selected="selected"<?php }?>>Dec</option>
		</select>
		<select id="jform_profile_expyear" class="step_select" name="jform[profile][expyear]" aria-invalid="false">
			<?php for ($i= date('Y'); $i < (date('Y') + 8); $i++) { ?>
			<option value="<?php echo $i; ?>" <?php if($ses_var[0]->cc_exp_year == $i){?>selected="selected"<?php }?>><?php echo $i;?></option>
			<?php } ?>
		</select>
		&nbsp;
		<span style="color: rgb(255, 255, 255); font: 16px 'MyriadProSemibold',Arial,Helvetica,sans-serif;">Expiration Date </span>
      <li>
      
      </li>
      <li><input type="Submit" value="Submit" class="step_submit" onClick="return validation()"></li>
      </ul>
     
      </div>
<div class="form-actions">
<input type="hidden" name="jform[username]" id="jform_username" value="<?php echo $user->username; ?>" size="30"/>
<input type="hidden" name="jform[name]" id="jform_name" value="<?php echo $user->name; ?>" size="30"/>
<input type="hidden" name="jform[email1]" id="jform_email1" value="<?php echo $user->email; ?>" size="30"/>
<input type="hidden" name="jform[email2]" id="jform_email2" value="<?php echo $user->email; ?>" size="30"/>
<input type="hidden" name="option" value="com_users" />
<input type="hidden" name="task" value="profile.save2" />

      <?php echo JHtml::_('form.token'); ?> </div>
     
       
  </form>
<?php }?>
   
    
</div>

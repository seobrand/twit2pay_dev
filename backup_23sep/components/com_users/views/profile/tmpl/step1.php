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
<div class="profile-edit<?php echo $this->pageclass_sfx?>" style="margin-top: 218px;">
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
//echo '<pre>';print_r($user);

?>




<form id="member-profile" action="<?php echo JRoute::_('index.php?option=com_users&task=profile.save1'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">


 <div class="step_title">Step 1 of 4 - Your Address</div>
 <div class="step_inner">
 <ul>
   <li>
   <div class="address_txt_box">
      
     <p>Street Address:</p>
        <input type="text" class="text_box required" aria-required="true" required="required" name="jform[profile][address1]" id="jform_profile_address1" value="<?php echo $profile->profile['address1']; ?>" size="30"/>
     
   </div>
    <div class="apt_no">
      
       <p>Suite / Apt #:</p>
       <input id="jform_profile_apt" class="apt_text_box required" aria-required="true" required="required" type="text" size="30" value="<?php echo $profile->profile['apt']; ?>" name="jform[profile][apt]">
    
     </div> 
   </li>
    
    <li>
   <div class="business_name">
			    <p>City:</p>
        <input type="text" class="city_text_box required" aria-required="true" required="required" name="jform[profile][city]" id="jform_profile_city" value="<?php echo $profile->profile['city']; ?>" size="30"/>
     </div>
     
     <div class="state">
			    <p>State:</p>
        <select id="jform_profile_region" name="jform[profile][region]" class="state_combo" aria-invalid="false">
<option value="Alabana">Alabama</option>
                  <option value="Alaska" <?php  if($profile->profile['region'] == 'Alaska'){?>selected="selected"<?php }?>>Alaska</option>
                  <option value="American Samoa" <?php  if($profile->profile['region'] == 'American Samoa'){?>selected="selected"<?php }?>>American Samoa</option>
                  <option value="Arizona" <?php  if($profile->profile['region'] == 'Arizona'){?>selected="selected"<?php }?>>Arizona</option>
                  <option value="Arkansas" <?php  if($profile->profile['region'] == 'Arkansas'){?>selected="selected"<?php }?>>Arkansas</option>
                  <option value="California" <?php  if($profile->profile['region'] == 'California'){?>selected="selected"<?php }?>>California</option>
                  <option value="Colorado" <?php  if($profile->profile['region'] == 'Colorado'){?>selected="selected"<?php }?>>Colorado</option>
                  <option value="Connecticut" <?php  if($profile->profile['region'] == 'Connecticut'){?>selected="selected"<?php }?>>Connecticut</option>
                  <option value="Delaware" <?php  if($profile->profile['region'] == 'Delaware'){?>selected="selected"<?php }?>>Delaware</option>
                  <option value="District of Columbia" <?php  if($profile->profile['region'] == 'District of Columbia'){?>selected="selected"<?php }?>>District of Columbia</option>
                  <option value="Florida" <?php  if($profile->profile['region'] == 'Florida'){?>selected="selected"<?php }?>>Florida</option>
                  <option value="Georgia" <?php  if($profile->profile['region'] == 'Georgia'){?>selected="selected"<?php }?>>Georgia</option>
                  <option value="Guam" <?php  if($profile->profile['region'] == 'Guam'){?>selected="selected"<?php }?>>Guam</option>
                  <option value="Hawaii" <?php  if($profile->profile['region'] == 'Hawaii'){?>selected="selected"<?php }?>>Hawaii</option>
                  <option value="Idaho" <?php  if($profile->profile['region'] == 'Idaho'){?>selected="selected"<?php }?>>Idaho</option>
                  <option value="Illinois" <?php  if($profile->profile['region'] == 'Illinois'){?>selected="selected"<?php }?>>Illinois</option>
                  <option value="Indiana" <?php  if($profile->profile['region'] == 'Indiana'){?>selected="selected"<?php }?>>Indiana</option>
                  <option value="Iowa" <?php  if($profile->profile['region'] == 'Iowa'){?>selected="selected"<?php }?>>Iowa</option>
                  <option value="Kansas" <?php  if($profile->profile['region'] == 'Kansas'){?>selected="selected"<?php }?>>Kansas</option>
                  <option value="Kentucky" <?php  if($profile->profile['region'] == 'Kentucky'){?>selected="selected"<?php }?>>Kentucky</option>
                  <option value="Louisiana" <?php  if($profile->profile['region'] == 'Louisiana'){?>selected="selected"<?php }?>>Louisiana</option>
                  <option value="Maine" <?php  if($profile->profile['region'] == 'Maine'){?>selected="selected"<?php }?>>Maine</option>
                  <option value="Maryland" <?php  if($profile->profile['region'] == 'Maryland'){?>selected="selected"<?php }?>>Maryland</option>
                  <option value="Massachusetts" <?php  if($profile->profile['region'] == 'Massachusetts'){?>selected="selected"<?php }?>>Massachusetts</option>
                  <option value="Michigan" <?php  if($profile->profile['region'] == 'Michigan'){?>selected="selected"<?php }?>>Michigan</option>
                  <option value="Minnesota" <?php  if($profile->profile['region'] == 'Minnesota'){?>selected="selected"<?php }?>>Minnesota</option>
                  <option value="Mississippi" <?php  if($profile->profile['region'] == 'Mississippi'){?>selected="selected"<?php }?>>Mississippi</option>
                  <option value="Missouri" <?php  if($profile->profile['region'] == 'Missouri'){?>selected="selected"<?php }?>>Missouri</option>
                  <option value="Montana" <?php  if($profile->profile['region'] == 'Montana'){?>selected="selected"<?php }?>>Montana</option>
                  <option value="Nebraska" <?php  if($profile->profile['region'] == 'Nebraska'){?>selected="selected"<?php }?>>Nebraska</option>
                  <option value="Nevada" <?php  if($profile->profile['region'] == 'Nevada'){?>selected="selected"<?php }?>>Nevada</option>
                  <option value="New Hampshire" <?php  if($profile->profile['region'] == 'New Hampshire'){?>selected="selected"<?php }?>>New Hampshire</option>
                  <option value="New Jersey" <?php  if($profile->profile['region'] == 'New Jersey'){?>selected="selected"<?php }?>>New Jersey</option>
                  <option value="New Mexico" <?php  if($profile->profile['region'] == 'New Mexico'){?>selected="selected"<?php }?>>New Mexico</option>
                  <option value="New York" <?php  if($profile->profile['region'] == 'New York'){?>selected="selected"<?php }?>>New York</option>
                  <option value="North Carolina" <?php  if($profile->profile['region'] == 'North Carolina'){?>selected="selected"<?php }?>>North Carolina</option>
                  <option value="North Dakota" <?php  if($profile->profile['region'] == 'North Dakota'){?>selected="selected"<?php }?>>North Dakota</option>
                  <option value="Northern Marianas Islands" <?php  if($profile->profile['region'] == 'Northern Marianas Islands'){?>selected="selected"<?php }?>>Northern Marianas Islands</option>
                  <option value="Ohio" <?php  if($profile->profile['region'] == 'Ohio'){?>selected="selected"<?php }?>>Ohio</option>
                  <option value="Oklahoma" <?php  if($profile->profile['region'] == 'Oklahoma'){?>selected="selected"<?php }?>>Oklahoma</option>
                  <option value="Oregon" <?php  if($profile->profile['region'] == 'Oklahoma'){?>selected="selected"<?php }?>>Oregon</option>
                  <option value="Pennsylvania" <?php  if($profile->profile['region'] == 'Pennsylvania'){?>selected="selected"<?php }?>>Pennsylvania</option>
                  <option value="Puerto Rico" <?php  if($profile->profile['region'] == 'Puerto Rico'){?>selected="selected"<?php }?>>Puerto Rico</option>
                  <option value="Rhode Island" <?php  if($profile->profile['region'] == 'Rhode Island'){?>selected="selected"<?php }?>>Rhode Island</option>
                  <option value="South Carolina" <?php  if($profile->profile['region'] == 'South Carolina'){?>selected="selected"<?php }?>>South Carolina</option>
                  <option value="South Dakota" <?php  if($profile->profile['region'] == 'South Dakota'){?>selected="selected"<?php }?>South Dakota</option>
                  <option value="Tennessee" <?php  if($profile->profile['region'] == 'Tennessee'){?>selected="selected"<?php }?>>Tennessee</option>
                  <option value="Texas" <?php  if($profile->profile['region'] == 'Texas'){?>selected="selected"<?php }?>>Texas</option>
                  <option value="Utah" <?php  if($profile->profile['region'] == 'Utah'){?>selected="selected"<?php }?>>Utah</option>
                  <option value="Vermont" <?php  if($profile->profile['region'] == 'Vermont'){?>selected="selected"<?php }?>>Vermont</option>
                  <option value="Virginia" <?php  if($profile->profile['region'] == 'Virginia'){?>selected="selected"<?php }?>>Virginia</option>
                  <option value="Virgin Islands" <?php  if($profile->profile['region'] == 'Virgin Islands'){?>selected="selected"<?php }?>>Virgin Islands</option>
                  <option value="Washington" <?php  if($profile->profile['region'] == 'Washington'){?>selected="selected"<?php }?>>Washington</option>
                  <option value="West Virginia" <?php  if($profile->profile['region'] == 'West Virginia'){?>selected="selected"<?php }?>>West Virginia</option>
                  <option value="Wisconsin" <?php  if($profile->profile['region'] == 'Wisconsin'){?>selected="selected"<?php }?>>Wisconsin</option>
                  <option value="Wyoming" <?php  if($profile->profile['region'] == 'Wyoming'){?>selected="selected"<?php }?>>Wyoming</option>
</select>
     </div>
     
   <div class="zipcode">
			    <p>Zip:</p>
       <input id="jform_profile_postal_code" type="text" class="zipcode_txtbox required" aria-required="true" required="required" size="30" value="<?php echo $profile->profile['postal_code']; ?>" name="jform[profile][postal_code]">
     </div>
    </li>
    
    
    
    
    
    </ul>
   </div> 
    <div class="form-actions">
      <input type="hidden" name="jform[username]" id="jform_username" value="<?php echo $user->username; ?>"/>
       <input type="hidden" name="jform[name]" id="jform_name" value="<?php echo $user->name; ?>" />
       <input type="hidden" name="jform[email1]" id="jform_email1" value="<?php echo $user->email; ?>"/>
         <input type="hidden" name="jform[email2]" id="jform_email2" value="<?php echo $user->email; ?>"/>
         <input type="hidden" name="jform[profile][website]" id="jform_profile_website" value="<?php echo $profile->profile['website']; ?>"/>
     <input type="hidden" name="jform[profile][avg_tra]" id="jform_profile_avg_tra" value="<?php echo $profile->profile['avg_tra']; ?>"/>
      <input type="hidden" name="jform[profile][max_tra]" id="jform_profile_max_tra" value="<?php echo $profile->profile['max_tra']; ?>"/>
       <input type="hidden" name="jform[profile][est_volume]" id="jform_profile_est_volume" value="<?php echo $profile->profile['est_volume']; ?>"/>
      
      <input type="hidden" name="jform[profile][buss_type]" id="jform_profile_buss_type" value="<?php echo $profile->profile['buss_type']; ?>"/>
        <input type="hidden" name="jform[profile][buss_name]" id="jform_profile_buss_name" value="<?php echo $profile->profile['buss_name']; ?>"/>
        <input type="hidden" name="jform[profile][tax_no]" id="jform_profile_tax_no" value="<?php echo $profile->profile['tax_no']; ?>"/>
        <input type="hidden" name="jform[profile][bank_acc]" id="jform_profile_bank_acc" value="<?php echo $profile->profile['bank_acc']; ?>"/>
        <input type="hidden" name="jform[profile][r_no]" id="jform_profile_r_no" value="<?php echo $profile->profile['r_no']; ?>"/>
        <input type="hidden" name="jform[profile][ss_no]" id="jform_profile_ss_no" value="<?php echo $profile->profile['ss_no']; ?>"/>
        <input type="hidden" name="jform[profile][dob]" id="jform_profile_dob" value="<?php echo $profile->profile['dob']; ?>"/>
      
      <input type="hidden" name="option" value="com_users" />
      <input type="hidden" name="task" value="profile.save1" />
      <?php echo JHtml::_('form.token'); ?> </div>
      
      <div class="next_outer">
          <input type="submit" value="Next >" class="signup_btn next_btn">
        </div>
      
  </form>
</div>

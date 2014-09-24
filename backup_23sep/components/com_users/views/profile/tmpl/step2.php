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
//echo '<pre>';print_r($profile);

?>




<form id="member-profile" action="<?php echo JRoute::_('index.php?option=com_users&task=profile.save2'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">


 <div class="step_title">step 2 of 4 - Tell us about your website</div>
 <div class="business_step">
          <ul>
 <li>
 <div class="business_name">
                <p>Website URL:</p>
<input id="jform_profile_website" type="text" class="business_type_txtbox required" aria-required="true" required="required" size="30" value="<?php echo $profile->profile['website']; ?>" name="jform[profile][website]" >
</div>
<div class="business_name">
                <p>Average Transaction Size:</p>
<select id="jform_profile_avg_tra" class="business_type_combo" name="jform[profile][avg_tra]" aria-invalid="false">
<option value="Less than $20" <?php if($profile->profile['avg_tra'] == 'Less than $20'){?>selected="selected"<?php }?>>Less than $20</option>
                <option value="$25" <?php if($profile->profile['avg_tra'] == '$25'){?>selected="selected"<?php }?>>$25</option>
                <option value="$50" <?php if($profile->profile['avg_tra'] == '$50'){?>selected="selected"<?php }?>>$50</option>
                <option value="$75" <?php  if($profile->profile['avg_tra'] == '$75'){?>selected="selected"<?php }?>>$75</option>
                <option value="$100" <?php  if($profile->profile['avg_tra'] == '$100'){?>selected="selected"<?php }?>>$100</option>
                <option value="$200" <?php  if($profile->profile['avg_tra'] == '$200'){?>selected="selected"<?php }?>>$200</option>
                <option value="$300" <?php  if($profile->profile['avg_tra'] == '$300'){?>selected="selected"<?php }?>>$300</option>
                <option value="$400" <?php  if($profile->profile['avg_tra'] == '$400'){?>selected="selected"<?php }?>>$400</option>
                <option value="$500" <?php  if($profile->profile['avg_tra'] == '$500'){?>selected="selected"<?php }?>>$500</option>
                <option value="Over $500+" <?php  if($profile->profile['avg_tra'] == 'Over $500+'){?>selected="selected"<?php }?>>Over $500+</option>
</select>
</div>
</li>
<li>
<div class="business_name">
                <p>Maximum Transaction Size:</p>
<select id="jform_profile_max_tra" name="jform[profile][max_tra]" class="business_type_combo">
<option value="Less than $20" <?php if($profile->profile['max_tra'] == 'Less than $20'){?>selected="selected"<?php }?>>Less than $20</option>
                <option value="$25" <?php if($profile->profile['max_tra'] == '$25'){?>selected="selected"<?php }?>>$25</option>
                <option value="$50" <?php if($profile->profile['max_tra'] == '$50'){?>selected="selected"<?php }?>>$50</option>
                <option value="$75" <?php  if($profile->profile['max_tra'] == '$75'){?>selected="selected"<?php }?>>$75</option>
                <option value="$100" <?php  if($profile->profile['max_tra'] == '$100'){?>selected="selected"<?php }?>>$100</option>
                <option value="$200" <?php  if($profile->profile['max_tra'] == '$200'){?>selected="selected"<?php }?>>$200</option>
                <option value="$300" <?php  if($profile->profile['max_tra'] == '$300'){?>selected="selected"<?php }?>>$300</option>
                <option value="$400" <?php  if($profile->profile['max_tra'] == '$400'){?>selected="selected"<?php }?>>$400</option>
                <option value="$500" <?php  if($profile->profile['max_tra'] == '$500'){?>selected="selected"<?php }?>>$500</option>
                <option value="Over $500+" <?php  if($profile->profile['max_tra'] == 'Over $500+'){?>selected="selected"<?php }?>>Over $500+</option>
</select>
</div>
<div class="business_name">
                <p>Estimated Monthly Volume: </p>
<select id="jform_profile_est_volume" name="jform[profile][est_volume]" class="business_type_combo">
<option value="Less than $1,000" <?php  if($profile->profile['est_volume'] == 'Less than $1,000'){?>selected="selected"<?php }?>>Less than $1,000</option>
               	<option value="$2,000" <?php  if($profile->profile['est_volume'] == '$2,000'){?>selected="selected"<?php }?>>$2,000</option>
	            <option value="$3,000" <?php  if($profile->profile['est_volume'] == '$3,000'){?>selected="selected"<?php }?>>$3,000</option> 
                <option value="$4,000" <?php  if($profile->profile['est_volume'] == '$4,000'){?>selected="selected"<?php }?>>$4,000</option> 
                <option value="$5,000" <?php  if($profile->profile['est_volume'] == '$5,000'){?>selected="selected"<?php }?>>$5,000</option>
                <option value="$6,000" <?php  if($profile->profile['est_volume'] == '$6,000'){?>selected="selected"<?php }?>>$6,000</option>
                <option value="$7,000" <?php  if($profile->profile['est_volume'] == '$7,000'){?>selected="selected"<?php }?>>$7,000</option>
                <option value="$8,000" <?php  if($profile->profile['est_volume'] == '$8,000'){?>selected="selected"<?php }?>>$8,000</option>
                <option value="$9,000" <?php  if($profile->profile['est_volume'] == '$9,000'){?>selected="selected"<?php }?>>$9,000</option>
                <option value="$10,000" <?php  if($profile->profile['est_volume'] == '$10,000'){?>selected="selected"<?php }?>>$10,000</option>
                <option value="Over $10,000+" <?php  if($profile->profile['est_volume'] == 'Over $10,000+'){?>selected="selected"<?php }?>>Over $10,000+</option> 
</select>
</div>
</li>
</ul>
   </div>
   
    <div class="form-actions">
      <input type="hidden" name="jform[username]" id="jform_username" value="<?php echo $user->username; ?>" size="30"/>
       <input type="hidden" name="jform[name]" id="jform_name" value="<?php echo $user->name; ?>" size="30"/>
        <input type="hidden" name="jform[email1]" id="jform_email1" value="<?php echo $user->email; ?>" size="30"/>
         <input type="hidden" name="jform[email2]" id="jform_email2" value="<?php echo $user->email; ?>" size="30"/>
     <input type="hidden" name="jform[profile][address1]" id="jform_profile_address1" value="<?php echo $profile->profile['address1']; ?>"/>
     <input type="hidden" name="jform[profile][city]" id="jform_profile_city" value="<?php echo $profile->profile['city']; ?>"/>
      <input type="hidden" name="jform[profile][region]" id="jform_profile_region" value="<?php echo $profile->profile['region']; ?>"/>
      <input type="hidden" name="jform[profile][apt]" id="jform_profile_apt" value="<?php echo $profile->profile['apt']; ?>"/>
       <input type="hidden" name="jform[profile][postal_code]" id="jform_profile_postal_code" value="<?php echo $profile->profile['postal_code']; ?>"/>
     
     <input type="hidden" name="jform[profile][buss_type]" id="jform_profile_buss_type" value="<?php echo $profile->profile['buss_type']; ?>"/>
        <input type="hidden" name="jform[profile][buss_name]" id="jform_profile_buss_name" value="<?php echo $profile->profile['buss_name']; ?>"/>
        <input type="hidden" name="jform[profile][tax_no]" id="jform_profile_tax_no" value="<?php echo $profile->profile['tax_no']; ?>"/>
        <input type="hidden" name="jform[profile][bank_acc]" id="jform_profile_bank_acc" value="<?php echo $profile->profile['bank_acc']; ?>"/>
        <input type="hidden" name="jform[profile][r_no]" id="jform_profile_r_no" value="<?php echo $profile->profile['r_no']; ?>"/>
        <input type="hidden" name="jform[profile][ss_no]" id="jform_profile_ss_no" value="<?php echo $profile->profile['ss_no']; ?>"/>
        <input type="hidden" name="jform[profile][dob]" id="jform_profile_dob" value="<?php echo $profile->profile['dob']; ?>"/>
     
      <input type="hidden" name="option" value="com_users" />
      <input type="hidden" name="task" value="profile.save2" />
      <?php echo JHtml::_('form.token'); ?> </div>
      <div class="left_side_btn">
          <input type="button" value="< Previous" class="previous_btn" onClick="window.location.href='index.php?option=com_users&view=profile&layout=step1&Itemid=135'">
        </div>
        <div class="right_side_btn">
          <input type="submit" value="Next >" class="next_btn">
        </div>
  </form>
</div>

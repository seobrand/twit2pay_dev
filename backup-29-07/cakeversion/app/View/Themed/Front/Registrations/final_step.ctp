
    <div class="step_container long_form">
      <div class="step_title">Step 4 of 4 - confirm your information</div>
       <?php echo $this->Form->create('Registration', array('type' => 'post')); ?>
        <div class="step_inner">
          <ul>
            <li>
              <div class="left_side_box">
                <p>Twitter User Name:</p>
              </div>
              <div class="right_side_box">
                <p><?php echo $user['User']['twit_name']; ?></p>
              </div>
            </li>
            <li>
              <div class="left_side_box">
                <p>Name:</p>
              </div>
              <div class="right_side_box">
                <p><?php echo $user['User']['name'];?></p>
              </div>
            </li>
            <li>
              <div class="business_name">
                <p>Name on Card:</p>
                <p><?php echo $user_info['cc_name'];?></p>
              </div>
              <div class="business_name">
                <p>Card Number:</p>
                <p><?php echo $user_info['cc_number'];?></p>
              </div>
            </li>
            <li>
              <div class="business_name small_business_name">
			    <p>Card Type:</p>
                <p><?php echo $user_info['cc_type'];?></p>
              </div>
              
              <div class="business_name small_business_name">
                <p>Credit Card Expiry:</p>
                <p><?php echo $user_info['cc_expire']['month']."-".$user_info['cc_expire']['year'];?></p>
              </div>
              <div class="business_name small_business_name">
			    <p>CVV:</p>
                <p><?php echo $user_info['cc_cvv'];?></p>
              </div>
            </li>
            <li>
            	<div class="address_txt_box">
            		<p>Billing Address:</p>
                	<p><?php echo $user_info['billing_addr'];?></p>
            	</div>
            </li>
            <li>
            	<div class="business_name">
            		<p>Billing City:</p>
                	<p><?php echo $user_info['billing_city'];?></p>
            	</div>
            	<div class="business_name">
            		<p>Billing State:</p>
                 	<p><?php echo $user_info['billing_state'];?></p>
            	</div>
            </li>
            <li>
            	<div class="business_name">
            		<p>Zip:</p>
                	<p><?php echo $user_info['billing_zip'];?></p>
            	</div>
            	<div class="business_name">
            		<p>Phone:</p>
                	<p><?php echo $user_info['billing_phone'];?></p>
            	</div>
            </li>
            <li>
            <div class="continue_checkbox">
	          	<?php echo $this->Form->checkbox('agreement', array( 'class'=> 'check_box'));?>
	               <p>By continuing, I agree to Twit2Pay's <a href="">User Agreement</a>.</p>
	          	<?php echo $this->Form->error('agreement');?>
	       </div>
            </li>
            
          </ul>
          
        </div>        
        <div class="left_side_btn"><?php echo $this->Html->link('< Previous', array('action' => 'stepTwo') , array('class' => 'previous_btn')); ?></div>
		  <?php echo $this->Form->end(array( 'label' => 'Submit Application', 'class' => 'submit_application_btn' ,'div'=> array('class' => 'next_outer')))?>
    </div>
    

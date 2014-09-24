
    <div class="step_container long_form">
      <div class="step_title">Step 2 of 3 - Attach a Credit Card to your account</div>
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
                <?php echo $this->Form->input('cc_name', array('class' => 'business_type_txtbox', 'div' => false, 'label' => false, 'placeholder' => 'Name on Card')); ?>
              </div>
              <div class="business_name">
                <p>Card Number:</p>
                <?php echo $this->Form->input('cc_number', array('class' => 'business_type_txtbox', 'div' => false, 'label' => false, 'placeholder' => 'Card Number')); ?>
              </div>
            </li>
            <li>
              <div class="business_name small_business_name">
			    <p>Card Type:</p>
                <?php echo $this->Form->input('cc_type', array('class' => 'taxid_txtbox', 'div' => false, 'label' => false, 'options' => $car_options)); ?>
              </div>
              
              <div class="business_name small_business_name">
                <p>Credit Card Expiry:</p>
                <?php echo $this->Form->input('cc_expire', array(
                		'class' => 'birth_combo',
						'type' => 'date',
                		'dateFormat' => 'MY',
                		'minYear' => date('Y'),
                		'maxYear' => date('Y')+10,
                		'orderYear'=> 'asc',
                		'separator' => '',
                		'div' => false,
                		'label' => false
						)); ?>
              </div>
              <div class="business_name small_business_name">
			    <p>CVV:</p>
                <?php echo $this->Form->input('cc_cvv', array('class' => 'taxid_txtbox', 'div' => false, 'label' => false, 'placeholder' => 'CVV', 'maxlength' => '4')); ?>
              </div>
            </li>
            <li>
            	<div class="address_txt_box">
            		<p>Billing Address:</p>
                	<?php echo $this->Form->input('billing_addr', array('class' => 'text_box', 'div' => false, 'label' => false, 'placeholder' => 'Billing Address')); ?>
            	</div>
            </li>
            <li>
            	<div class="business_name">
            		<p>Billing City:</p>
                	<?php echo $this->Form->input('billing_city', array('class' => 'text_box', 'div' => false, 'label' => false, 'placeholder' => 'Billing City')); ?>
            	</div>
            	<div class="business_name">
            		<p>Billing State:</p>
                 	<?php echo $this->Form->input('billing_state', array(
                		'class' => 'business_type_combo',
                 		'options' => $common->getStateList(),
                		'div' => false,
                		'label' => false
						)); ?>
            	</div>
            </li>
            <li>
            	<div class="business_name">
            		<p>Zip:</p>
                	<?php echo $this->Form->input('billing_zip', array('class' => 'text_box', 'div' => false, 'label' => false, 'placeholder' => 'Zip')); ?>
            	</div>
            	<div class="business_name">
            		<p>Phone:</p>
                	<?php echo $this->Form->input('billing_phone', array('class' => 'text_box', 'div' => false, 'label' => false, 'placeholder' => 'Phone')); ?>
            	</div>
            </li>
          </ul>
		  </div>
		  <?php echo $this->Form->hidden('math_rand', array( 'value' => $hid_rand, 'div' => false));?>
		  <div class="left_side_btn"><?php echo $this->Html->link('< Previous', array('action' => 'stepOne') , array('class' => 'previous_btn')); ?></div>
		  <?php echo $this->Form->end(array( 'label' => 'Next >', 'class' => 'next_btn' ,'div'=> array('class' => 'next_outer')))?>
    </div>
    

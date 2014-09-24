
    <div class="step_container">
      <div class="step_title">Step 1 of 3 - Your Details</div>
       <?php echo $this->Form->create('Registration', array('type' => 'post')); ?>
        <div class="step_inner">
          <ul>
            <li>
            	<div class="address_txt_box">
            	<p>Name:</p>
              	<?php echo $this->Form->input('name', array('value' => $user['User']['name'] ,'class' => 'text_box', 'div' => false, 'label' => false, 'placeholder' => 'Name')); ?>
            	</div>
            </li>
            <li>
              <div class="address_txt_box">
			    <p>Email:</p>
                <?php echo $this->Form->input('email', array('value' => $user['User']['email'] ,'class' => 'text_box', 'div' => false, 'label' => false, 'placeholder' => 'Email')); ?>
              </div>
            </li>
          </ul>
		  </div>
		  <?php echo $this->Form->end(array( 'label' => 'Next >', 'class' => 'signup_btn next_btn' ,'div'=> array('class' => 'next_outer')))?>
    </div>

<?php

class Registration extends AppModel{
	public $useTable = false;
	
	/**
	 * model validation array
	 *
	 * @var array
	 */
	var $validate = array();
	/**
	 * UsetAuth component object
	 *
	 * @var object
	 */
	var $userAuth;
	/**
	 * model validation array
	 *
	 * @var array
	 */
	function StepOneValidate() {
		$this->setSource('Users');
		$validate1 = array(
				'name'=> array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter name')
					),
				'email'=> array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter email',
						'last'=>true),
					'mustBeEmail'=> array(
						'rule' => array('email'),
						'message' => 'Please enter valid email',
						'last'=>true)/* ,
					'mustUnique'=>array(
						'rule' =>'isUnique',
						'message' =>'This email is already registered',
						) */
					)
			);
		$this->validate=$validate1;
		return $this->validates();
	}

	
	function StepTwoValidate() {
		$validate1 = array(
				'cc_name'=> array(
						'mustNotEmpty'=>array(
								'rule' => 'notEmpty',
								'message'=> 'Please enter name')
				),
				'cc_number' => array( 
                        'notempty' => array( 
                                'rule' => 'notEmpty', 
                                'message' => 'Please enter a card number.', 
                                'required' => true, 
                                'last' => true 
                        ), 
                        'maxLength' => array( 
                                'rule' => array('maxLength', 20), 
                                'message' => 'The credit card number must 20 characters or less.', 
                                'last' => true 
                        ), 
                        'valid' => array( 
                                'rule' => array('cc', 'fast', false, null), 
                                'message' => 'The credit card number you supplied was invalid.' 
                        ) 
                ), 
                'cc_type' => array( 
                        'rule' => 'notEmpty', 
                        'message' => 'Please select a credit card type.', 
                        'required' => true 
                ),
				 'billing_addr' => array( 
                        'rule' => 'notEmpty', 
                        'message' => 'Please enter billing address.', 
                        'required' => true 
                ),
				 'billing_city' => array( 
                        'rule' => 'notEmpty', 
                        'message' => 'Please enter billing city.', 
                        'required' => true 
                ),
				'billing_state' => array( 
                        'rule' => 'notEmpty', 
                        'message' => 'Please select billing state.', 
                        'required' => true 
                ),
				 'billing_zip' => array( 
                        'notempty' => array( 
                                'rule' => 'notEmpty', 
                                'message' => 'Please enter zip code.', 
                                'required' => true, 
                                'last' => true 
                        ), 
                        'postal' => array( 
                                'rule' => array('postal',null,'us'), 
                                'message' => 'Enter valid zip code.', 
                                'last' => true 
                        )
                ),
                'billing_phone' => array( 
                      'notempty' => array( 
                                'rule' => 'notEmpty', 
                                'message' => 'Please enter zip code.', 
                                'required' => true, 
                                'last' => true 
                        )
                ) 
		);
		$this->validate=$validate1;
		return $this->validates();
	}
	
	function FinalStepValidate() {
		
		$validate1 = array(
				'agreement' => array(
		               'rule' => array('comparison', 'equal to', 1),
		               'required' => true,
		               'message' => 'You have to agree Terms And Condition',
						'on' => 'create'
		               )
		);
		$this->validate=$validate1;
		return $this->validates();
	}
	
	
}
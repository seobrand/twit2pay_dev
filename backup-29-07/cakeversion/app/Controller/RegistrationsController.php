<?php
/*
 * Used to implement Registration Process
*  Created by : Jayant V. Paliwal
*/

App::uses('AppController', 'Controller');

class RegistrationsController extends AppController {
	public $theme = 'Front';
	public $layout = 'front';
	
	//public $name = 'Registrations';
	public $helpers = array('Js','Html','Javascript','Text','Paginator','Ajax');
	public $uses = array('Page', 'Usermgmt.User', 'Registration');
	public $components = array('RequestHandler','common', 'OptimalPayment');
	
	public function stepOne(){
		
		if ($this->request->is('post')) {
			$this->Registration->set($this->request->data);
			if($this->Registration->StepOneValidate()){
				
				$this->User->id = $this->UserAuth->getUserId();
				$data['User']['name'] = $this->request->data['Registration']['name'];
				$data['User']['email'] = $this->request->data['Registration']['email'];
				$data['User']['reg_step'] = serialize(array('controller' => 'registrations', 'action' => 'stepTwo'));
				$this->User->save($data);
				$this->Session->write('UserAuth', $this->User->read(false, $this->User->id));
				$this->redirect(unserialize($data['User']['reg_step']));
			}
		}
		
		$this->set('user', $this->Session->read('UserAuth'));
		$this->set('meta_title','');
		$this->set('meta_tags','');
		$this->set('meta_description','');
	}
	
	public function stepTwo(){
		if ($this->request->is('post')) {
			
		//$this->request->data['Registration']['cc_expire'] = $this->request->data['Registration']['cc_expire']['month']."/". $this->request->data['Registration']['cc_expire']['year'];
			
			$this->Registration->set($this->request->data);
			if($this->Registration->StepTwoValidate()){
				/* $errorsArr = $this->Registration->validationErrors;
				pr($errorsArr);
				
				
				die();
				 */
				if($this->Session->read('hid_rand') != $this->request->data['Registration']['math_rand']){
					$this->Session->setFlash('Session Expired. Please Login Again!');
					$this->redirect(array('controller' => 'homes', 'action' => 'index'));
				}
				else{
					$this->Session->write($this->Session->read('hid_rand'), $this->request->data);
					$this->redirect(array('controller' => 'registrations', 'action' => 'finalStep'));
				}
			}
		}
		
		$this->set('user', $this->Session->read('UserAuth'));
		
		$this->set('meta_title','');
		$this->set('meta_tags','');
		$this->set('meta_description','');
		
		$this->Session->write('hid_rand',$this->common->randomString(12));
		$this->set('hid_rand' , $this->Session->read('hid_rand'));
		
		$this->set('car_options', $this->OptimalPayment->getCardTypeList());
	}
	
	public function finalStep(){
		
		
		
		if ($this->request->is('post')) {
			$this->Registration->set($this->request->data);
			
			if($this->Registration->FinalStepValidate()){
				
				$user_info = $this->Session->read($this->Session->read('hid_rand').".Registration");
				$user = $this->Session->read('UserAuth');
				$merchant_info = array(
						'accountNum' =>'89992912',
						'storeID' =>'test',
						'storePwd' =>'test',
						'is_test' => true,
				);
				$payment_info= array(
						'user_id' => '1111111111111',
						'amount' => 22,
						'card_deatils' =>array(
								'cardNum' => $user_info['cc_number'],
								'cardExpiry' =>array(
										'month' => $user_info['cc_expire']['month'],
										'year' =>  $user_info['cc_expire']['year']
								),
								'cardType' => $user_info['cc_type'],
								'cvdIndicator' =>1, // Do we need CVV
								'cvd' => $user_info['cc_cvv']
						),
						'billing_info' => array(
								"firstName"	=> $user_info['cc_name'],
								"lastName"	=> '',
								"street"	=>  $user_info['billing_addr'],
								"street2"	=>  '',
								"city"		=>  $user_info['billing_city'],
								"state"		=>  $user_info['billing_state'],
								"country"	=>  'US',
								"zip"		=>  $user_info['billing_zip'],
								"phone"		=>  $user_info['billing_phone'],
								"email"		=>  $user['User']['email']
						)
				);
				
				
				$this->OptimalPayment->intiatePayment($merchant_info);
				// Authorization
				$result = $this->OptimalPayment->doAuthorize($payment_info);
				
				$this->redirect( array( 'controller' => 'registrations', 'action' => 'thankYou'));
				
				
		 	}
		 	
		 	
		}
		$this->set('user_info', $this->Session->read($this->Session->read('hid_rand').".Registration"));
		$this->set('user', $this->Session->read('UserAuth'));
		$this->set('meta_title','');
		$this->set('meta_tags','');
		$this->set('meta_description','');
	}
	
	public function thankYou(){
		
		if($this->Session->read('UserAuth.User.registered') != 1){
			$this->User->id = $this->UserAuth->getUserId();
			$data['User']['registered'] = 1;
			$data['User']['reg_step'] = '';
			$this->User->save($data);
			$this->Session->write('UserAuth', $this->User->read(false, $this->User->id));
		}
		
		$this->set('meta_title','');
		$this->set('meta_tags','');
		$this->set('meta_description','');
	}
	
}
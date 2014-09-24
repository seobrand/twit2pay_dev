<?php
/*
	 * Used to display all Category ( Project Management Section )
	 *  Created by : 
*/

App::uses('AppController', 'Controller');

class MassEmailsController extends AppController {
	public $theme = 'Admin';
	
	
	/**
	 * This controller uses following models
	 *
	 * @var array
	 */
	public $name = 'MassEmails'; 
	public $helpers = array('Js','Html','Javascript','Text','Paginator','Ajax','Tinymce');
	public $uses = array('ProjectImageCategory','EmailTemplate','EmailCategory','User','Broker','Vendor','Marketing','Lead','Customer');
	public $components = array('RequestHandler','common','Session','Cookie');
	

	/**
	 * Used to display all users by Admin
	 *
	 * @access public
	 * @return array
	 */
	public function allEmailTemplate() {
		
		$this->set('tableName','Email Template Listing');
		$this->paginate	= array('order'=>'template_name ASC','limit'=>'10');
		$emailTemplateLists =$this->paginate('EmailTemplate');
		$this->set('emailTemplateLists', $emailTemplateLists);
		$this->set('total', $this->EmailTemplate->find('count'));

	} 
	public function imageCategory() {
		
	$this->set('mainCategory', $this->ProjectImageCategory->find('list',array('conditions'=>array('ProjectImageCategory.parent_id'=>'0'),'fields'=>'id,name')));
		
	$this->paginate	= array('order'=>'name ASC','limit'=>'10');
	$categoryLists =$this->paginate('ProjectImageCategory');
	$this->set('categoryLists', $categoryLists);
	$this->set('total', $this->ProjectImageCategory->find('count'));
		
		
	}
	
	


	
	// add Email template 
	
	public function  sendmail() {
		
	//	$this->set('emailCategory', $this->EmailCategory->find('list',array('conditions'=>array('EmailCategory.enable'=>'1'),'fields'=>'id,name')));
		
		$success = __('Email has been sent successfully ');
		$error = __('You cannot add this categories');
		
		$this->set('emailCategory',$this->EmailTemplate->find('list',array('fields'=>'EmailTemplate.id,EmailTemplate.template_name')));
		
		if($this->request->isPost())
		{
		
			$this->EmailTemplate->set($this->request->data['MassEmails']);
			if(!$this->EmailTemplate->massemailValidate()) // checking validation
			{ 
				$errorsArr = $this->EmailTemplate->validationErrors;	
			}
			else
			{ 
				$mailtocategory = $this->request->data['MassEmails']['mailto_category'];
			
				switch($mailtocategory)
				{
						case 'users':
							  $allMail = $this->User->find('all',array('conditions'=>'User.active=1','fields'=>'User.email'));
							  $results = Set::extract('/User/email', $allMail);
							   break;
						case 'brokers':
							 $allMail = $this->Broker->find('all',array('conditions'=>'Broker.active=1','fields'=>'Broker.email'));
							 $results = Set::extract('/Broker/email', $allMail);
							 break;	
						case 'vendors':
							 $allMail = $this->Vendor->find('all',array('conditions'=>'Vendor.active=1','fields'=>'Vendor.email'));
							 $results = Set::extract('/Vendor/email', $allMail);
							 break;
						case 'marketing':
							 $allMail = $this->Marketing->find('all',array('fields'=>'Marketing.email_id'));
							 $results = Set::extract('/Marketing/email_id', $allMail);
							 break;
						case 'leads':
							 $allMail = $this->Lead->find('all',array('fields'=>'Lead.email_id'));
							 $results = Set::extract('/Lead/email_id', $allMail);
							 break;
						case 'customers':
							 $allMail = $this->Customer->find('all',array('fields'=>'User.email'));
							 $results = Set::extract('/User/email', $allMail);
							 break;	 
						case 'default':
							$error = __('You cannot select mail to category');
							$this->Session->setFlash($error, 'Dialogs/enotify/growl/top_right', array('type'=>'error'), 'top_right');
							$this->redirect('/MassEmails/sendmail');
							break;
					}	
					
					
							 if(isset($results))
							 {
								 $subject = $this->request->data['MassEmails']['subject'];
								 $message = $this->request->data['MassEmails']['message'];
								 
								  foreach($results as $result)
								  {
									 if(Validate::email($result)) 
									$email1 = new CakeEmail();
									$email1->from(EMAIL_FROM_ADDRESS);	
									$email1->to($result);
									$email1->subject($subject);
									$email1->emailFormat('html');
									$body1=$message;
									$email1->send($body1);
								 
								 }
								
							 }
			
			
			
			
			
			
				$this->Session->setFlash($success, 'Dialogs/enotify/growl/top_right', array('type'=>'success'), 'top_right');
				$this->redirect('/MassEmails/sendmail');
				
			}
			
		}
	}
	
	public function gettemplate(){
		$this->autoRender = false;
		$email_template_id = $this->request->data['email_template_id'];
			if(isset($email_template_id))
			{
			 $templateDt = $this->EmailTemplate->find('first',array('conditions'=>array('EmailTemplate.id'=>$email_template_id)));
			return	$templateDt['EmailTemplate']['message'];die;
			}
		
		}
	
	
	// add Email template 
	
	public function  editEmailTemplate($Id = null) {
		
		$this->set('emailCategory', $this->EmailCategory->find('list',array('conditions'=>array('EmailCategory.enable'=>'1'),'fields'=>'id,name')));
		
		$success = __('Email template updated successfully ');
		$error = __('You cannot add this categories');
		
		
		if($this->request->isPost())
		{
			$this->EmailTemplate->set($this->request->data);
			if(!$this->EmailTemplate->emailtemplateValidate()) // checking validation
			{ 
				$errorsArr = $this->EmailTemplate->validationErrors;	
			}
			else
			{
				$this->EmailTemplate->save($this->request->data,false);
				$this->Session->setFlash($success, 'Dialogs/enotify/growl/top_right', array('type'=>'success'), 'top_right');
				$this->redirect('/EmailTemplates/allEmailTemplate');
				
			}
			
		}
		
		$this->request->data=$this->EmailTemplate->find('first',array('conditions'=>array('EmailTemplate.id'=> $Id ))); // set data for edit
	
		
	}
	
	// all project images listing 
	public function allProjectImage() {
		
		$this->set('tableName','Email Template Listing');
		$this->paginate	= array('order'=>'name ASC','limit'=>'10');
		$emailTemplateLists =$this->paginate('EmailTemplate');
		$this->set('emailTemplateLists', $emailTemplateLists);
		$this->set('total', $this->EmailTemplate->find('count'));
		
		}
	

		
	// delete  email template	
	public function deleteEmailTemplate($Id = null) {
		$success = __('Email Template is successfully deleted');
		$error = __('You cannot delete this Category');
		if (!empty($Id)) {
			
		//	if ($this->request -> isPost()) {
			// unlink image code
				if ($this->EmailTemplate->delete($Id, false)) {
					$this->Session->setFlash($success, 'Dialogs/enotify/growl/top_right', array('type'=>'success'), 'top_right');
				}
		//	}
			$this->redirect('/EmailTemplates/allEmailTemplate');
		} else {
			$this->redirect('/EmailTemplates/allEmailTemplate');
		}
	}	
	
	
	
}
<?php
/*
	 * Used to display all Category ( Project Management Section )
	 *  Created by : 
*/

App::uses('AppController', 'Controller');

class EmailTemplatesController extends AppController {
	public $theme = 'Admin';
	
	
	/**
	 * This controller uses following models
	 *
	 * @var array
	 */
	public $name = 'EmailTemplates'; 
	public $helpers = array('Js','Html','Javascript','Text','Paginator','Ajax','Tinymce');
	public $uses = array('ProjectImageCategory','EmailTemplate','EmailCategory');
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
	
	
	// add project category and sub category
	public function addCategory() {
		$success = __('Add Category is successfully ');
		$error = __('You cannot add this categories');
		
		if($this->request->data['ProjectImage']['parent_id'])
		$this->request->data['parent_id']=$this->request->data['ProjectImage']['parent_id'];
		$this->ProjectImageCategory->set($this->data);
		if($this->request->isPost())
		{
			$this->ProjectImageCategory->save($this->request->data,false);
			$this->Session->setFlash($success, 'Dialogs/enotify/growl/top_right', array('type'=>'success'), 'top_right');
			$this->redirect('/ProjectImages/imageCategory');
		}
		
		
	}
	// edit project category and sub category
		function editImageCategory($Id = null) {
		$success = __('Category is successfully updated');
		$error = __('You cannot delete this Category');
		
		$this->set('mainCategory', $this->ProjectImageCategory->find('list',array('conditions'=>array('ProjectImageCategory.parent_id'=>'0'),'fields'=>'id,name')));
		$this->set('detailCategory', $this->ProjectImageCategory->find('first',array('conditions'=>array('ProjectImageCategory.id'=>$Id))));
		
		if($this->request->isPost())
		{	
			$this->request->data['parent_id']=$this->request->data['ProjectImages']['parent_id'];
			$this->ProjectImageCategory->save($this->request->data,false);
			$this->Session->setFlash($success, 'Dialogs/enotify/growl/top_right', array('type'=>'success'), 'top_right');
			$this->redirect('/ProjectImages/imageCategory');
		}
		
		
	}
	
	// detele project category
		function deleteCategory($Id = null) {
		$success = __('Category is successfully deleted');
		$error = __('You cannot delete this Category');
		if (!empty($Id)) {
			
		//	if ($this->request -> isPost()) {
				if ($this->ProjectImageCategory->delete($Id, false)) {
					$this->Session->setFlash($success, 'Dialogs/enotify/growl/top_right', array('type'=>'success'), 'top_right');
				}
		//	}
			$this->redirect('/ProjectImages/imageCategory');
		} else {
			$this->redirect('/ProjectImages/imageCategory');
		}
	}
	
	// add Email template 
	
	public function  addEmailTemplate() {
		
		$this->set('emailCategory', $this->EmailCategory->find('list',array('conditions'=>array('EmailCategory.enable'=>'1'),'fields'=>'id,name')));
		
		$success = __('Add Email template successfully ');
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
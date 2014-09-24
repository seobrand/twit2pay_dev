<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class StaticPagesController extends AppController {
	public $theme = 'Admin';

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'StaticPages';
	public $helpers = array('Js','Html','Javascript','Text','Paginator','Ajax');
	public $uses = array('StaticPage');
	public $components = array('RequestHandler','common');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}
	
	public function allPage() {
		
				$this->paginate	= array('order'=>'StaticPage.id desc','limit'=>'15'); 
			$pageList =$this->paginate('StaticPage');
			$this->set('pageList', $pageList);
			$this->set('totalRecords', $this->StaticPage->find('count'));

	}
	
	public function addPage()  // action to add new News
	{
		$success = __('Page has been add successfully');
		$error = __('<span style="color:red">Please fill all mendatory fields</span>');
	
		if($this->request->data) /// check form submition
		{
			if($this->request->is('post'))  // new job entry
			{
					$this->StaticPage->set($this->request->data);
			
					if(!$this->StaticPage->PageValidation()) // checking validation
					{
						$errorsArr = $this->StaticPage->validationErrors;
						$this->Session->setFlash($error, 'Dialogs/enotify/growl/top_right', array('type'=>'error'), 'top_right');
					}
					else
					{	
						$this->request->data['StaticPage']['active'] = '1';
						$this->Session->setFlash($success, 'Dialogs/enotify/growl/top_right', array('type'=>'success'), 'top_right');
						$this->StaticPage->saveAll($this->request->data);
						$this->redirect(array('controller'=>'StaticPages','action'=>'allPage'));
					}
			}
		}
		
	}
	
		public function editPage($pageId = null)  // action to add new News
	{
		$success = __('Page has been edit successfully');
		$error = __('<span style="color:red">Please fill all mendatory fields</span>');
	//	$this->StaticPage->id = $pageId;
	
		if($this->request->data) /// check form submition
		{
			if($this->request->is('post'))  // new job entry
			{
					$this->StaticPage->set($this->request->data);
			
					if(!$this->StaticPage->PageValidation()) // checking validation
					{
						$errorsArr = $this->StaticPage->validationErrors;
						$this->Session->setFlash($error, 'Dialogs/enotify/growl/top_right', array('type'=>'error'), 'top_right');
					}
					else
					{	
						$this->request->data['StaticPage']['active'] = '1';
						$this->Session->setFlash($success, 'Dialogs/enotify/growl/top_right', array('type'=>'success'), 'top_right');
						$this->StaticPage->saveAll($this->request->data);
						$this->redirect(array('controller'=>'StaticPages','action'=>'allPage'));
					}
			}
		}
		
		$this->request->data=$this->StaticPage->find('first',array('conditions'=>array('StaticPage.id'=>$pageId))); // set data for edit 
		
	}
	
		public function deletePage($Id=NULL)   // action for delete Skill 
	{
			$success = __('Page is successfully deleted');
			$error = __('You cannot delete this Page');
		
			if (!empty($Id)) {
				if ($this->StaticPage->delete($Id, false)) {
					$this->Session->setFlash($success, 'Dialogs/enotify/growl/top_right', array('type'=>'success'), 'top_right');
				}
	
			$this->redirect(array('controller'=>'StaticPages','action'=>'allPage'));
			} else 
			{
				$this->redirect(array('controller'=>'StaticPages','action'=>'allPage'));
			}
	}
	
		public function detail($pageId=NULL)   // action for delete Skill 
		{	
		$this->set('meta_title','Detail');
		$this->theme = 'Front';
		$this->layout = 'front';
		
		if(isset($pageId))
		$pageDatail=$this->StaticPage->find('first',array('conditions'=>array('StaticPage.id'=>$pageId)));
	
		$pageDatail['StaticPage']['description']=str_replace('../../app/webroot/uploaded/',FULL_BASE_URL.router::url('/').'uploaded/',$pageDatail['StaticPage']['description']);
		$this->set('meta_title',$pageDatail['StaticPage']['meta_title']);
		$this->set('meta_tags',$pageDatail['StaticPage']['meta_keyword']);
		$this->set('meta_description',$pageDatail['StaticPage']['meta_description']);
		
		$this->set('pageDatail',$pageDatail);
		}
	
	
	
	
}

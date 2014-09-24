<?php
/*
	 * Used to mange all human resource data
	 *  Created by : Pushkar Soni
*/

App::uses('AppController', 'Controller');

class HomesController extends AppController {
	public $theme = 'Front';
	public $layout = 'front';

	public $name = 'Homes'; 
	public $helpers = array('Js','Html','Javascript','Text','Paginator','Ajax');
	public $uses = array('Page');
	public $components = array('RequestHandler','common');
	
		
	public function index(){   // function for admin job list
		
		if($user = Configure::read('User')){
		
			if(!empty($user['User']['reg_step'])){
				$this->redirect(unserialize($user['User']['reg_step']));
			}
			else{
				$this->redirect(array('controller' => 'admin', 'action' => 'myprofile'));
			}
		}
		else{
			$this->set('meta_title','Home');
			$this->set('meta_tags','');
			$this->set('meta_description','');
		}
		
	}
	
	public function contactUs() {
		$this->set('meta_title','Locate us');
		$this->set('meta_tags','');
		$this->set('meta_description','');

	}
	
	public function sitemap() {
		
	}
	
	
	
	function beforeFilter(){ 
		 parent::beforeFilter();
	}
	
	function beforeRender(){
	    parent::beforeRender();
	}   
	
		
}
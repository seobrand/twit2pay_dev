<?php

App::uses('AppModel', 'Model');

class StaticPage extends AppModel 
{
	var $useTable  = 'static_pages';
	
	function PageValidation() {  // checking a validation for news
		$validate1 = array(
			'page_title'=> array(
							'mustNotEmpty'=>array(
							'rule' => 'notEmpty',
							'message'=> 'Please enter page title')
							),
			'description'=> array(
							'mustNotEmpty'=>array(
							'rule' => 'notEmpty',
							'message'=> 'Please enter description')
							)		
			);
			$this->validate=$validate1;
			return $this->validates();
	}
	
	function checkfile()
	   {	
	   	if($this->data['Banner']['banner_image']['name'])
		{
			return true;
		}
			return false;
	   }
		 function checkSize(){
		 $size=$this->data['Banner']['banner_image']['size'];
			if($size > 12000000){
				return false;
			}
			return true;
		}
}
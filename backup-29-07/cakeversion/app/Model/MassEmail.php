<?php
App::uses('AppModel', 'Model');

class MassEmail extends AppModel {
	var $name="MassEmail";
	/*var $hasMany = array(    
	'ProjectImage' => array( 
	'className'     => 'ProjectImage',
	'foreignKey'    => 'project_id'
		   )    );  */
	
	function emailtemplateValidate() {
		
	
		$validate1 = array(
			'email_category_id'=> array(
						'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please select email template')
						),	
			'message'=> array(
						'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> 'Please enter email message')
						),		
			'subject' => array(
				'rule' => 'notEmpty',
				'message' => 'Please enter subject'
				),
			'mailto_category' => array(
					'rule' => 'notEmpty',
					'message' => 'Please select mail category'			
				)
			
			);
			
			$this->validate=$validate1;
			return $this->validates();
	}
	



}
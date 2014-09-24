<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
*/
class AppController extends Controller
{
	var $helpers = array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth','CakeGrid.Grid','Ajax');
	public $components = array('Session','RequestHandler', 'Usermgmt.UserAuth','common');
	function beforeFilter(){
		$this->set('common',$this->common);
		$this->userAuth();
	}
	
	private function userAuth(){
		$this->UserAuth->beforeFilter($this);
	}
	
	function beforeRender() {
		$this->_setErrorLayout();
		
	}
	
	function _setErrorLayout()
	{
		if ($this->name == 'CakeError') 
		{
			if($this->params->prefix=='admin')
			{
				$this->layout = 'admin-eror';
			}else
			{ 
				$this->theme = 'Front';
				$this->layout = 'error';
			}
		}
	}
	/* Download function path if folder any folder in img path */
	function downloadFile($folder,$fielname)	{
		$this->autoLayout = false;
		$newFileName = $fielname;
		$folder = str_replace('-','/',$folder);
		//Replace - to / to view subfolder
	    $path =  WWW_ROOT.$folder.'/'.$fielname;
		if(file_exists($path) && is_file($path)) {	
			$mimeContentType = 'application/octet-stream';
			$temMimeContentType = $this->_getMimeType($path); 
			if(isset($temMimeContentType)  && !empty($temMimeContentType))	{ 
							$mimeContentType = $temMimeContentType;
			}
	
			// START ANDR SILVA DOWNLOAD CODE
			// required for IE, otherwise Content-disposition is ignored
			if(ini_get('zlib.output_compression'))
			  	ini_set('zlib.output_compression', 'Off');
			header("Pragma: public"); // required
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Cache-Control: private",false); // required for certain browsers 
			header("Content-Type: " . $mimeContentType );
			// change, added quotes to allow spaces in filenames, by Rajkumar Singh
			header("Content-Disposition: attachment; filename=\"".(is_null($newFileName)?basename($path):$newFileName)."\";" );
			header("Content-Transfer-Encoding: binary");
			header("Content-Length: ".filesize($path));
			readfile($path);
			exit();
			// END ANDR SILVA DOWNLOAD CODE												
		 }
		 if(isset($_SERVER['HTTP_REFERER'])) {
		 	 $this->Session->setFlash('File not found.');
			 $this->redirect($_SERVER['HTTP_REFERER']);
		 }	 
 	}
	
	function _getMimeType($filepath) {
		ob_start();
		system("file -i -b {$filepath}");
		$output = ob_get_clean();
		$output = explode("; ",$output);
		if ( is_array($output) ) {
			$output = $output[0];
		}
		return $output;
	}	
	
}

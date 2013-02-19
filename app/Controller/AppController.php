<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {
	var $helpers = array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth');
	
	public $components = array('DebugKit.Toolbar','Session','RequestHandler', 'Usermgmt.UserAuth');
	
	function beforeFilter(){
		$this->userAuth();
		
		if ( $this->RequestHandler->isAjax() ) {
			Configure::write('debug',0);
		}
	}
	
	private function userAuth(){
		$this->UserAuth->beforeFilter($this);
	}
	
}

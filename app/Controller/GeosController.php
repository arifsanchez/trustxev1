<?php
App::uses('AppController', 'Controller');
App::uses('HttpSocket', 'Network/Http');


class GeosController extends AppController {



	public function checkip(){
		 $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		 $HttpSocket = new HttpSocket();
		 $results = $HttpSocket->post('http://api.ipinfodb.com/v3/ip-country/',array(
			   'key'			=>'b3305824775cffe95f11e87bad777ca407f1cb113fee069461b2bcf62cee0de5',
			   'ip'				=>$ip,
			   'format'		=>'json',
			   ));  
		
		debug($results);die();
	
	}


}


?>
<?php
App::uses('AppController', 'Controller');



class GeosController extends AppController {



	public function checkip(){
	
	$ip= ip2long($_SERVER['REMOTE_ADDR']);
	$condition=array('Geo.a3 <=' =>$ip,'Geo.a4 >='=>$ip);
	$a= $this->Geo->find('list', array(
			'conditions' => array($condition),
			'fields' => array('name')
		)); 
		debug($a);die();
	
	}


}


?>
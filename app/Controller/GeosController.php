<?php
App::uses('AppController', 'Controller');
App::uses('HttpSocket', 'Network/Http');


class GeosController extends AppController {



	public function checkip(){
		
		$HttpSocket = new HttpSocket();		
		$ipla = getenv('HTTP_X_FORWARDED_FOR');
		debug($ipla);
		$results = $HttpSocket->post('http://api.ipinfodb.com/v3/ip-country/?key=b3305824775cffe95f11e87bad777ca407f1cb113fee069461b2bcf62cee0de5&ip='.$ipla.'&format=json');
		$a = json_decode($results,true);
		
			foreach($a as $ip):
			 debug ($ip['countryName']) ;
			
			endforeach;
			
		debug($a);die();
	
	}

 
}


?>
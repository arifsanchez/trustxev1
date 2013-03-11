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
		
			$b = $a['countryName'];
			debug($b);
			
			
			
		debug($a);die();
	
	}

	public function crl()
  {
	  $ch = curl_init('http://rss.news.yahoo.com/rss/oddlyenough');

	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($ch, CURLOPT_HEADER, 0);

	  $xml = simplexml_load_string(curl_exec($ch));

	  curl_close($ch);

	 debug ($xml);die();
  }
  
}


?>
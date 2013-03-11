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
	  /*$ch = curl_init('http://rss.news.yahoo.com/rss/oddlyenough');

	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($ch, CURLOPT_HEADER, 0);

	  $xml = simplexml_load_string(curl_exec($ch));

	  curl_close($ch);

	 debug ($xml);die();*/
	 
			
		 $url = "http://rss.news.yahoo.com/rss/oddlyenough";
		$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.9.0.5) Gecko/2008120122 Firefox/3.0.5";
        $curl_thing = curl_init();
        curl_setopt($curl_thing, CURLOPT_URL, $url);
        curl_setopt($curl_thing, CURLOPT_HEADER, 0);
        curl_setopt($curl_thing, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_thing, CURLOPT_USERAGENT, $agent);
        $curl_result = curl_exec($curl_thing);
        curl_close($curl_thing);

        debug( $curl_result);die();
  }
  
}


?>
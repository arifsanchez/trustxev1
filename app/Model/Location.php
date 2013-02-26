 <?php 

class Location extends AppModel {

    var $name = 'Location';

    var $actsAs = array('Geocoded' => array(
        'key' => 'AIzaSyDiZcpVbB8qd5FLmdz_mm6fFnuI5KIYRBk'
    ));
	
	 function beforeSave() {
        if ($coords = $this->geocode($this->data)) {
            $this->set($coords);
        }
        return true;
    } 
}

?> 
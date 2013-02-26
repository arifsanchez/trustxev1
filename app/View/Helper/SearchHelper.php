<?php

App::uses('AppHelper', 'View/Helper');

class SearchHelper extends AppHelper {
	var $_view = null;

	function __construct(View $view, $settings = array()) {
		$this->_view = $view;
	}

	function searchForm($modelName, $options) {
		$view =& $this->_view;
		$output = $view->element('search_form',array('plugin' => 'Usermgmt', 'modelName' => $modelName, 'options' => $options), array('plugin' => 'Usermgmt'));
		return $output;
	}
}

?>
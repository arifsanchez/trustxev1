<?php
/*

Cakephp 2.x User Management Premium Version (a product of Ekta Softwares)
Ekta Softwares is a division of Ektanjali Softwares Pvt Ltd
Website- http://EktaSoftwares.com
Plugin Demo- http://umpremium.ektasoftwares.com
Author- Chetan Varshney (The Director of Ektanjali Softwares Pvt Ltd)
Plugin Copyright No- 11498/2012-CO/L

UMPremium is a copyrighted work of authorship. Chetan Varshney retains ownership of the product and any copies of it, regardless of the form in which the copies may exist. This license is not a sale of the original product or any copies.

By installing and using UMPremium on your server, you agree to the following terms and conditions. Such agreement is either on your own behalf or on behalf of any corporate entity which employs you or which you represent ('Corporate Licensee'). In this Agreement, 'you' includes both the reader and any Corporate Licensee and Chetan Varshney.

The Product is licensed only to you. You may not rent, lease, sublicense, sell, assign, pledge, transfer or otherwise dispose of the Product in any form, on
a temporary or permanent basis, without the prior written consent of Chetan Varshney.

The Product source code may be altered (at your risk)

All Product copyright notices within the scripts must remain unchanged (and visible).

If any of the terms of this Agreement are violated, Chetan Varshney reserves the right to action against you.

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Product.

THE PRODUCT IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE PRODUCT OR THE USE OR OTHER DEALINGS IN THE PRODUCT.

*/
App::uses('AppHelper', 'View/Helper');
class TinymceHelper extends AppHelper {

	// Take advantage of other helpers
	public $helpers = array('Js', 'Html', 'Form');

	// Check if the tiny_mce.js file has been added or not
	public $_script = false;

	/**
	* Adds the tiny_mce.js file and constructs the options
	*
	* @param string $fieldName Name of a field, like this "Modelname.fieldname"
	* @param array $tinyoptions Array of TinyMCE attributes for this textarea
	* @return string JavaScript code to initialise the TinyMCE area
	*/
	function _build($fieldName, $tinyoptions = array()){
		if(!$this->_script){
			// We don't want to add this every time, it's only needed once
			$this->_script = true;
			$this->Html->script('tiny_mce/tiny_mce', array('inline' => false));
		}

		// Ties the options to the field
		$tinyoptions['mode'] = 'exact';
		$tinyoptions['elements'] = $this->domId($fieldName);

		// List the keys having a function
		$value_arr = array();
		$replace_keys = array();
		foreach($tinyoptions as $key => &$value){
			// Checks if the value starts with 'function ('
			if(strpos($value, 'function(') === 0){
				$value_arr[] = $value;
				$value = '%' . $key . '%';
				$replace_keys[] = '"' . $value . '"';
			}
		}

		// Encode the array in json
		$json = $this->Js->object($tinyoptions);

		// Replace the functions
		$json = str_replace($replace_keys, $value_arr, $json);
		$this->Html->scriptStart(array('inline' => false));
		echo 'tinyMCE.init(' . $json . ');';
		$this->Html->scriptEnd();
	}

	/**
	* Creates a TinyMCE textarea.
	*
	* @param string $fieldName Name of a field, like this "Modelname.fieldname"
	* @param array $options Array of HTML attributes.
	* @param array $tinyoptions Array of TinyMCE attributes for this textarea
	* @param string $preset
	* @return string An HTML textarea element with TinyMCE
	*/
	function textarea($fieldName, $options = array(), $tinyoptions = array(), $preset = null){
		// If a preset is defined
		if(!empty($preset)){
			$preset_options = $this->preset($preset);

			// If $preset_options && $tinyoptions are an array
			if(is_array($preset_options) && is_array($tinyoptions)){
				$tinyoptions = array_merge($preset_options, $tinyoptions);
			}else{
				$tinyoptions = $preset_options;
			}
		}
		return $this->Form->textarea($fieldName, $options) . $this->_build($fieldName, $tinyoptions);
	}

	/**
	* Creates a TinyMCE textarea.
	*
	* @param string $fieldName Name of a field, like this "Modelname.fieldname"
	* @param array $options Array of HTML attributes.
	* @param array $tinyoptions Array of TinyMCE attributes for this textarea
	* @return string An HTML textarea element with TinyMCE
	*/
	function input($fieldName, $options = array(), $tinyoptions = array(), $preset = null){
		// If a preset is defined
		if(!empty($preset)){
			$preset_options = $this->preset($preset);

			// If $preset_options && $tinyoptions are an array
			if(is_array($preset_options) && is_array($tinyoptions)){
				$tinyoptions = array_merge($preset_options, $tinyoptions);
			}else{
				$tinyoptions = $preset_options;
			}
		}
		$options['type'] = 'textarea';
		return $this->Form->input($fieldName, $options) . $this->_build($fieldName, $tinyoptions);
	}

	/**
	* Creates a preset for TinyOptions
	*
	* @param string $name
	* @return array
	*/
	private function preset($name){
		// Full Feature
		if($name == 'full'){
			return array(
				'theme' => 'advanced',
				'plugins' => 'safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,spellchecker',
				'theme_advanced_buttons1' => 'save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect',
				'theme_advanced_buttons2' => 'cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor',
				'theme_advanced_buttons3' => 'tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen',
				'theme_advanced_buttons4' => 'insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,spellchecker',
				'theme_advanced_toolbar_location' => 'top',
				'theme_advanced_toolbar_align' => 'left',
				'theme_advanced_statusbar_location' => 'bottom',
				'theme_advanced_resizing' => true,
				'theme_advanced_resize_horizontal' => false,
				'convert_fonts_to_spans' => true,
				'file_browser_callback' => 'ckfinder_for_tiny_mce'
			);
		}

		// Basic
		if($name == 'basic'){
			return array(
				'theme' => 'advanced',
				'plugins' => 'safari,advlink,paste,spellchecker',
				'theme_advanced_buttons1' => 'code,|,copy,pastetext,|,bold,italic,underline,|,link,unlink,|,bullist,numlist,spellchecker',
				'theme_advanced_buttons2' => '',
				'theme_advanced_buttons3' => '',
				'theme_advanced_toolbar_location' => 'top',
				'theme_advanced_toolbar_align' => 'center',
				'theme_advanced_statusbar_location' => 'none',
				'theme_advanced_resizing' => false,
				'theme_advanced_resize_horizontal' => false,
				'convert_fonts_to_spans' => false
			);
		}

		// Simple
		if($name == 'simple'){
			return array(
				'theme' => 'simple',
			);
		}

		// UMCode
		if($name == 'umcode'){
			return array(
				'theme' => 'advanced',
				'plugins' => 'safari,layer,table,preview,paste,fullscreen,spellchecker',
				'theme_advanced_buttons1' => 'cut,copy,paste,pastetext,pasteword,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,undo,redo,|,link,unlink,fullscreen',
				'theme_advanced_buttons2' => 'formatselect,fontselect,fontsizeselect,|,image,cleanup,code,|,preview,|,forecolor,backcolor,sub,sup',
				'theme_advanced_buttons3' => 'tablecontrols,|,hr,removeformat,charmap,spellchecker',
				'theme_advanced_toolbar_location' => 'top',
				'theme_advanced_toolbar_align' => 'left',
				'theme_advanced_statusbar_location' => 'bottom',
				'theme_advanced_resizing' => true,
				'theme_advanced_resize_horizontal' => false,
				'convert_fonts_to_spans' => true,
				'file_browser_callback' => 'ckfinder_for_tiny_mce'
			);
		}
		return null;
	}
}
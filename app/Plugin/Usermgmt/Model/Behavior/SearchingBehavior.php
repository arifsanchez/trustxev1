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

App::uses('Sanitize', 'Utility');

class SearchingBehavior extends ModelBehavior {

	var $_searchValues = array();
	var $mapMethods = array('/setSearchValues/' => '_setSearchValues');

	function setup(Model $Model, $settings = array()) {
		foreach ($settings as $key => $value) {
			if (!is_array($value)) {
				$key = $value;
				$value = array();
			}
			$this->settings[$Model->alias][$key] = array_merge(array('type' => 'text','condition' => 'like','selectOptions' => array()),$value);
		}
		$this->_searchValues[$Model->alias] = array();
	}

	function beforeFind(Model $Model, $query) {
		if (isset($query['nosearch']) && $query['nosearch'] === true) {
			return $query;
		}
		if (method_exists($Model, 'beforeDataSearch')) {
			$callbackOptions['values'] = $this->_searchValues[$Model->alias];
			$callbackOptions['settings'] = $this->settings[$Model->alias];

			if (!$Model->beforeDataSearch($query, $callbackOptions)) {
				return $query;
			}
		}
		if (!isset($this->settings[$Model->alias])) {
			return $query;
		}
		$settings = $this->settings[$Model->alias];
		$values = $this->_searchValues[$Model->alias];
		if (isset($_POST['data']['search_clear']) && $_POST['data']['search_clear']==1) {
			return $query;
		}
		foreach ($settings as $field => $options) {
			$fieldModelName = $Model->alias;
			$fieldName = $field;
			if (strpos($field, '.') !== false) {
				list($fieldModelName, $fieldName) = explode('.', $field);
			}
			if (!isset($values[$fieldModelName][$fieldName]) && isset($options['default'])) {
				$values[$fieldModelName][$fieldName] = $options['default'];
			}
			if (!isset($values[$fieldModelName][$fieldName]) || is_null($values[$fieldModelName][$fieldName])) {
				// no value to search with, just skip this field
				continue;
			}
			$searchByField = $fieldName;
			$searchByModel = $fieldModelName;
			if (isset($options['searchField'])) {
				if (strpos($options['searchField'], '.') !== false) {
					list($tmpFieldModel, $tmpFieldName) = explode('.', $options['searchField']);
					$searchByField = $tmpFieldName;
				} else {
					$searchByField = $options['searchField'];
				}
			}
			$realSearchField = sprintf('%s.%s', $searchByModel, $searchByField);
			// TODO: handle NULLs?
			switch ($options['type']) {
				case 'text':
					if (strlen(trim(strval($values[$fieldModelName][$fieldName]))) == 0) {
						continue;
					}
					switch ($options['condition']) {
						case 'like':
						case 'contains':
							$query['conditions'][$realSearchField.' like'] = '%'.$values[$fieldModelName][$fieldName].'%';
							break;
						case 'startswith':
							$query['conditions'][$realSearchField.' like'] = $values[$fieldModelName][$fieldName].'%';
							break;
						case 'endswith':
							$query['conditions'][$realSearchField.' like'] = '%'.$values[$fieldModelName][$fieldName];
							break;
						case '=':
							$query['conditions'][$realSearchField] = $values[$fieldModelName][$fieldName];
							break;
						case 'comma':
							$query['conditions']['OR']=array(array($realSearchField=>$values[$fieldModelName][$fieldName]),array($realSearchField.' like'=>$values[$fieldModelName][$fieldName].',%'),array($realSearchField.' like'=>'%,'.$values[$fieldModelName][$fieldName].',%'),array($realSearchField.' like'=>'%,'.$values[$fieldModelName][$fieldName]));
							break;
						default:
							$query['conditions'][$realSearchField.' '.$options['condition']] = $values[$fieldModelName][$fieldName];
							break;
					}
					break;
				case 'select':
					if (strlen(trim(strval($values[$fieldModelName][$fieldName]))) == 0) {
						continue;
					}
					switch ($options['condition']) {
						case 'comma':
							$query['conditions']['OR']=array(array($realSearchField=>$values[$fieldModelName][$fieldName]),array($realSearchField.' like'=>$values[$fieldModelName][$fieldName].',%'),array($realSearchField.' like'=>'%,'.$values[$fieldModelName][$fieldName].',%'),array($realSearchField.' like'=>'%,'.$values[$fieldModelName][$fieldName]));
							break;
						default:
							$query['conditions'][$realSearchField] = $values[$fieldModelName][$fieldName];
							break;
					}
					break;
				case 'checkbox':
					$query['conditions'][$realSearchField] = $values[$fieldModelName][$fieldName];
					break;
			}
		}
		if (method_exists($Model, 'afterDataSearch')) {
			$callbackOptions['values'] = $this->_searchValues[$Model->alias];
			$callbackOptions['settings'] = $this->settings[$Model->alias];
			$result = $Model->afterDataSearch($query, $callbackOptions);
			if (is_array($result)) {
				$query = $result;
			}
		}
		return $query;
	}

	function _setSearchValues(&$Model, $method, $values = array()) {
		$values = Sanitize::clean($values, array(
											'connection' => $Model->useDbConfig,
											'odd_spaces' => false,
											'encode' => false,
											'dollar' => false,
											'carriage' => false,
											'unicode' => false,
											'escape' => true,
											'backslash' => false
										)
							);
		$this->_searchValues[$Model->alias] = array_merge($this->_searchValues[$Model->alias], $values);
	}
}
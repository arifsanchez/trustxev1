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

class ControllerListComponent extends Component {
	/**
	 * Used to get all controllers with all methods for permissions
	 *
	 * @access public
	 * @return array
	 */
	public function get() {
		$controllerClasses = App::objects('Controller');
		$superParentActions = get_class_methods('Controller');
		$parentActions = get_class_methods('AppController');
		$parentActionsDefined=$this->_removePrivateActions($parentActions);
		$parentActionsDefined = array_diff($parentActionsDefined, $superParentActions);
		$controllers= array();
		foreach ($controllerClasses as $controller) {
			$controllername=str_replace('Controller', '',$controller);
			$actions= $this->__getControllerMethods($controllername, $superParentActions, $parentActions);
			if (!empty($actions)) {
				$actions = array_values($actions);
				$controllers[$controllername] = $actions;
			}
		}
		$plugins = App::objects('plugins');
		foreach ($plugins as $p) {
			$pluginAppContMethods=array();
			$pluginControllerClasses = App::objects($p.'.Controller');
			foreach ($pluginControllerClasses as $controller) {
				if(strpos($controller,'AppController') !==false) {
					$controllername=str_replace('Controller', '',$controller);
					$pluginAppContMethods = $this->__getControllerMethods($controllername, $superParentActions, $parentActions, $p);
				}
			}
			foreach ($pluginControllerClasses as $controller) {
				$controllername=str_replace('Controller', '',$controller);
				$actions= $this->__getControllerMethods($controllername, $superParentActions, $parentActions, $p);
				if(strpos($controller,'AppController') ===false && is_array($actions)) {
					$actions =  array_diff($actions, $pluginAppContMethods);
				}
				if (!empty($actions)) {
					$actions = array_values($actions);
					$controllers[$controllername] = $actions;
				}
			}
		}
		return $controllers;
	}
	/**
	 * Used to delete private actions from list of controller's methods
	 *
	 * @access private
	 * @param array $actions Controller's action
	 * @return array
	 */
	private function _removePrivateActions($actions) {
		foreach ($actions as $k => $v) {
			if ($v{0} == '_') {
				unset($actions[$k]);
			}
		}
		return $actions;
	}
	/**
	 * Used to get methods of controller
	 *
	 * @access private
	 * @param string $controllername Controller name
	 * @param array $superParentActions Controller class methods
	 * @param array $parentActions App Controller class methods
	 * @param string $p plugin name
	 * @return array
	 */
	private function __getControllerMethods($controllername, $superParentActions, $parentActions, $p=null) {
		if (empty($p)) {
			App::import('Controller', $controllername);
		} else {
			App::import('Controller', $p.'.'.$controllername);
		}
		$actions = get_class_methods($controllername."Controller");
		if (!empty($actions)) {
			$actions=$this->_removePrivateActions($actions);
			$actions= ($controllername=='App') ? array_diff($actions, $superParentActions) : array_diff($actions, $parentActions);
		}
		return $actions;
	}
	/**
	 *  Used to get controller's list
	 *
	 * @access public
	 * @return array
	 */
	public function getControllers() {
		$controllerClasses = App::objects('Controller');
		foreach ($controllerClasses as $key=>$value) {
			$controllerClasses[$key]=str_replace('Controller', '',$value);
		}
		$controllerClasses[-2]="Select Controller";
		$controllerClasses[-1]="All";
		$plugins = App::objects('plugins');
		foreach ($plugins as $p) {
			$pluginControllerClasses = App::objects($p.'.Controller');
			foreach ($pluginControllerClasses as $controller) {
				$controllerClasses[]=str_replace('Controller', '',$controller);
			}
		}
		ksort($controllerClasses);
		return $controllerClasses;
	}
	/**
	 *  Used to get controllers with methods
	 *
	 * @access public
	 * @return array
	 */
	public function getControllerWithMethods() {
		$res1 = $this->get();
		$res2 = array();
		foreach($res1 as $key=>$value) {
			foreach($value as $ac) {
				$res2[]=$key.'/'.$ac;
			}
		}
		return $res2;
	}
}
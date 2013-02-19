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

App::uses('UserMgmtAppController', 'Usermgmt.Controller');
class UserGroupPermissionsController extends UserMgmtAppController {
	/**
	 * This controller uses following models
	 *
	 * @var array
	 */
	var $uses = array('Usermgmt.UserGroupPermission','Usermgmt.UserGroup');
	/**
	 * This controller uses following components
	 *
	 * @var array
	 */
	var $components=array('Usermgmt.ControllerList','RequestHandler');
	/**
	 * Called before the controller action.  You can use this method to configure and customize components
	 * or perform logic that needs to happen before each controller action.
	 *
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		if(isset($this->Security) &&  ($this->RequestHandler->isAjax() || $this->action == 'update')){
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
	}

	/**
	 * Used to display all permissions of site by Admin
	 *
	 * @access public
	 * @return array
	 */
	public function index() {
		$c=-2;
		if (isset($_GET['c']) && $_GET['c'] !='') {
			$c=$_GET['c'];
		}
		$this->set('c',$c);
		$allControllers=$this->ControllerList->getControllers();
		$this->set('allControllers',$allControllers);
		if ($c >-2) {
			$con=array();
			$conAll=$this->ControllerList->get();
			if ($c ==-1) {
				$con=$conAll;
				$user_group_permissions=$this->UserGroupPermission->find('all', array('order'=>array('controller', 'action')));
			} else {
				$user_group_permissions=$this->UserGroupPermission->find('all', array('order'=>array('controller', 'action'), 'conditions'=>array('controller'=>$allControllers[$c])));
				$con[$allControllers[$c]]= (isset($conAll[$allControllers[$c]])) ? $conAll[$allControllers[$c]] : array();
			}
			foreach ($user_group_permissions as $row) {
				$cont=$row['UserGroupPermission']['controller'];
				$act=$row['UserGroupPermission']['action'];
				$ugname=$row['UserGroup']['alias_name'];
				$allowed=$row['UserGroupPermission']['allowed'];
				$con[$cont][$act][$ugname]=$allowed;
			}
			$this->set('controllers',$con);
			$result=$this->UserGroup->getGroupNamesAndIds();
			$groups=array();
			$groups2=array();
			foreach ($result as $row) {
				$groups[]= $row['alias_name'];
			}
			$groups = implode(',', $groups);
			$this->set('user_groups',$result);
			$this->set('groups',$groups);
		}
	}
	/**
	 *  Used to update permissions of site using Ajax by Admin
	 *
	 * @access public
	 * @return integer
	 */
	public function update() {
		$this->autoRender = false;
		$controller=$this->params['data']['controller'];
		$action=$this->params['data']['action'];
		$result=$this->UserGroup->getGroupNamesAndIds();
		$success=0;
		foreach ($result as $row) {
			if (isset($this->params['data'][$row['alias_name']])) {
				$res=$this->UserGroupPermission->find('first',array('conditions' => array('controller'=>$controller,'action'=>$action,'user_group_id'=>$row['id'])));
				if (empty($res)) {
					$data=array();
					$data['UserGroupPermission']['user_group_id']=$row['id'];
					$data['UserGroupPermission']['controller']=$controller;
					$data['UserGroupPermission']['action']=$action;
					$data['UserGroupPermission']['allowed']=$this->params['data'][$row['alias_name']];
					$data['UserGroupPermission']['id']=null;
					$rtn=$this->UserGroupPermission->save($data);
					if ($rtn) {
						$success=1;
					}
				} else {
					if ($this->params['data'][$row['alias_name']] !=$res['UserGroupPermission']['allowed']) {
						$data=array();
						$data['UserGroupPermission']['allowed']=$this->params['data'][$row['alias_name']];
						$data['UserGroupPermission']['id']=$res['UserGroupPermission']['id'];
						$rtn=$this->UserGroupPermission->save($data);
						if ($rtn) {
							$success=1;
						}
					} else {
						 $success=1;
					}
				}
			}
		}
		echo $success;
		$this->__deleteCache();
	}
	/**
	 * Used to delete cache of permissions and used when any permission gets changed by Admin
	 *
	 * @access private
	 * @return void
	 */
	private function __deleteCache() {
		$iterator = new RecursiveDirectoryIterator(CACHE);
		foreach (new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::CHILD_FIRST) as $file) {
			$path_info = pathinfo($file);
			if ($path_info['dirname']==TMP."cache" && $path_info['basename']!='.svn') {
				if (!is_dir($file->getPathname())) {
					unlink($file->getPathname());
				}
			}
		}
	}
}
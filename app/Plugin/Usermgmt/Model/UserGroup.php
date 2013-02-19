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

App::uses('UserMgmtAppModel', 'Usermgmt.Model');
App::uses('CakeEmail', 'Network/Email');
class UserGroup extends UserMgmtAppModel {

	/**
	 * This model has following models
	 *
	 * @var array
	 */
	var $hasMany = array('Usermgmt.UserGroupPermission');
	/**
	 * model validation array
	 *
	 * @var array
	 */
	var $validate = array();
	/**
	 * model validation array
	 *
	 * @var array
	 */
	function addValidate() {
		$validate1 = array(
				'name'=> array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> __('Please enter group name'),
						'last'=>true),
					'mustAlphaNumeric'=>array(
						'rule' => 'alphaNumericDashUnderscoreSpace',
						'message'=> __('Group name must be alphaNumeric'),
						'last'=>true),
					'mustAlpha'=>array(
						'rule' => 'alpha',
						'message'=> __('Group name must contain any letter'),
						'last'=>true),
					'mustUnique'=>array(
						'rule' =>'isUnique',
						'message' =>__('This group name already added'),
						'on'=>'create',
						'last'=>true),
					),
				'alias_name'=> array(
					'mustNotEmpty'=>array(
						'rule' => 'notEmpty',
						'message'=> __('Please enter alias group name'),
						'last'=>true),
					'mustAlphaNumeric'=>array(
						'rule' => 'alphaNumericDashUnderscore',
						'message'=> __('Alias group name must be alphaNumeric'),
						'last'=>true),
					'mustAlpha'=>array(
						'rule' => 'alpha',
						'message'=> __('Alias group name must contain any letter'),
						'last'=>true),
					'mustUnique'=>array(
						'rule' =>'isUnique',
						'message' =>__('This alias group name already added'),
						'on'=>'create',
						'last'=>true),
					),
				);
		$this->validate=$validate1;
		return $this->validates();
	}
	/**
	 * Used to check permissions of group
	 *
	 * @access public
	 * @param string $controller controller name
	 * @param string $action action name
	 * @param integer $userGroupID group id
	 * @return boolean
	 */
	public function isUserGroupAccess($controller, $action, $userGroupID) {
		$includeGuestPermission=false;
		$userGroupIDArray= explode(',', $userGroupID);
		$userGroupIDArray = array_map('trim', $userGroupIDArray);
		if (!PERMISSIONS) {
			return true;
		}
		if (in_array(ADMIN_GROUP_ID, $userGroupIDArray) && !ADMIN_PERMISSIONS) {
			return true;
		}

		$permissions = $this->getPermissions($userGroupID,$includeGuestPermission);
		$access =str_replace(' ','',ucwords(str_replace('_',' ',$controller))).'/'.$action;
		if (in_array($access, $permissions)) {
			return true;
		}
		return false;
	}
	/**
	 * Used to check permissions of guest group
	 *
	 * @access public
	 * @param string $controller controller name
	 * @param string $action action name
	 * @return boolean
	 */
	public function isGuestAccess($controller, $action) {
		if (PERMISSIONS) {
			return $this->isUserGroupAccess($controller, $action, GUEST_GROUP_ID);
		} else {
			return true;
		}
	}
	/**
	 * Used to get permissions from cache or database of a group
	 *
	 * @access public
	 * @param integer $userGroupID group id
	 * @return array
	 */
	public function getPermissions($userGroupID) {
		$permissions = array();
		$userGroupIDCache = str_replace(',','-',$userGroupID);
		// using the cake cache to store rules
		$cacheKey = 'rules_for_group_'.$userGroupIDCache;
		$actions = Cache::read($cacheKey, 'UserMgmt');
		if ($actions === false) {
			$userGroupIDArray= explode(',', $userGroupID);
			$userGroupIDArray = array_map('trim', $userGroupIDArray);
			$actions = $this->UserGroupPermission->find('all',array('conditions'=>array('UserGroupPermission.user_group_id' => $userGroupIDArray, 'UserGroupPermission.allowed'=>1)));
			Cache::write($cacheKey, $actions, 'UserMgmt');
		}
		foreach ($actions as $action) {
			$permissions[] = $action['UserGroupPermission']['controller'].'/'.$action['UserGroupPermission']['action'];
		}
		$permissions = array_unique($permissions);
		return $permissions;
	}
	/**
	 * Used to get group names
	 *
	 * @access public
	 * @return array
	 */
	public function getGroupNames() {
		$this->unbindModel(array('hasMany' => array('UserGroupPermission')));
		$result=$this->find("all", array("order"=>"id"));
		$i=0;
		$user_groups=array();
		foreach ($result as $row) {
			$user_groups[$i]=$row['UserGroup']['name'];
			$i++;
		}
		return $user_groups;
	}
	/**
	 * Used to get group names with ids
	 *
	 * @access public
	 * @return array
	 */
	public function getGroupNamesAndIds() {
		$this->unbindModel(array('hasMany' => array('UserGroupPermission')));
		$result=$this->find("all", array("order"=>"id"));
		$i=0;
		foreach ($result as $row) {
			$data['id']=$row['UserGroup']['id'];
			$data['name']=$row['UserGroup']['name'];
			$data['alias_name']=$row['UserGroup']['alias_name'];
			$user_groups[$i]=$data;
			$i++;
		}
		return $user_groups;
	}
	/**
	 * Used to get group names with ids without guest group
	 *
	 * @access public
	 * @return array
	 */
	public function getGroups() {
		$this->unbindModel(array('hasMany' => array('UserGroupPermission')));
		$result=$this->find("all", array("order"=>"id", "conditions"=>array('name !='=>"Guest")));
		$user_groups=array();
		$user_groups['']=__('Select');
		foreach ($result as $row) {
			$user_groups[$row['UserGroup']['id']]=$row['UserGroup']['name'];
		}
		return $user_groups;
	}
	/**
	 * Used to get group names with ids for registration
	 *
	 * @access public
	 * @return array
	 */
	public function getGroupsForRegistration() {
		$this->unbindModel(array('hasMany' => array('UserGroupPermission')));
		$result=$this->find("all", array("order"=>"id", "conditions"=>array('allowRegistration'=>1)));
		$user_groups=array();
		$user_groups[0]=__('Select');
		foreach ($result as $row) {
			$user_groups[$row['UserGroup']['id']]=$row['UserGroup']['name'];
		}
		return $user_groups;
	}
	/**
	 * Used to check group is available for registration
	 *
	 * @access public
	 * @param integer $groupId group id
	 * @return boolean
	 */
	function isAllowedForRegistration($groupId) {
		$result=$this->findById($groupId);
		if (!empty($result)) {
			if($result['UserGroup']['allowRegistration']==1)
				return true;
		}
		return false;
	}
	/**
	 * Used to check user group by group id
	 *
	 * @access public
	 * @param integer $groupId group id
	 * @return string
	 */
	public function isValidUserId($groupId) {
		$res = $this->findById($groupId);
		if(!empty($res)) {
			return true;
		}
		return false;
	}
	/**
	 * Used to get group names by groupd ids
	 *
	 * @access public
	 * @return array
	 */
	public function getGroupsByIds($group_ids, $ruturn_array=false) {
		if(!is_array($group_ids)) {
			$group_ids = explode(',', $group_ids);
		}
		$this->unbindModel(array('hasMany' => array('UserGroupPermission')));
		$result=$this->find("all", array("order"=>"id", "conditions"=>array('id'=>$group_ids)));
		$user_groups=array();
		foreach ($result as $row) {
			$user_groups[$row['UserGroup']['id']]=$row['UserGroup']['name'];
		}
		if(!$ruturn_array) {
			$user_groups = implode(', ',$user_groups);
		}
		return $user_groups;
	}
}
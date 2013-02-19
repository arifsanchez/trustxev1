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
App::uses('CakeRoute', 'Routing/Route');
App::uses('Component', 'Controller');
class SlugRoute extends CakeRoute {
	function parse($url) {
		$params = parent::parse($url);
		if(isset($params['slug'])) {
			$username = $params['slug'];
			App::import("Component", "Usermgmt.ControllerList");
			$contList = new ControllerListComponent(new ComponentCollection());
			$conts = $contList->getControllers();
			unset($conts[-2]);
			unset($conts[-1]);
			$conts = array_map('strtolower', $conts);
			$usernameTmp =strtolower(str_replace(' ','',ucwords(str_replace('_',' ',$username))));
			if(!in_array($usernameTmp, $conts)) {
				$plugins = App::objects('plugins');
				$plugins = array_map('strtolower', $plugins);
				if(in_array($usernameTmp, $plugins)) {
					return false;
				}
				$customRoutes = Router::$routes;
				$usernameTmp ='/'.$username;
				foreach($customRoutes as $customRoute) {
					if(strpos(strtolower($customRoute->template),strtolower($usernameTmp)) !==false) {
						return false;
					}
				}

				App::import("Model", "Usermgmt.User");
				$userModel = new User;
				$isUser = $userModel->findByUsername($params['slug']);
				if ($isUser) {
					$params['pass'][0]=$params['slug'];
					return $params;
				}
			}
			return false;
		}
		return false;
	}
}
?>
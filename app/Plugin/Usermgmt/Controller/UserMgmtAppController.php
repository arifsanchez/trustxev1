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

class UserMgmtAppController extends AppController {
	/**
	 * This controller uses following components
	 *
	 * @var array
	 */
	public $components = array('Session', 'Security');
	/**
	 * Called before the controller action.  You can use this method to configure and customize components
	 * or perform logic that needs to happen before each controller action.
	 *
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();

		$this->Security->blackHoleCallback = 'handleBlackHole';

		if($this->Session->check('UserAuth.FacebookLogin')) {
			$this->Session->delete('UserAuth.FacebookLogin');
			if($this->Session->check('UserAuth.FacebookChangePass')) {
				$this->redirect('/changePassword');
			} else {
				$OriginAfterLogin=$this->Session->read('Usermgmt.OriginAfterLogin');
				$this->Session->delete('Usermgmt.OriginAfterLogin');
				$redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : LOGIN_REDIRECT_URL;
				$this->redirect($redirect);
			}
		}
		if($this->Session->check('UserAuth.TwitterLogin')) {
			$this->Session->delete('UserAuth.TwitterLogin');
			if($this->Session->check('UserAuth.TwitterChangePass')) {
				$this->redirect('/changePassword');
			} else {
				$OriginAfterLogin=$this->Session->read('Usermgmt.OriginAfterLogin');
				$this->Session->delete('Usermgmt.OriginAfterLogin');
				$redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : LOGIN_REDIRECT_URL;
				$this->redirect($redirect);
			}
		}
		if($this->Session->check('UserAuth.GmailLogin')) {
			$this->Session->delete('UserAuth.GmailLogin');
			if($this->Session->check('UserAuth.GmailChangePass')) {
				$this->redirect('/changePassword');
			} else {
				$OriginAfterLogin=$this->Session->read('Usermgmt.OriginAfterLogin');
				$this->Session->delete('Usermgmt.OriginAfterLogin');
				$redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : LOGIN_REDIRECT_URL;
				$this->redirect($redirect);
			}
		}
		if($this->Session->check('UserAuth.LinkedinLogin')) {
			$this->Session->delete('UserAuth.LinkedinLogin');
			if($this->Session->check('UserAuth.LinkedinChangePass')) {
				$this->redirect('/changePassword');
			} else {
				$OriginAfterLogin=$this->Session->read('Usermgmt.OriginAfterLogin');
				$this->Session->delete('Usermgmt.OriginAfterLogin');
				$redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : LOGIN_REDIRECT_URL;
				$this->redirect($redirect);
			}
		}
		if($this->Session->check('UserAuth.FoursquareLogin')) {
			$this->Session->delete('UserAuth.FoursquareLogin');
			if($this->Session->check('UserAuth.FoursquareChangePass')) {
				$this->redirect('/changePassword');
			} else {
				$OriginAfterLogin=$this->Session->read('Usermgmt.OriginAfterLogin');
				$this->Session->delete('Usermgmt.OriginAfterLogin');
				$redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : LOGIN_REDIRECT_URL;
				$this->redirect($redirect);
			}
		}
		if($this->Session->check('UserAuth.YahooLogin')) {
			$this->Session->delete('UserAuth.YahooLogin');
			if($this->Session->check('UserAuth.YahooChangePass')) {
				$this->redirect('/changePassword');
			} else {
				$OriginAfterLogin=$this->Session->read('Usermgmt.OriginAfterLogin');
				$this->Session->delete('Usermgmt.OriginAfterLogin');
				$redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : LOGIN_REDIRECT_URL;
				$this->redirect($redirect);
			}
		}
	}
	public function handleBlackHole($type) {
		$this->redirect('/'.$this->params->url);
	}
}
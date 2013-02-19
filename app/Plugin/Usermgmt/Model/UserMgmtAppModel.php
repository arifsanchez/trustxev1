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

App::uses('AppModel', 'Model');
class UserMgmtAppModel extends AppModel {

	/**
	 * Used to match passwords
	 *
	 * @access public
	 * @return boolean
	 */
	public function verifies() {
		return ($this->data['User']['password']===$this->data['User']['cpassword']);
	}
	/**
	 * Used to validate string with letter, integer, dash, underscore
	 *
	 * @access public
	 * @return boolean
	 */
	public function alphaNumericDashUnderscore($check) {
		$value = array_values($check);
		$value = $value[0];
		return preg_match('|^[0-9.a-zA-Z_-]*$|', $value);
	}
	/**
	 * Used to validate string with letter, integer, dash, underscore, space
	 *
	 * @access public
	 * @return boolean
	 */
	public function alphaNumericDashUnderscoreSpace($check) {
		$value = array_values($check);
		$value = $value[0];
		return preg_match('|^[0-9 a-zA-Z_-]*$|', $value);
	}
	/**
	 * Used to validate string with letter
	 *
	 * @access public
	 * @return boolean
	 */
	public function alpha($check) {
		$value = array_values($check);
		$value = $value[0];
		return preg_match('|[a-zA-Z]|', $value);
	}
	/**
	 * Used to validate cellphone
	 *
	 * @access public
	 * @return boolean
	 */
	public function cellphone($check) {
		$value = array_values($check);
		$value = $value[0];
		return preg_match('|^[0-9-+]*$|', $value);
	}
	/**
	 * Used to validate emails
	 *
	 * @access public
	 * @return boolean
	 */
	public function validateEmails($check) {
		if(!isset($this->data['UserEmail']['email_option']) || $this->data['UserEmail']['email_option'] =="no") {
			$emails = array_values($check);
			$key = array_keys($check);
			$emails = explode(',', $emails[0]);
			foreach($emails as $email) {
				$email = trim($email);
				if(!empty($email)) {
					$valid = Validation::email($email);
					if(!$valid) {
						$this->validationErrors[$key[0]][0]=__('You have an error near').' '.$email;
						break;
					}
				}
			}
		}
		return true;
	}
}
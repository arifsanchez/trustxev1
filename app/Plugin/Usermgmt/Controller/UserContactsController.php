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
App::uses('CakeEmail', 'Network/Email');
class UserContactsController extends UserMgmtAppController {
	/**
	 * This controller uses following models
	 *
	 * @var array
	 */
	public $uses = array('Usermgmt.UserContact');
	/**
	 * This controller uses following components
	 *
	 * @var array
	 */
	public $components = array('RequestHandler', 'Usermgmt.Search');
	/**
	 * This controller uses following helpers
	 *
	 * @var array
	 */
	public $helpers = array('Js');
	/**
	 * This controller uses following default pagination values
	 *
	 * @var array
	 */
	public $paginate = array(
		'limit' => 25
	);
	/**
	 * This controller uses search filters in following functions for ex index, online function
	 *
	 * @var array
	 */
	var $searchFields = array
		(
			'index' => array(
				'UserContact' => array(
					'UserContact.name'=> array(
						'type' => 'text',
						'label' => 'Name'
					),
					'UserContact.email' => array(
						'type' => 'text',
						'label' => 'Email'
					),
					'UserContact.phone' => array(
						'type' => 'text',
						'label' => 'Contact No'
					)
				)
			)
		);
	/**
	 * Called before the controller action.  You can use this method to configure and customize components
	 * or perform logic that needs to happen before each controller action.
	 *
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		if(isset($this->Security) &&  ($this->RequestHandler->isAjax() || $this->action=='contactUs')){
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
	}
	/**
	 * Used to view all contacts enquiries to admin
	 *
	 * @access public
	 * @return array
	 */
	public function index() {
		$this->paginate = array('limit' => 10, 'order'=>'UserContact.id desc');
		$userContacts = $this->paginate('UserContact');
		$this->set('userContacts', $userContacts);
		if($this->RequestHandler->isAjax()) {
			$this->layout = 'ajax';
			$this->render('Elements/all_contacts');
		}
	}
	/**
	 * Used to save contact enquiry
	 *
	 * @access public
	 * @return void
	 */
	public function contactUs() {
		if ($this->request -> isPost()) {
			$this->UserContact->set($this->data);
			$contactValidate = $this->UserContact->contactValidate();
			if($this->RequestHandler->isAjax()) {
				$this->layout = 'ajax';
				$this->autoRender = false;
				if ($contactValidate) {
					$response = array('error' => 0, 'message' => 'Succes');
					return json_encode($response);
				} else {
					$response = array('error' => 1,'message' => 'failure');
					$response['data']['UserContact']  = $this->UserContact->validationErrors;
					return json_encode($response);
				}
			} else {
				if ($contactValidate) {
					$this->UserContact->save($this->request->data,false);
					$this->__sendMailToAdmin($this->request->data['UserContact']['name'], $this->request->data['UserContact']['email'], $this->request->data['UserContact']['phone'], $this->request->data['UserContact']['requirement']);
					$this->Session->setFlash(__('thank you for contacting us. we will be in touch with you very soon'));
					$this->redirect('/');
				}
			}
		}
	}
	/**
	 * Used to send mail to admin
	 *
	 * @access public
	 * @param float $amount membership amount
	 * @param bool $success payment success or failed
	 * @return void
	 */
	private function __sendMailToAdmin($name, $email, $phone, $requirement) {
		$emailObj = new CakeEmail();
		$emailObj->emailFormat('both');
		$fromConfig = EMAIL_FROM_ADDRESS;
		$fromNameConfig = EMAIL_FROM_NAME;
		$emailObj->from(array($fromConfig => $fromNameConfig));
		$emailObj->sender(array($fromConfig => $fromNameConfig));
		$emailObj->subject(__('Contact Enquiry'));
		$requirement = nl2br($requirement);
		$body=__('Hi Admin, <br/><br/>A contact enquiry has been saved. Here are the details- <br/><br/>Name- %s <br/>Email- %s <br/>Contact No- %s <br/>Requirement- %s <br/><br/>Thanks', $name, $email, $phone, $requirement);
		if(ADMIN_EMAIL_ADDRESS) {
			$emailObj->to(ADMIN_EMAIL_ADDRESS);
			try{
				$result = $emailObj->send($body);
			} catch (Exception $ex) {
				// we could not send the email, ignore it
				$result="Could not send contact enquiry mail to admin";
				$this->log($result, LOG_DEBUG);
			}
		}
	}
}
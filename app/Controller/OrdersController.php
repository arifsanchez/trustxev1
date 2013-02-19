<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('HttpSocket', 'Network/Http');
App::import('Core', 'HttpSocket');

class OrdersController extends AppController {

	function sms(){
  
		  if(!empty($this->data)){
		   #debug($this->data);die();
		   App::import('Core', 'HttpSocket');
		   $HttpSocket = new HttpSocket();
		   $results = $HttpSocket->post('http://bulk.ezlynx.net:7001/BULK/BULKMT.aspx', array(
			'user' => 'instafx', 
			'pass' => 'instafx8000',
			'msisdn' => $this->data['Cabinets']['number'],
			'body' => ' - '.$this->data['Cabinets']['message'],
			'smstype' => 'TEXT',
			'sender' => 'IKTRUST',
			#'Telco' => 'CELCOM'
		   ));  
		   //$results contains what is returned from the post.
		   #debug($results);die();
		   if(preg_match("/\bSUCCESS\b/i", $results)) {
			$this->Session->setFlash('Successfully queue sent message to '.$this->data['Cabinets']['number'], 'flash/flash_good');
			$this->redirect(array('action' => 'terminal_sms_blasting'));
		   } else {
			$this->Session->setFlash('Error Sending SMS, Please try again', 'flash/flash_good');
			$this->redirect(array('action' => 'terminal_sms_blasting'));
		   }
		  }
   }
	
	
	public $paginate = array(
	    // other keys here.
	    'maxLimit' => 7,
		'order' => array(
			'Order.id' => 'desc'
		)
	);
	 
	public function index() {
		
		$this->Order->recursive = 0;
		$this->set('orders', $this->paginate('Order', array(), array()));
	}

	public function view_buy($id = null) {
	
		$this->Order->id = $id;
		$this->set('order', $this->Order->read(null, $id));
		$userId = $this->UserAuth->getUserId();
		$this->loadModel('Usermgmt.User');
		$user = $this->User->find('list', array(
			'conditions' => array('id' => $userId),
			'fields' => array('email')
		)); 
	   if ($this->request->is('post') || $this->request->is('put'))  {
	   
					if (isset($this->request->data['submit1'])) {
					
					$email = new CakeEmail();
					$email->from(array('admin@trustxe.com' =>'trustxe'))
					->template('invoice')
					->emailFormat('both')
					->to($user)
					->subject('Test')
					->send('Test');
					
					$this->redirect(array('action' =>'thank_buy'));
					
				} else if (isset($this->request->data['submit2'])) {
					$this->redirect(array('action' =>'edit_buy',$this->Order->id));
				}
			
		}
	}
	public function thank_buy() {
	
		
	}
		
		
	public function view_sell($id = null) {
		$this->Order->id = $id;
		$this->set('order', $this->Order->read(null, $id));
		
		if ($this->request->is('post') || $this->request->is('put'))  {
					
					#debug($this->request->data); die();
					if (isset($this->request->data['submit1'])) {
					
						if($this->request->data['Order']['ecurr_type_id'] = 1){
							$this->redirect('https://sci.libertyreserve.com/en?lr_acc=U4792147&lr_store=TRUST+XE+-+SecurePayment&lr_currency=LRUSD&lr_amnt='. $this->request->data['Order']['lrmount'].'&lr_success_url=http%3a%2f%2ftrustxe.com%2forders%2fpayment_success&lr_success_url_method=GET&lr_fail_url=http%3a%2f%2ftrustxe.com%2forders%2fpayment_fail&lr_fail_url_method=GET');
						}else{
						
						}
						
					
					
				} else if (isset($this->request->data['submit2'])) {
					$this->redirect(array('action' =>'edit_sell',$this->Order->id));
				}
			
		}
	}

	public function edit($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Order->read(null, $id);
		}
		$orderTypes = $this->Order->OrderType->find('list');
		$users = $this->Order->User->find('list');
		$userEcurrs = $this->Order->UserEcurr->find('list');
		$products = $this->Order->Product->find('list');
		$paymentMethods = $this->Order->PaymentMethod->find('list');
		$orderStatuses = $this->Order->OrderStatus->find('list');
		$this->set(compact('orderTypes', 'users', 'userEcurrs', 'products', 'paymentMethods', 'orderStatuses'));
	}
	
	public function edit_buy($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved'));
				$this->redirect(array('action' => 'view_buy',$this->Order->id));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Order->read(null, $id);
		}
		$userId = $this->UserAuth->getUserId();
		$this->set('user_id', $userId);
		$userEcurrs = $this->Order->UserEcurr->find('list', array(
			'conditions' => array('UserEcurr.user_id' => $userId),
			'fields' => array('UserEcurr.acc_no')
		));
	
		$this->set(compact('userEcurrs', 'ecurrTypes','paymentMethods'));
		$orderTypes = $this->Order->OrderType->find('list');
		$users = $this->Order->User->find('list');
		//$userEcurrs = $this->Order->UserEcurr->find('list');
		$ecurrTypes = $this->Order->EcurrType->find('list');
		//$products = $this->Order->Product->find('list');
		$paymentMethods = $this->Order->PaymentMethod->find('list');
		$orderStatuses = $this->Order->OrderStatus->find('list');
		$this->set(compact('orderTypes', 'users', 'userEcurrs', 'ecurrTypes','products', 'paymentMethods', 'orderStatuses'));
	}
	
	public function edit_sell($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved'));
				$this->redirect(array('action' => 'view_sell',$this->Order->id));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Order->read(null, $id);
		}
		$userId = $this->UserAuth->getUserId();
		$this->set('user_id', $userId);
		$userEcurrs = $this->Order->UserEcurr->find('list', array(
			'conditions' => array('UserEcurr.user_id' => $userId),
			'fields' => array('UserEcurr.acc_no')
		));
	
		$this->set(compact('userEcurrs', 'ecurrTypes','paymentMethods'));
		$orderTypes = $this->Order->OrderType->find('list');
		$users = $this->Order->User->find('list');
		//$userEcurrs = $this->Order->UserEcurr->find('list');
		$ecurrTypes = $this->Order->EcurrType->find('list');
		//$products = $this->Order->Product->find('list');
		$paymentMethods = $this->Order->PaymentMethod->find('list');
		$orderStatuses = $this->Order->OrderStatus->find('list');
		$this->set(compact('orderTypes', 'users', 'userEcurrs', 'ecurrTypes','products', 'paymentMethods', 'orderStatuses'));
	}


	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('Order deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Order was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	
	public function buy(){
	
	 if ($this->request->is('post')) {
			$this->request->data['Order']['order_type_id'] = 1;
			$this->request->data['Order']['order_status_id'] = 1;
			$this->Order->create();
			  
			if ($this->Order->save($this->request->data)) {
			
				}
				$this->Session->setFlash(__('The order has been saved'));
				$this->redirect(array('action' => 'view_buy',$this->Order->id));
				
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		
		
		$userId = $this->UserAuth->getUserId();
		$this->set('user_id', $userId);
		$ecurrTypes = $this->Order->EcurrType->find('list');
		$paymentMethods = $this->Order->PaymentMethod->find('list');
		$userEcurrs = $this->Order->UserEcurr->find('list', array(
			'conditions' => array('UserEcurr.user_id' => $userId),
			'fields' => array('UserEcurr.acc_no')
		));
	
		$this->set(compact('userEcurrs', 'ecurrTypes','paymentMethods'));
	}
	

	public function sell(){
		if ($this->request->is('post')) {
			$this->request->data['Order']['order_type_id'] = 2;
			$this->request->data['Order']['order_status_id'] = 1;
			$this->Order->create();
			 if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved'));
				$this->redirect(array('action' => 'view_sell',$this->Order->id));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
		$userId = $this->UserAuth->getUserId();
		$this->set('user_id', $userId);
		$ecurrTypes = $this->Order->EcurrType->find('list');
		$paymentMethods = $this->Order->PaymentMethod->find('list');
		$userEcurrs = $this->Order->UserEcurr->find('list', array(
			'conditions' => array('UserEcurr.user_id' => $userId),
			'fields' => array('UserEcurr.acc_no')
		));
	
		$this->set(compact('userEcurrs', 'ecurrTypes','paymentMethods'));
	}
	
	public function transaction_history(){
		$userId = $this->UserAuth->getUserId();
		$this->Order->recursive = 0;
		$this->set('orders', $this->paginate('Order', array(), array()));
	}
}

<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('HttpSocket', 'Network/Http');


class OrdersController extends AppController {

	function sms(){
		  if(!empty($this->request->data)){
		   debug($this->data);
		  
		   $HttpSocket = new HttpSocket();
		   $results = $HttpSocket->post('http://bulk.ezlynx.net:7001/BULK/BULKMT.aspx', array(
			'user' => 'instafx', 
			'pass' => 'instafx8000',
			'msisdn' => $this->request->data['Order']['sms_number'],
			'body' => $this->request->data['Order']['message'],
			'smstype' => 'TEXT',
			'sender' => 'TXE',
			#'Telco' => 'CELCOM'
		   ));  
		   //$results contains what is returned from the post.
		   debug($results);
		   if(preg_match("/\bSUCCESS\b/i", $results)) {
			$this->Session->setFlash('Successfully queue sent message to '.$this->data['Order']['sms_number'], 'flash/flash_good');
			//$this->redirect(array('action' => 'terminal_sms_blasting'));
		   } else {
			$this->Session->setFlash('Error Sending SMS, Please try again', 'flash/flash_good');
			//$this->redirect(array('action' => 'terminal_sms_blasting'));
		   }
		  }
   }
   //limit for paginate
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
		$getorder=$this->Order->read(null, $id);
		$this->set('order',$getorder );
		//debug($getorder);die();
		$userId = $this->UserAuth->getUserId();
		$this->loadModel('Usermgmt.User');
		$user = $this->User->find('list', array(
			'conditions' => array('id' => $userId),
			'fields' => array('email')
		)); 
				
	   if ($this->request->is('post') || $this->request->is('put'))  {
					if (isset($this->request->data['submit1'])) {
					$Email = new CakeEmail('smtp');
					$Email->template('payment');
					$Email->viewVars(array('order' => $getorder));
					$Email->emailFormat('both');
					$Email->from(array('admin@trustxe.com' => 'TrustXe'));
					$Email->to('intannabilasalim@gmail.com');
					$Email->subject('TrustXe');
					$Email->send();
					   
					$this->redirect(array('action' =>'thank_buy'));
					
				} else if (isset($this->request->data['submit2'])) {
					$this->redirect(array('action' =>'edit_buy',$this->Order->id));
				}
			
		}
	}
	public function thank_buy() {	
		$userId = $this->UserAuth->getUserId();
		$this->loadModel('Usermgmt.User');
		$user = $this->User->find('all', array(
			'conditions' => array('User.id' => $userId),
			'recursive' => -1,
			'fields' => array('User.username', 'User.email'),
		)); 
		$this->set('user', $user);
	}
	public function thank_sell() {	}
		
	public function view_sell($id = null) {
		
		$this->Order->id = $id;
		$this->set('order', $this->Order->read(null, $id));
		
		if ($this->request->is('post') || $this->request->is('put')){
					
					debug($this->request->data);
					if (isset($this->request->data['submit1'])) {
					
						if($this->request->data['Order']['type']==1){
						
							$this->redirect('https://sci.libertyreserve.com/en?lr_acc=U4792147&lr_store=TRUST+XE+-+SecurePayment&lr_currency=LRUSD&lr_amnt='. $this->request->data['Order']['lrmount'].'&lr_success_url=http%3a%2f%2ftrustxe.com%2forders%2fpayment_success&lr_success_url_method=GET&lr_fail_url=http%3a%2f%2ftrustxe.com%2forders%2fpayment_fail&lr_fail_url_method=GET');
						}else{
							$this->redirect('https://sci.libertyreserve.com/en?lr_acc=U4792147&lr_store=TRUST+XE+-+SecurePayment&lr_currency=LREUR&lr_amnt='. $this->request->data['Order']['lrmount'].'&lr_success_url=http%3a%2f%2ftrustxe.com%2forders%2fpayment_success&lr_success_url_method=GET&lr_fail_url=http%3a%2f%2ftrustxe.com%2forders%2fpayment_fail&lr_fail_url_method=GET');
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
		$banks= $this->Order->Bank->find('list');
		$this->set(compact('orderTypes', 'users', 'userEcurrs', 'ecurrTypes','products', 'paymentMethods', 'orderStatuses','banks'));
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
	 $HttpSocket = new HttpSocket();		
		$ipla = getenv('HTTP_X_FORWARDED_FOR');
		$results = $HttpSocket->post('http://api.ipinfodb.com/v3/ip-country/?key=b3305824775cffe95f11e87bad777ca407f1cb113fee069461b2bcf62cee0de5&ip='.$ipla.'&format=json');
		$a = json_decode($results,true);
		$b = $a['countryName'];
		if($b == 'MALAYSIA'){
				$paymentMethods= $this->Order->PaymentMethod->find('list', array(
					'conditions' => array('PaymentMethod.id' =>array(1,2)),
					'fields' => array('PaymentMethod.name')
					
				));
				
			}else{
				$paymentMethods= $this->Order->PaymentMethod->find('list', array(
					'conditions' => array('PaymentMethod.id' => 3),
					'fields' => array('PaymentMethod.name')
					));
			}
			//debug($paymentMethod);die();
		$userId = $this->UserAuth->getUserId();
		$this->set('user_id', $userId);
		$ecurrTypes = $this->Order->EcurrType->find('list');
		$userEcurrs = $this->Order->UserEcurr->find('list', array(
			'conditions' => array('UserEcurr.user_id' => $userId),
			'fields' => array('UserEcurr.acc_no')
		));
		$banks= $this->Order->Bank->find('list');
		$this->set(compact('userEcurrs', 'ecurrTypes','paymentMethods','banks'));
		
	 if ($this->request->is('post')) {
			$this->request->data['Order']['order_type_id'] = 1;
			$this->request->data['Order']['order_status_id'] = 1;
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved'));
				$this->redirect(array('action' => 'view_buy',$this->Order->id)
				);
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
		
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
	
	public function buy_history(){
		$order=$this->Order->find('all',array(
			'conditions' => array('Order.order_type_id'=>'1'),
			'recursive'=>-1,
		));
		$this->set('orders', $order);
		debug($order);
	}
	
	public function sell_history(){
		
	}
}

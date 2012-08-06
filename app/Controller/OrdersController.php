<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 */
class OrdersController extends AppController {

/**
 * index method
 *
 * @return void
 */
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

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->set('order', $this->Order->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
		$orderTypes = $this->Order->OrderType->find('list');
		/*$users = $this->Order->User->find('list');*/
		/*$userEcurrs = $this->Order->UserEcurr->find('list');*/
		$products = $this->Order->Product->find('list');
		$paymentMethods = $this->Order->PaymentMethod->find('list');
		$orderStatuses = $this->Order->OrderStatus->find('list');
		
		$userId = $this->UserAuth->getUserId();
		$this->set('user_id', $userId);
		#debug($userId);
		
		$userEcurrs = $this->Order->UserEcurr->find('list', array(
			'conditions' => array('UserEcurr.user_id' => $userId),
			'fields' => array('UserEcurr.acc_no')
		));
		
		$this->set(compact('orderTypes', 'userEcurrs', 'products', 'paymentMethods', 'orderStatuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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
	
	public function new_order(){
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		}
		$orderTypes = $this->Order->OrderType->find('list');
		/*$users = $this->Order->User->find('list');*/
		/*$userEcurrs = $this->Order->UserEcurr->find('list');*/
		$products = $this->Order->Product->find('list');
		$paymentMethods = $this->Order->PaymentMethod->find('list');
		$orderStatuses = $this->Order->OrderStatus->find('list');
		
		$userId = $this->UserAuth->getUserId();
		$this->set('user_id', $userId);
		#debug($userId);
		
		$userEcurrs = $this->Order->UserEcurr->find('list', array(
			'conditions' => array('UserEcurr.user_id' => $userId),
			'fields' => array('UserEcurr.acc_no')
		));
		
		$this->set(compact('orderTypes', 'userEcurrs', 'products', 'paymentMethods', 'orderStatuses'));
	}
	
	public function transaction_history(){
		$this->Order->recursive = 0;
		$this->set('orders', $this->paginate('Order', array(), array()));
	}
}

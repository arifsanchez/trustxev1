<?php
App::uses('AppController', 'Controller');
/**
 * OrderStatuses Controller
 *
 * @property OrderStatus $OrderStatus
 */
class OrderStatusesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OrderStatus->recursive = 0;
		$this->set('orderStatuses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->OrderStatus->id = $id;
		if (!$this->OrderStatus->exists()) {
			throw new NotFoundException(__('Invalid order status'));
		}
		$this->set('orderStatus', $this->OrderStatus->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrderStatus->create();
			if ($this->OrderStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The order status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order status could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->OrderStatus->id = $id;
		if (!$this->OrderStatus->exists()) {
			throw new NotFoundException(__('Invalid order status'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrderStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The order status has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order status could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->OrderStatus->read(null, $id);
		}
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
		$this->OrderStatus->id = $id;
		if (!$this->OrderStatus->exists()) {
			throw new NotFoundException(__('Invalid order status'));
		}
		if ($this->OrderStatus->delete()) {
			$this->Session->setFlash(__('Order status deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Order status was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

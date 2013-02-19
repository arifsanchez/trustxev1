<?php
App::uses('AppController', 'Controller');
/**
 * UserEcurrs Controller
 *
 * @property UserEcurr $UserEcurr
 */
class UserEcurrsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserEcurr->recursive = 0;
		$this->set('userEcurrs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->UserEcurr->id = $id;
		if (!$this->UserEcurr->exists()) {
			throw new NotFoundException(__('Invalid user ecurr'));
		}
		$this->set('userEcurr', $this->UserEcurr->read(null, $id));
	}
	
	public function viewmyec($id = null) {
		$this->UserEcurr->id = $id;
		if (!$this->UserEcurr->exists()) {
			throw new NotFoundException(__('Invalid user ecurr'));
		}
		$this->set('userEcurr', $this->UserEcurr->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserEcurr->create();
			if ($this->UserEcurr->save($this->request->data)) {
				$this->Session->setFlash(__('The user ecurr has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user ecurr could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserEcurr->User->find('list');
		$ecurrTypes = $this->UserEcurr->EcurrType->find('list');
		$this->set(compact('users', 'ecurrTypes'));
	}
	
	public function addmyec() {
		if ($this->request->is('post')) {
			$this->UserEcurr->create();
			if ($this->UserEcurr->save($this->request->data)) {
				$this->Session->setFlash(__('The new myec  has been saved'));
				$this->redirect(array('plugin' => 'usermgmt', 'controller' => 'users','action' => 'myecurr'));
			} else {
				$this->Session->setFlash(__('This form could not be saved. Please, try again.'));
			}
		}
		
		$userId = $this->UserAuth->getUserId();
		$this->set('user_id', $userId);
		$ecurrTypes = $this->UserEcurr->EcurrType->find('list');
		$this->set(compact('users', 'ecurrTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->UserEcurr->id = $id;
		if (!$this->UserEcurr->exists()) {
			throw new NotFoundException(__('Invalid user ecurr'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserEcurr->save($this->request->data)) {
				$this->Session->setFlash(__('The user ecurr has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user ecurr could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UserEcurr->read(null, $id);
		}
		$users = $this->UserEcurr->User->find('list');
		$ecurrTypes = $this->UserEcurr->EcurrType->find('list');
		$this->set(compact('users', 'ecurrTypes'));
	}
	
	public function editmyec($id = null) {
		$this->UserEcurr->id = $id;
		if (!$this->UserEcurr->exists()) {
			throw new NotFoundException(__('Invalid user ecurr'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserEcurr->save($this->request->data)) {
				$this->Session->setFlash(__('The user ecurr has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user ecurr could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UserEcurr->read(null, $id);
		}
		$userId = $this->UserAuth->getUserId();
		$this->set('user_id', $userId);
		$ecurrTypes = $this->UserEcurr->EcurrType->find('list');
		$this->set(compact('users', 'ecurrTypes'));
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
		$this->UserEcurr->id = $id;
		if (!$this->UserEcurr->exists()) {
			throw new NotFoundException(__('Invalid user ecurr'));
		}
		if ($this->UserEcurr->delete()) {
			$this->Session->setFlash(__('User ecurr deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User ecurr was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function myec($id = null) {
		//$userId = $this->UserAuth->getUserId();
		$this->UserEcurr->recursive = 0;
		$this->set('userEcurrs', $this->paginate());
	}

}
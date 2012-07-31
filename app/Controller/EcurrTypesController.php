<?php
App::uses('AppController', 'Controller');
/**
 * EcurrTypes Controller
 *
 * @property EcurrType $EcurrType
 */
class EcurrTypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EcurrType->recursive = 0;
		$this->set('ecurrTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->EcurrType->id = $id;
		if (!$this->EcurrType->exists()) {
			throw new NotFoundException(__('Invalid ecurr type'));
		}
		$this->set('ecurrType', $this->EcurrType->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EcurrType->create();
			if ($this->EcurrType->save($this->request->data)) {
				$this->Session->setFlash(__('The ecurr type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ecurr type could not be saved. Please, try again.'));
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
		$this->EcurrType->id = $id;
		if (!$this->EcurrType->exists()) {
			throw new NotFoundException(__('Invalid ecurr type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EcurrType->save($this->request->data)) {
				$this->Session->setFlash(__('The ecurr type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ecurr type could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->EcurrType->read(null, $id);
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
		$this->EcurrType->id = $id;
		if (!$this->EcurrType->exists()) {
			throw new NotFoundException(__('Invalid ecurr type'));
		}
		if ($this->EcurrType->delete()) {
			$this->Session->setFlash(__('Ecurr type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ecurr type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('AppController', 'Controller');
/**
 * AccountAccesses Controller
 *
 * @property AccountAccess $AccountAccess
 */
class AccountAccessesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AccountAccess->recursive = 0;
		$this->set('accountAccesses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->AccountAccess->id = $id;
		if (!$this->AccountAccess->exists()) {
			throw new NotFoundException(__('Invalid account access'));
		}
		$this->set('accountAccess', $this->AccountAccess->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AccountAccess->create();
			if ($this->AccountAccess->save($this->request->data)) {
				$this->Session->setFlash(__('The account access has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The account access could not be saved. Please, try again.'));
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
		$this->AccountAccess->id = $id;
		if (!$this->AccountAccess->exists()) {
			throw new NotFoundException(__('Invalid account access'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AccountAccess->save($this->request->data)) {
				$this->Session->setFlash(__('The account access has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The account access could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->AccountAccess->read(null, $id);
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
		$this->AccountAccess->id = $id;
		if (!$this->AccountAccess->exists()) {
			throw new NotFoundException(__('Invalid account access'));
		}
		if ($this->AccountAccess->delete()) {
			$this->Session->setFlash(__('Account access deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Account access was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->AccountAccess->recursive = 0;
		$this->set('accountAccesses', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->AccountAccess->id = $id;
		if (!$this->AccountAccess->exists()) {
			throw new NotFoundException(__('Invalid account access'));
		}
		$this->set('accountAccess', $this->AccountAccess->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AccountAccess->create();
			if ($this->AccountAccess->save($this->request->data)) {
				$this->Session->setFlash(__('The account access has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The account access could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->AccountAccess->id = $id;
		if (!$this->AccountAccess->exists()) {
			throw new NotFoundException(__('Invalid account access'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AccountAccess->save($this->request->data)) {
				$this->Session->setFlash(__('The account access has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The account access could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->AccountAccess->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->AccountAccess->id = $id;
		if (!$this->AccountAccess->exists()) {
			throw new NotFoundException(__('Invalid account access'));
		}
		if ($this->AccountAccess->delete()) {
			$this->Session->setFlash(__('Account access deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Account access was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

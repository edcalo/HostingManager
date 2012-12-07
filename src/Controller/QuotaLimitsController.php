<?php
App::uses('AppController', 'Controller');
/**
 * QuotaLimits Controller
 *
 * @property QuotaLimit $QuotaLimit
 */
class QuotaLimitsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->QuotaLimit->recursive = 0;
		$this->set('quotaLimits', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->QuotaLimit->id = $id;
		if (!$this->QuotaLimit->exists()) {
			throw new NotFoundException(__('Invalid quota limit'));
		}
		$this->set('quotaLimit', $this->QuotaLimit->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QuotaLimit->create();
			if ($this->QuotaLimit->save($this->request->data)) {
				$this->Session->setFlash(__('The quota limit has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quota limit could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->QuotaLimit->Account->find('list');
		$this->set(compact('accounts'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->QuotaLimit->id = $id;
		if (!$this->QuotaLimit->exists()) {
			throw new NotFoundException(__('Invalid quota limit'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QuotaLimit->save($this->request->data)) {
				$this->Session->setFlash(__('The quota limit has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quota limit could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->QuotaLimit->read(null, $id);
		}
		$accounts = $this->QuotaLimit->Account->find('list');
		$this->set(compact('accounts'));
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
		$this->QuotaLimit->id = $id;
		if (!$this->QuotaLimit->exists()) {
			throw new NotFoundException(__('Invalid quota limit'));
		}
		if ($this->QuotaLimit->delete()) {
			$this->Session->setFlash(__('Quota limit deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Quota limit was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->QuotaLimit->recursive = 0;
		$this->set('quotaLimits', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->QuotaLimit->id = $id;
		if (!$this->QuotaLimit->exists()) {
			throw new NotFoundException(__('Invalid quota limit'));
		}
		$this->set('quotaLimit', $this->QuotaLimit->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->QuotaLimit->create();
			if ($this->QuotaLimit->save($this->request->data)) {
				$this->Session->setFlash(__('The quota limit has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quota limit could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->QuotaLimit->Account->find('list');
		$this->set(compact('accounts'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->QuotaLimit->id = $id;
		if (!$this->QuotaLimit->exists()) {
			throw new NotFoundException(__('Invalid quota limit'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QuotaLimit->save($this->request->data)) {
				$this->Session->setFlash(__('The quota limit has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quota limit could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->QuotaLimit->read(null, $id);
		}
		$accounts = $this->QuotaLimit->Account->find('list');
		$this->set(compact('accounts'));
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
		$this->QuotaLimit->id = $id;
		if (!$this->QuotaLimit->exists()) {
			throw new NotFoundException(__('Invalid quota limit'));
		}
		if ($this->QuotaLimit->delete()) {
			$this->Session->setFlash(__('Quota limit deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Quota limit was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

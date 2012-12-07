<?php
App::uses('AppController', 'Controller');
/**
 * AccountActivities Controller
 *
 * @property AccountActivity $AccountActivity
 */
class AccountActivitiesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AccountActivity->recursive = 0;
		$this->set('accountActivities', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->AccountActivity->id = $id;
		if (!$this->AccountActivity->exists()) {
			throw new NotFoundException(__('Invalid account activity'));
		}
		$this->set('accountActivity', $this->AccountActivity->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AccountActivity->create();
			if ($this->AccountActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The account activity has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The account activity could not be saved. Please, try again.'));
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
		$this->AccountActivity->id = $id;
		if (!$this->AccountActivity->exists()) {
			throw new NotFoundException(__('Invalid account activity'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AccountActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The account activity has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The account activity could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->AccountActivity->read(null, $id);
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
		$this->AccountActivity->id = $id;
		if (!$this->AccountActivity->exists()) {
			throw new NotFoundException(__('Invalid account activity'));
		}
		if ($this->AccountActivity->delete()) {
			$this->Session->setFlash(__('Account activity deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Account activity was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->AccountActivity->recursive = 0;
		$this->set('accountActivities', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->AccountActivity->id = $id;
		if (!$this->AccountActivity->exists()) {
			throw new NotFoundException(__('Invalid account activity'));
		}
		$this->set('accountActivity', $this->AccountActivity->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AccountActivity->create();
			if ($this->AccountActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The account activity has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The account activity could not be saved. Please, try again.'));
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
		$this->AccountActivity->id = $id;
		if (!$this->AccountActivity->exists()) {
			throw new NotFoundException(__('Invalid account activity'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AccountActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The account activity has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The account activity could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->AccountActivity->read(null, $id);
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
		$this->AccountActivity->id = $id;
		if (!$this->AccountActivity->exists()) {
			throw new NotFoundException(__('Invalid account activity'));
		}
		if ($this->AccountActivity->delete()) {
			$this->Session->setFlash(__('Account activity deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Account activity was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

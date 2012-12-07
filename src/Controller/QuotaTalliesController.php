<?php
App::uses('AppController', 'Controller');
/**
 * QuotaTallies Controller
 *
 * @property QuotaTally $QuotaTally
 */
class QuotaTalliesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->QuotaTally->recursive = 0;
		$this->set('quotaTallies', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->QuotaTally->id = $id;
		if (!$this->QuotaTally->exists()) {
			throw new NotFoundException(__('Invalid quota tally'));
		}
		$this->set('quotaTally', $this->QuotaTally->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QuotaTally->create();
			if ($this->QuotaTally->save($this->request->data)) {
				$this->Session->setFlash(__('The quota tally has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quota tally could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->QuotaTally->Account->find('list');
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
		$this->QuotaTally->id = $id;
		if (!$this->QuotaTally->exists()) {
			throw new NotFoundException(__('Invalid quota tally'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QuotaTally->save($this->request->data)) {
				$this->Session->setFlash(__('The quota tally has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quota tally could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->QuotaTally->read(null, $id);
		}
		$accounts = $this->QuotaTally->Account->find('list');
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
		$this->QuotaTally->id = $id;
		if (!$this->QuotaTally->exists()) {
			throw new NotFoundException(__('Invalid quota tally'));
		}
		if ($this->QuotaTally->delete()) {
			$this->Session->setFlash(__('Quota tally deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Quota tally was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->QuotaTally->recursive = 0;
		$this->set('quotaTallies', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->QuotaTally->id = $id;
		if (!$this->QuotaTally->exists()) {
			throw new NotFoundException(__('Invalid quota tally'));
		}
		$this->set('quotaTally', $this->QuotaTally->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->QuotaTally->create();
			if ($this->QuotaTally->save($this->request->data)) {
				$this->Session->setFlash(__('The quota tally has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quota tally could not be saved. Please, try again.'));
			}
		}
		$accounts = $this->QuotaTally->Account->find('list');
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
		$this->QuotaTally->id = $id;
		if (!$this->QuotaTally->exists()) {
			throw new NotFoundException(__('Invalid quota tally'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QuotaTally->save($this->request->data)) {
				$this->Session->setFlash(__('The quota tally has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quota tally could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->QuotaTally->read(null, $id);
		}
		$accounts = $this->QuotaTally->Account->find('list');
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
		$this->QuotaTally->id = $id;
		if (!$this->QuotaTally->exists()) {
			throw new NotFoundException(__('Invalid quota tally'));
		}
		if ($this->QuotaTally->delete()) {
			$this->Session->setFlash(__('Quota tally deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Quota tally was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

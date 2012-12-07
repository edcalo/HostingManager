<?php

App::uses('AppController', 'Controller');

/**
 * Accounts Controller
 *
 * @property Account $Account
 */
class AccountsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->layout='ajax';
        $this->Account->recursive = 0;
        $this->set('accounts', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Account->id = $id;
        if (!$this->Account->exists()) {
            throw new NotFoundException(__('Invalid account'));
        }
        $this->set('account', $this->Account->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Account->create();
            if ($this->Account->save($this->request->data)) {
                $this->Session->setFlash(__('The account has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The account could not be saved. Please, try again.'));
            }
        }
        $users = $this->Account->User->find('list');
        $servers = $this->Account->Server->find('list');
        $this->set(compact('users', 'servers'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Account->id = $id;
        if (!$this->Account->exists()) {
            throw new NotFoundException(__('Invalid account'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Account->save($this->request->data)) {
                $this->Session->setFlash(__('The account has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The account could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Account->read(null, $id);
        }
        $users = $this->Account->User->find('list');
        $servers = $this->Account->Server->find('list');
        $this->set(compact('users', 'servers'));
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
        $this->Account->id = $id;
        if (!$this->Account->exists()) {
            throw new NotFoundException(__('Invalid account'));
        }
        if ($this->Account->delete()) {
            $this->Session->setFlash(__('Account deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Account was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Account->recursive = 0;
        $this->set('accounts', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Account->id = $id;
        if (!$this->Account->exists()) {
            throw new NotFoundException(__('Invalid account'));
        }
        $this->set('account', $this->Account->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Account->create();
            if ($this->Account->save($this->request->data)) {
                $this->Session->setFlash(__('The account has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The account could not be saved. Please, try again.'));
            }
        }
        $users = $this->Account->User->find('list');
        $servers = $this->Account->Server->find('list');
        $this->set(compact('users', 'servers'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $this->Account->id = $id;
        if (!$this->Account->exists()) {
            throw new NotFoundException(__('Invalid account'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Account->save($this->request->data)) {
                $this->Session->setFlash(__('The account has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The account could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Account->read(null, $id);
        }
        $users = $this->Account->User->find('list');
        $servers = $this->Account->Server->find('list');
        $this->set(compact('users', 'servers'));
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
        $this->Account->id = $id;
        if (!$this->Account->exists()) {
            throw new NotFoundException(__('Invalid account'));
        }
        if ($this->Account->delete()) {
            $this->Session->setFlash(__('Account deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Account was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}

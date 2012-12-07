<?php

App::uses('AppController', 'Controller');

/**
 * Servers Controller
 *
 * @property Server $Server
 */
class ServersController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->layout = 'ajax';
        $this->Server->recursive = 0;
        $this->set('servers', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Server->id = $id;
        if (!$this->Server->exists()) {
            throw new NotFoundException(__('Invalid server'));
        }
        $this->set('server', $this->Server->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Server->create();
            if ($this->Server->save($this->request->data)) {
                $this->Session->setFlash(__('The server has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The server could not be saved. Please, try again.'));
            }
        }
        $accounts = $this->Server->Account->find('list');
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
        $this->Server->id = $id;
        if (!$this->Server->exists()) {
            throw new NotFoundException(__('Invalid server'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Server->save($this->request->data)) {
                $this->Session->setFlash(__('The server has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The server could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Server->read(null, $id);
        }
        $accounts = $this->Server->Account->find('list');
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
        $this->Server->id = $id;
        if (!$this->Server->exists()) {
            throw new NotFoundException(__('Invalid server'));
        }
        if ($this->Server->delete()) {
            $this->Session->setFlash(__('Server deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Server was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Server->recursive = 0;
        $this->set('servers', $this->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Server->id = $id;
        if (!$this->Server->exists()) {
            throw new NotFoundException(__('Invalid server'));
        }
        $this->set('server', $this->Server->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Server->create();
            if ($this->Server->save($this->request->data)) {
                $this->Session->setFlash(__('The server has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The server could not be saved. Please, try again.'));
            }
        }
        $accounts = $this->Server->Account->find('list');
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
        $this->Server->id = $id;
        if (!$this->Server->exists()) {
            throw new NotFoundException(__('Invalid server'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Server->save($this->request->data)) {
                $this->Session->setFlash(__('The server has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The server could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Server->read(null, $id);
        }
        $accounts = $this->Server->Account->find('list');
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
        $this->Server->id = $id;
        if (!$this->Server->exists()) {
            throw new NotFoundException(__('Invalid server'));
        }
        if ($this->Server->delete()) {
            $this->Session->setFlash(__('Server deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Server was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}

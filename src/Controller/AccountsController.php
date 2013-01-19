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
        $this->layout = 'ajax';
        $this->Account->recursive = 1;
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
        $this->layout = 'ajax';
        if (!empty($this->request->data)) {
            $datos = json_decode(stripslashes($this->request->data)); //decodificamos la informacion

            $user = array(
                'user_name' => $datos->account_name,
                'title' => $datos->title,
                'first_name' => $datos->first_name,
                'last_name' => $datos->last_name,
                'email' => $datos->email,
                'phone' => $datos->phone,
                'status' => 1
            );

            $servers = explode(',', $datos->servers);
            if ($datos->quota_limit[0] == 1) {
                $quota_limit = $datos->quota_limit[1] * 1048576;
            } else {
                if ($datos->quota_limit[0] == 0) {
                    $quota_limit = $datos->quota_limit[0];
                } else {
                    $quota_limit = $datos->quota_limit[0] * 1048576;
                }
            }
            $quota = array('QuotaLimit' => array(
                    'account_name' => $datos->account_name,
                    'bytes_in_avail' => $quota_limit
                    ));
            $account = array('Account' => array(
                    'account_name' => $datos->account_name,
                    'account_password' => $datos->account_password,
                    'account_description' => $datos->account_description,
                    'expired' => date('Y-m-d H:i:s'),
                    'home_dir' => $datos->home_dir == "" ? "/srv/" . $datos->account_name : $datos->home_dir,
                    'status' => 1
                    ));
            $this->request->data = $account;
            $this->request->data['User'] = $user;
            $this->request->data['Server'] = $servers;
            $this->request->data['QuotaLimit'] = $quota;

            if ($this->Account->saveAll($this->request->data)) {
                $this->set('saved', 1);
                $this->request->data['Account']['id'] = $this->Account->id;
            } else {
                $this->set('saved', 0);
            }
        } else {
            $this->set('saved', 2); // mo se recibieron datos para guardar
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

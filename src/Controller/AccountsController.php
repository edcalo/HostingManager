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
        //$this->Account->recursive = 1;
        $this->paginate = array(
            'limit' => $this->request->query['limit'],
            'page' => $this->request->query['page'],
            'offset' => $this->request->query['start'],
            'recursive' => 1,
            'conditions' => array(
                'Account.is_delete' => false,
                'Account.account_name LIKE' => "%" . (isset($this->request->query['query']) ? $this->request->query['query'] : '') . "%"
            )
        );
        //print_r($this->paginate()); die();
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
            $data = array();
            if (is_array($datos)) {
                $user = array(
                    'user_name' => $datos[0]->account_name,
                    'title' => $datos[0]->title,
                    'first_name' => $datos[0]->first_name,
                    'last_name' => $datos[0]->last_name,
                    'email' => $datos[0]->email,
                    'phone' => $datos[0]->phone,
                    'status' => 1
                );
                $data['User'] = $user;
                $accounts = array();
                foreach ($datos as $data_new_account) {

                    if ($data_new_account->quota_limit[0] == 1) {
                        $quota_limit = $data_new_account->quota_limit[1] * 1048576;
                    } else {
                        if ($data_new_account->quota_limit[0] == 0) {
                            $quota_limit = $data_new_account->quota_limit[0];
                        } else {
                            $quota_limit = $data_new_account->quota_limit[0] * 1048576;
                        }
                    }
                    $quota = array(
                        'account_name' => $data_new_account->account_name,
                        'bytes_in_avail' => $quota_limit
                    );

                    $account_data = array('Account' => array(
                            'account_name' => $data_new_account->account_name,
                            'account_password' => $data_new_account->account_password,
                            'account_description' => $data_new_account->account_description,
                            'expired' => date('Y-m-d H:i:s'),
                            'home_dir' => $data_new_account->home_dir == "" ? "/srv/" . $data_new_account->account_name : $data_new_account->home_dir,
                            'status' => $data_new_account->status,
                            'server_id' => $data_new_account->servers,
                            'QuotaLimit' => $quota
                        )
                    );
                    array_push($accounts, $account_data);
                }
                $data['Account'] = $accounts;
            } else {
                $user = array(
                    'user_name' => $datos->account_name,
                    'title' => $datos->title,
                    'first_name' => $datos->first_name,
                    'last_name' => $datos->last_name,
                    'email' => $datos->email,
                    'phone' => $datos->phone,
                    'status' => 1
                );
                $data['User'] = $user;
                $accounts = array();
                if ($datos->quota_limit[1] == 1) {
                    $quota_limit = $datos->quota_limit[0] * 1048576;
                } else {
                    if ($datos->quota_limit[1] == 0) {
                        $quota_limit = $datos->quota_limit[1];
                    } else {
                        $quota_limit = $datos->quota_limit[1] * 1048576;
                    }
                }
                $quota = array(
                    'account_name' => $datos->account_name,
                    'bytes_in_avail' => $quota_limit
                );

                $account_data = array('Account' => array(
                        'account_name' => $datos->account_name,
                        'account_password' => $datos->account_password,
                        'account_description' => $datos->account_description,
                        'expired' => date('Y-m-d H:i:s'),
                        'home_dir' => $datos->home_dir == "" ? "/srv/" . $datos->account_name : $datos->home_dir,
                        'status' => $datos->status,
                        'server_id' => $datos->servers,
                        'QuotaLimit' => $quota
                    )
                );
                array_push($accounts, $account_data);

                $data['Account'] = $accounts;
            }
            if ($this->Account->User->saveAssociated($data, array('deep' => true)) === true) {
                $this->set('saved', 1);
                $this->Account->User->recursive = 2;
                $this->set('result', $this->Account->User->read(null, $this->Account->User->id));
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
    public function edit() {
        $this->layout = 'ajax';
        $datos = json_decode(stripslashes($this->request->data)); //decodificamos la informacion
        $success = false;
        if (count($datos) == 1) { //verificamos si solo se modifico un registro o varios
            $user = array(
                'id' => $datos->user_id,
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
                    'id' => $datos->id,
                    'account_name' => $datos->account_name,
                    'account_password' => $datos->account_password,
                    'account_description' => $datos->account_description,
                    'expired' => date('Y-m-d H:i:s'),
                    'home_dir' => $datos->home_dir == "" ? "/srv/" . $datos->account_name : $datos->home_dir,
                    'status' => $datos->status
                    ));
            $this->request->data = $account;
            $this->request->data['User'] = $user;
            $this->request->data['Server'] = $servers;
            $this->request->data['QuotaLimit'] = $quota;

            if ($this->Account->saveAll($this->request->data)) {
                $success = true;
                $this->set('accounts', $this->Account->find('all'));
            }
            $this->set('update', $success);
        } else if (count($datos) >= 2) {
            $resp = array('Server' => array());
            foreach ($datos as $data_account) {
                $user = array(
                    'id' => $data_account->user_id,
                    'user_name' => $data_account->account_name,
                    'title' => $data_account->title,
                    'first_name' => $data_account->first_name,
                    'last_name' => $data_account->last_name,
                    'email' => $data_account->email,
                    'phone' => $data_account->phone,
                    'status' => 1
                );

                $servers = explode(',', $data_account->servers);
                if ($datos->quota_limit[0] == 1) {
                    $quota_limit = $data_account->quota_limit[1] * 1048576;
                } else {
                    if ($datos->quota_limit[0] == 0) {
                        $quota_limit = $data_account->quota_limit[0];
                    } else {
                        $quota_limit = $data_account->quota_limit[0] * 1048576;
                    }
                }
                $quota = array('QuotaLimit' => array(
                        'account_name' => $data_account->account_name,
                        'bytes_in_avail' => $quota_limit
                        ));
                $account = array('Account' => array(
                        'id' => $datos->id,
                        'account_name' => $datos->account_name,
                        'account_password' => $datos->account_password,
                        'account_description' => $datos->account_description,
                        'expired' => date('Y-m-d H:i:s'),
                        'home_dir' => $data_account->home_dir == "" ? "/srv/" . $data_account->account_name : $data_account->home_dir,
                        'status' => $data_account->status
                        ));
                $account_data = $account;
                $account_data['User'] = $user;
                $account_data['Server'] = $servers;
                $account_data['QuotaLimit'] = $quota;

                if ($this->Account->saveAll($account_data)) {
                    $success = true;
                    array_push($resp, $account_data['Server']);
                }
            }
            $this->request->data = $resp;
            $this->set('accounts', $this->Account->find('all'));
        }
        $this->set('update', $success);
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
        $this->layout = 'ajax';
        $accounts = json_decode(stripslashes($this->request->data));
        if (count($accounts) == 1) {
            $accounts = array('Account' => (array) $accounts);
            $accounts['Account']['is_delete'] = true;
            $result = $this->Account->save($accounts);
            $this->set('delete', $result);
        } else {
            $result = true;
            foreach ($accounts as $data_account) {
                $Account = array('Account' => (array) $data_account);
                $Account['Account']['is_delete'] = true;
                $result = ($result and $this->Account->save($Account));
            }
            $this->set('delete', $result);
        }
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

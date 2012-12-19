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
        $this->Server->recursive = 1;
        $this->set('servers', $this->paginate());
        $this->set('servers', $this->Server->find('all', array(
                    'conditions' => array('Server.is_delete' => false)
                )));
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
        $this->layout = 'ajax';
        if (!empty($this->request->data)) {
            $datos = json_decode(stripslashes($this->request->data)); //decodificamos la informacion
            $services = explode(',', $datos->services);
            $members = explode(',', $datos->members);
            $this->request->data = array('Server' => (array) $datos);
            $this->request->data['Service'] = array('Service' => $services);

            $this->request->data['Account'] = array('Account' => $members);
            if ($this->Server->save($this->request->data)) {
                $this->set('saved', 1);
                $this->request->data['Server']['id'] = $this->Server->id;
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
            $services = explode(',', $datos->services);
            $members = explode(',', $datos->members);
            $this->request->data = array('Server' => (array) $datos);
            $this->request->data['Service'] = array('Service' => $services);

            $this->request->data['Account'] = array('Account' => $members);
            if ($this->Server->save($this->request->data)) {
                $success = true;
                $this->set('servers', $this->Server->find('all'));
            }
            $this->set('update', $success);
        } else if (count($datos) >= 2) {
            $resp = array('Server' => array());
            foreach ($datos as $dato_server) {
                $services = explode(',', $dato_server->services);
                $members = explode(',', $dato_server->members);
                $server = array('Server' => (array) $dato_server);
                
                $server['Service'] = array('Service' => $services);

                $server['Account'] = array('Account' => $members);
                if ($this->Server->save($server)) {
                    $success = true;
                    array_push($resp['Server'], $server['Server']);
                }
            }
            $this->request->data = $resp;
            $this->set('servers', $this->Server->find('all'));
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
        $servers = json_decode(stripslashes($this->request->data));
        if (count($servers) == 1) {
            $servers = array('Server' => (array) $servers);
            $servers['Server']['is_delete'] = true;
            $result = $this->Server->save($servers);
            $this->set('delete', $result);
        } else {
            $result = true;
            foreach ($servers as $dato_server) {
                $server = array('Server' => (array) $dato_server);
                $server['Server']['is_delete'] = true;
                $result = ($result and $this->Server->save($server));
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
        $services = $this->Server->Service->find('list');
        $this->set(compact('accounts', 'services'));
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
            print_r($this->request->data);
            die();
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
        $services = $this->Server->Service->find('list');
        $this->set(compact('accounts', 'services'));
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

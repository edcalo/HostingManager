<?php

App::uses('AppController', 'Controller');

/**
 * Services Controller
 *
 * @property Service $Service
 */
class ServicesController extends AppController {

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {

        $this->layout = 'ajax';

        $this->paginate = array(
            'limit' => $this->request->query['limit'],
            'page' => $this->request->query['page'],
            'offset' => $this->request->query['start'],
            'recursive' => 0,
            'conditions' => array(
                'Service.is_delete' => false,
                'Service.service_name LIKE' => "%" . (isset($this->request->query['query']) ? $this->request->query['query'] : '') . "%"
            )
        );
        //$this->Service->recursive = 0;
        $this->set('services', $this->paginate()); //Service->find('all', $conditions));
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        $this->Service->id = $id;
        if (!$this->Service->exists()) {
            throw new NotFoundException(__('Invalid service'));
        }
        $this->set('service', $this->Service->read(null, $id));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        $this->layout = 'ajax';
        if (!empty($this->data)) {
            $datos = json_decode(stripslashes($this->request->data)); //decodificamos la informacion
            $this->request->data = array('Service' => (array) $datos);
            if ($this->Service->save($this->request->data)) {
                $this->set('guardado', 1);
                $this->request->data['Service']['id'] = $this->Service->id;
            } else {
                $this->set('guardado', 0);
            }
        } else {
            $this->set('guardado', 2); // mo se recibieron datos para guardar
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit() {
        $this->layout = 'ajax';
        $datos = json_decode(stripslashes($this->request->data)); //decodificamos la informacion
        $success = false;
        //var_dump($this->request->data);
        //var_dump($datos);
        //echo count($datos);
        if (count($datos) == 1) { //verificamos si solo se modifico un registro o varios
            $this->request->data = array('Service' => (array) $datos);
            if ($this->Service->save($this->request->data)) {
                $success = true;
                $this->set('services', $this->Service->find('all'));
            }
            $this->set('update', $success);
        } else if (count($datos) >= 2) {
            $resp = array('Service' => array());
            foreach ($datos as $dato_service) {
                $service = array('Service' => (array) $dato_service);
                if ($this->Service->save($service)) {
                    $success = true;
                    array_push($resp['Service'], $service['Service']);
                }
            }
            $this->request->data = $resp;
            $this->set('services', $this->Service->find('all'));
        }
        $this->set('update', $success);
    }

    /**
     * admin_delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete() {

        $this->layout = 'ajax';
        $services = json_decode(stripslashes($this->request->data));
        //var_dump($services);
        if (is_array($services)) {
            if (count($services) == 1) {
                $services = array('Service' => (array) $services);
                $services['Service']['is_delete'] = true;
                $result = $this->Service->save($services);
                $this->set('delete', $result);
            } else {
                $result = true;
                foreach ($services as $dato_service) {
                    $service = array('Service' => (array) $dato_service);
                    $service['Service']['is_delete'] = true;
                    $result = ($result && $this->Service->save($service));
                }
                $this->set('delete', $result);
            }
        } else {
            $services = array('Service' => (array) $services);
            $services['Service']['is_delete'] = true;
            //var_dump($services);
            $result = $this->Service->save($services);
            $this->set('delete', $result);
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Service->recursive = 0;
        $this->set('services', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Service->id = $id;
        if (!$this->Service->exists()) {
            throw new NotFoundException(__('Invalid service'));
        }
        $this->set('service', $this->Service->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        if ($this->request->is('post')) {
            $this->Service->create();
            if ($this->Service->save($this->request->data)) {
                $this->Session->setFlash(__('The service has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The service could not be saved. Please, try again.'));
            }
        }
        $servers = $this->Service->Server->find('list');
        $this->set(compact('servers'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {

        $this->Service->id = $id;
        if (!$this->Service->exists()) {
            throw new NotFoundException(__('Invalid service'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Service->save($this->request->data)) {
                $this->Session->setFlash(__('The service has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The service could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Service->read(null, $id);
        }
        $servers = $this->Service->Server->find('list');
        $this->set(compact('servers'));
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
        $this->Service->id = $id;
        if (!$this->Service->exists()) {
            throw new NotFoundException(__('Invalid service'));
        }
        if ($this->Service->delete()) {
            $this->Session->setFlash(__('Service deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Service was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
    
    public function upload() {

        $this->layout = 'ajax';
        $response = array();
        $query = $this->params['form']['query'];
        if (isset($query) && $query === 'passport-upload') {  // file upload attempt
            $target_path = "files";
            $fileName = $_FILES['data']['name']['Persona']['fotografia'];
            $fileSize = $_FILES['data']['size']['Persona']['fotografia'];
            $fileType = $_FILES['data']['type']['Persona']['fotografia'];
            $fileErr = $_FILES['data']['error']['Persona']['fotografia'];
            $tmpName = $_FILES['data']['tmp_name']['Persona']['fotografia'];
            $uploadErrors = array(
                UPLOAD_ERR_OK => 'There is no error, the file uploaded with success.',
                UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload maximum filesize directive',
                UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the upload maximum filesize directive',
                UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded.',
                UPLOAD_ERR_NO_FILE => 'No file was uploaded.'
            );

            if (is_uploaded_file($tmpName)) {
                $target_path = $target_path . basename($fileName);
                //echo WWW_ROOT.$target_path;
                if (move_uploaded_file($tmpName, WWW_ROOT . $target_path)) {
                    $response['success'] = true;
                    $response['validState'] = true;
                    $response['screenshotUrl'] = str_replace(DIRECTORY_SEPARATOR, '/', $target_path);
                } else {
                    $response['success'] = false;
                    if (isset($uploadErrors[$fileErr])) {
                        $response['errors'] = array($uploadErrors[$fileErr]);
                    }
                }
            } else {
                $response['success'] = false;
                $response['errors'] = array('No file was uploaded.');
            }
        } else {  // the form was submitted
            $response['success'] = true;
        }
        $this->set('respuesta', $response);
    }
}

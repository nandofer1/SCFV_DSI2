<?php
App::uses('AppController', 'Controller');
/**
 * Requests Controller
 *
 * @property Request $Request
 * @property PaginatorComponent $Paginator
 */
class RequestsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Request->recursive = 0;
		$this->set('requests', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Request->exists($id)) {
			throw new NotFoundException(__('Invalid request'));
		}
		$options = array('conditions' => array('Request.' . $this->Request->primaryKey => $id));
		$this->set('request', $this->Request->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Request->create();
			if ($this->Request->save($this->request->data)) {
        //Bitacora
        $logbook = new Logbook();
        $logbook->add("Solicitado Enviada", serialize($this->request->data));

				$this->Session->setFlash(__('La solicitud ha sido enviada.'), 'flash_notification');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La solicitud no fue enviada, intentelo nuevamente.'), 'flash_notification');
			}
		}
        $dossiers = $this->Request->Dossier->find('list',array(
            'conditions' => array('Dossier.prestable' => '1')
        ));
        $units = $this->Request->Unit->find('list');
		$users = $this->Request->User->find('list');
        $employees = $this->Request->Employee->find('list');
        $drivers = $this->Request->Employee->find('list');
		$this->set(compact('dossiers', 'units', 'users','employees', 'drivers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Request->exists($id)) {
			throw new NotFoundException(__('Invalid request'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Request->save($this->request->data)) {
        //Bitacora
        $logbook = new Logbook();
        $logbook->add("Solicitud Actualizada", serialize($this->request->data));


				$this->Session->setFlash(__('La solicitud ha sido actualizada.'), 'flash_notification');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La solititud fallo al actualizar, favor intentar nuevamente.'), 'flash_notification');
			}
		} else {
			$options = array('conditions' => array('Request.' . $this->Request->primaryKey => $id));
			$this->request->data = $this->Request->find('first', $options);
		}
		$dossiers = $this->Request->Dossier->find('list',array(
            'conditions' => array('Dossier.prestable' => '1')
        ));
        $units = $this->Request->Unit->find('list');
		$users = $this->Request->User->find('list');
        $employees = $this->Request->Employee->find('list');
        $drivers = $this->Request->Employee->find('list');
		$this->set(compact('dossiers', 'units', 'users','employees', 'drivers'));
	}

/**
 * manage method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function manage($id = null) {
		if (!$this->Request->exists($id)) {
			throw new NotFoundException(__('Invalid request'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Request->save($this->request->data)) {
        //Bitacora
        $logbook = new Logbook();
        $logbook->add("Solicitud Actualizada", serialize($this->request->data));

				$this->Session->setFlash(__('Solicitud actualizada.'), 'flash_notification');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La solicitud fallo al actualizarse, favor intentar nuevamente.'), 'flash_notification');
			}
		} else {
			$options = array('conditions' => array('Request.' . $this->Request->primaryKey => $id));
			$this->request->data = $this->Request->find('first', $options);
		}
		$dossiers = $this->Request->Dossier->find('list',array(
            'conditions' => array('Dossier.prestable' => '1')
        ));
        $units = $this->Request->Unit->find('list');
		$users = $this->Request->User->find('list');
        $employees = $this->Request->Employee->find('list');
        $drivers = $this->Request->Employee->find('list');
		$this->set(compact('dossiers', 'units', 'users','employees', 'drivers'));
	}    
    
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Request->id = $id;
		if (!$this->Request->exists()) {
			throw new NotFoundException(__('Invalid request'));
		}
		$this->request->allowMethod('post', 'delete');
    $data = $this->Request->findById($id);		
		if ($this->Request->delete()) {
        //Bitacora
        $logbook = new Logbook();
        $logbook->add("Solicitud Borrada", serialize($this->request->data));

			$this->Session->setFlash(__('La solicitud ha sido borrada.'), 'flash_notification');
		} else {
			$this->Session->setFlash(__('The request could not be deleted. Please, try again.'), 'flash_notification');
		}
		return $this->redirect(array('action' => 'index'));
	}
}

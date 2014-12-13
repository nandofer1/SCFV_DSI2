<?php
App::uses('AppController', 'Controller');
/**
 * Maintenancetools Controller
 *
 * @property Maintenancetool $Maintenancetool
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MaintenancetoolsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Maintenancetool->recursive = 0;
		$this->set('maintenancetools', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Maintenancetool->exists($id)) {
			throw new NotFoundException(__('Invalid maintenancetool'));
		}
		$options = array('conditions' => array('Maintenancetool.' . $this->Maintenancetool->primaryKey => $id));
		$this->set('maintenancetool', $this->Maintenancetool->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Maintenancetool->create();
			if ($this->Maintenancetool->save($this->request->data)) {
				$this->Session->setFlash(__('The maintenancetool has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The maintenancetool could not be saved. Please, try again.'));
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
		if (!$this->Maintenancetool->exists($id)) {
			throw new NotFoundException(__('Invalid maintenancetool'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Maintenancetool->save($this->request->data)) {
				$this->Session->setFlash(__('The maintenancetool has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The maintenancetool could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Maintenancetool.' . $this->Maintenancetool->primaryKey => $id));
			$this->request->data = $this->Maintenancetool->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Maintenancetool->id = $id;
		if (!$this->Maintenancetool->exists()) {
			throw new NotFoundException(__('Invalid maintenancetool'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Maintenancetool->delete()) {
			$this->Session->setFlash(__('The maintenancetool has been deleted.'));
		} else {
			$this->Session->setFlash(__('The maintenancetool could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

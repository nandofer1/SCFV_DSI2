<?php
App::uses('AppController', 'Controller');
/**
 * Maintenancetypes Controller
 *
 * @property Maintenancetype $Maintenancetype
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MaintenancetypesController extends AppController {

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
		$this->Maintenancetype->recursive = 0;
		$this->set('maintenancetypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Maintenancetype->exists($id)) {
			throw new NotFoundException(__('Invalid maintenancetype'));
		}
		$options = array('conditions' => array('Maintenancetype.' . $this->Maintenancetype->primaryKey => $id));
		$this->set('maintenancetype', $this->Maintenancetype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Maintenancetype->create();
			if ($this->Maintenancetype->save($this->request->data)) {
				$this->Session->setFlash(__('The maintenancetype has been saved.'), 'flash_notification');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The maintenancetype could not be saved. Please, try again.'), 'flash_notification');
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
		if (!$this->Maintenancetype->exists($id)) {
			throw new NotFoundException(__('Invalid maintenancetype'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Maintenancetype->save($this->request->data)) {
				$this->Session->setFlash(__('The maintenancetype has been saved.'), 'flash_notification');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The maintenancetype could not be saved. Please, try again.'), 'flash_notification');
			}
		} else {
			$options = array('conditions' => array('Maintenancetype.' . $this->Maintenancetype->primaryKey => $id));
			$this->request->data = $this->Maintenancetype->find('first', $options);
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
		$this->Maintenancetype->id = $id;
		if (!$this->Maintenancetype->exists()) {
			throw new NotFoundException(__('Invalid maintenancetype'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Maintenancetype->delete()) {
			$this->Session->setFlash(__('The maintenancetype has been deleted.'), 'flash_notification');
		} else {
			$this->Session->setFlash(__('The maintenancetype could not be deleted. Please, try again.'), 'flash_notification');
		}
		return $this->redirect(array('action' => 'index'));
	}
}

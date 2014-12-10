<?php
App::uses('AppController', 'Controller');
/**
 * Maintenances Controller
 *
 * @property Maintenance $Maintenance
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MaintenancesController extends AppController {

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
		$this->Maintenance->recursive = 0;
		$this->set('maintenances', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Maintenance->exists($id)) {
			throw new NotFoundException(__('Invalid maintenance'));
		}
		$options = array('conditions' => array('Maintenance.' . $this->Maintenance->primaryKey => $id));
		$this->set('maintenance', $this->Maintenance->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Maintenance->create();
			if ($this->Maintenance->save($this->request->data)) {
				$this->Session->setFlash(__('The maintenance has been saved.'), 'flash_notification');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The maintenance could not be saved. Please, try again.'), 'flash_notification');
			}
		}
		$users = $this->Maintenance->User->find('list');
		$dossiers = $this->Maintenance->Dossier->find('list');
		$this->set(compact('users', 'dossiers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Maintenance->exists($id)) {
			throw new NotFoundException(__('Invalid maintenance'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Maintenance->save($this->request->data)) {
				$this->Session->setFlash(__('The maintenance has been saved.'), 'flash_notification');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The maintenance could not be saved. Please, try again.'), 'flash_notification');
			}
		} else {
			$options = array('conditions' => array('Maintenance.' . $this->Maintenance->primaryKey => $id));
			$this->request->data = $this->Maintenance->find('first', $options);
		}
		$users = $this->Maintenance->User->find('list');
		$dossiers = $this->Maintenance->Dossier->find('list');
		$this->set(compact('users', 'dossiers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Maintenance->id = $id;
		if (!$this->Maintenance->exists()) {
			throw new NotFoundException(__('Invalid maintenance'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Maintenance->delete()) {
			$this->Session->setFlash(__('The maintenance has been deleted.'), 'flash_notification');
		} else {
			$this->Session->setFlash(__('The maintenance could not be deleted. Please, try again.'), 'flash_notification');
		}
		return $this->redirect(array('action' => 'index'));
	}
}

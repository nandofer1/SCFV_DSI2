<?php
App::uses('AppController', 'Controller');
/**
 * Tools Controller
 *
 * @property Tool $Tool
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ToolsController extends AppController {

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
		$this->Tool->recursive = 0;
		$this->set('tools', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tool->exists($id)) {
			throw new NotFoundException(__('Invalid tool'));
		}
		$options = array('conditions' => array('Tool.' . $this->Tool->primaryKey => $id));
		$this->set('tool', $this->Tool->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tool->create();
			if ($this->Tool->save($this->request->data)) {
				$this->Session->setFlash(__('The tool has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tool could not be saved. Please, try again.'));
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
		if (!$this->Tool->exists($id)) {
			throw new NotFoundException(__('Invalid tool'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tool->save($this->request->data)) {
				$this->Session->setFlash(__('The tool has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tool could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tool.' . $this->Tool->primaryKey => $id));
			$this->request->data = $this->Tool->find('first', $options);
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
		$this->Tool->id = $id;
		if (!$this->Tool->exists()) {
			throw new NotFoundException(__('Invalid tool'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Tool->delete()) {
			$this->Session->setFlash(__('The tool has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tool could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

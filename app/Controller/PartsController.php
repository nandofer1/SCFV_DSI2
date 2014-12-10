<?php
App::uses('AppController', 'Controller');
/**
 * Parts Controller
 *
 * @property Part $Part
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PartsController extends AppController {

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
		$this->Part->recursive = 0;
		$this->set('parts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Part->exists($id)) {
			throw new NotFoundException(__('Invalid part'));
		}
		$options = array('conditions' => array('Part.' . $this->Part->primaryKey => $id));
		$this->set('part', $this->Part->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Part->create();
			if ($this->Part->save($this->request->data)) {
				$this->Session->setFlash(__('The part has been saved.'), 'flash_notification');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The part could not be saved. Please, try again.'), 'flash_notification');
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
		if (!$this->Part->exists($id)) {
			throw new NotFoundException(__('Invalid part'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Part->save($this->request->data)) {
				$this->Session->setFlash(__('The part has been saved.'), 'flash_notification');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The part could not be saved. Please, try again.'), 'flash_notification');
			}
		} else {
			$options = array('conditions' => array('Part.' . $this->Part->primaryKey => $id));
			$this->request->data = $this->Part->find('first', $options);
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
		$this->Part->id = $id;
		if (!$this->Part->exists()) {
			throw new NotFoundException(__('Invalid part'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Part->delete()) {
			$this->Session->setFlash(__('The part has been deleted.'), 'flash_notification');
		} else {
			$this->Session->setFlash(__('The part could not be deleted. Please, try again.'), 'flash_notification');
		}
		return $this->redirect(array('action' => 'index'));
	}
}

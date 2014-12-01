<?php
App::uses('AppController', 'Controller');
/**
 * Fuelvouchers Controller
 *
 * @property Fuelvoucher $Fuelvoucher
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FuelvouchersController extends AppController {

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
		$this->Fuelvoucher->recursive = 0;
		$this->set('fuelvouchers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Fuelvoucher->exists($id)) {
			throw new NotFoundException(__('Invalid fuelvoucher'));
		}
		$options = array('conditions' => array('Fuelvoucher.' . $this->Fuelvoucher->primaryKey => $id));
		$this->set('fuelvoucher', $this->Fuelvoucher->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Fuelvoucher->create();
			if ($this->Fuelvoucher->save($this->request->data)) {
				$this->Session->setFlash(__('The fuelvoucher has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fuelvoucher could not be saved. Please, try again.'));
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
		if (!$this->Fuelvoucher->exists($id)) {
			throw new NotFoundException(__('Invalid fuelvoucher'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Fuelvoucher->save($this->request->data)) {
				$this->Session->setFlash(__('The fuelvoucher has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fuelvoucher could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Fuelvoucher.' . $this->Fuelvoucher->primaryKey => $id));
			$this->request->data = $this->Fuelvoucher->find('first', $options);
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
		$this->Fuelvoucher->id = $id;
		if (!$this->Fuelvoucher->exists()) {
			throw new NotFoundException(__('Invalid fuelvoucher'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Fuelvoucher->delete()) {
			$this->Session->setFlash(__('The fuelvoucher has been deleted.'));
		} else {
			$this->Session->setFlash(__('The fuelvoucher could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

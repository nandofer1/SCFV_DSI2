<?php
App::uses('AppController', 'Controller');
/**
 * Dossiers Controller
 *
 * @property Dossier $Dossier
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DossiersController extends AppController {

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
		$this->Dossier->recursive = 0;
		$this->set('dossiers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
            $this->loadModel('Trip'); 
         $ultimo= $this->Trip->find('all',array(
    
    'fields'=>array('Trip.dossier_id','Trip.id'),
    'conditions'=>array('Trip.dossier_id' =>$id),
     'order'=>'Trip.id DESC'        
             
             ));
         $this->set('Ultimo',$ultimo);
		if (!$this->Dossier->exists($id)) {
			throw new NotFoundException(__('Invalid dossier'));
		}
		$options = array('conditions' => array('Dossier.' . $this->Dossier->primaryKey => $id));
		$this->set('dossier', $this->Dossier->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Dossier->create();
			if ($this->Dossier->save($this->request->data)) {
				$this->Session->setFlash(__('The dossier has been saved.'), 'flash_notification');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dossier could not be saved. Please, try again.'), 'flash_notification');
			}
		}
		$vehicles = $this->Dossier->Vehicle->find('list');
		$this->set(compact('vehicles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Dossier->exists($id)) {
			throw new NotFoundException(__('Invalid dossier'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Dossier->save($this->request->data)) {
				$this->Session->setFlash(__('The dossier has been saved.'), 'flash_notification');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dossier could not be saved. Please, try again.'), 'flash_notification');
			}
		} else {
			$options = array('conditions' => array('Dossier.' . $this->Dossier->primaryKey => $id));
			$this->request->data = $this->Dossier->find('first', $options);
		}
		$vehicles = $this->Dossier->Vehicle->find('list');
		$this->set(compact('vehicles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Dossier->id = $id;
		if (!$this->Dossier->exists()) {
			throw new NotFoundException(__('Invalid dossier'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Dossier->delete()) {
			$this->Session->setFlash(__('The dossier has been deleted.'), 'flash_notification');
		} else {
			$this->Session->setFlash(__('The dossier could not be deleted. Please, try again.'), 'flash_notification');
		}
		return $this->redirect(array('action' => 'index'));
	}
}

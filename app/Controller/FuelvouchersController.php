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
				$this->Session->setFlash(__('The fuelvoucher has been saved.'), 'flash_notification');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fuelvoucher could not be saved. Please, try again.'), 'flash_notification');
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
				$this->Session->setFlash(__('The fuelvoucher has been saved.'), 'flash_notification');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fuelvoucher could not be saved. Please, try again.'), 'flash_notification');
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
			$this->Session->setFlash(__('The fuelvoucher has been deleted.'), 'flash_notification');
		} else {
			$this->Session->setFlash(__('The fuelvoucher could not be deleted. Please, try again.'), 'flash_notification');
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function Assign($id=null) {
            $this->Fuelvoucher->id = $id;
            
           $this->loadModel('Dossier'); 
           $exp=$this->Dossier->find('list', array(       
                  'fields' => array('Dossier.id', 'Dossier.vehicle_id'),
                  'conditions'=>array('Dossier.activo'=>1),
                  'order'=>'Dossier.vehicle_id'));
           $this->set('Expedientes',$exp);
           $this->set('id',$id);
           
             $this->loadModel('Voucher'); 
             if($this->request->is('post')): 
            $idexpediente=$this->request->data['Voucher']['dossier_id'];
      if($this->Voucher->Save($this->request->data)):
          
          $this->request->data=$this->Fuelvoucher->read();
      $this->request->data['Fuelvoucher']['gastado']=1;
      $this->Fuelvoucher->Save($this->request->data);
      
      $this->Dossier->id=$idexpediente;
      $this->request->data=$this->Dossier->read();
      $numerovales=$this->request->data['Dossier']['numero_vales'];
      $this->request->data['Dossier']['numero_vales']=$numerovales+1;
       $this->Dossier->Save($this->request->data);
      
      
          
           $this->Session->setFlash('Vale asignado a Vehiculo', 'flash_notification');
        $this->redirect(array('action'=>'index')); // nos regresa a la funcion index
        endif;
      endif;
	}
}

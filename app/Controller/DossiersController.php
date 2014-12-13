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
             $this->loadModel('Voucher'); 
         $ultimo= $this->Trip->find('list',array(
    
    'fields'=>array('Trip.dossier_id','Trip.id'),
    'conditions'=>array('Trip.dossier_id' =>$id),
     'order'=>'Trip.id ASC'        
             
             ));
         $this->set('Ultimo',$ultimo);
         
          $ultimovoucher=$this->Voucher->find('list',array(
    
    'fields'=>array('Voucher.dossier_id','Voucher.Fuelvoucher_id'),
    'conditions'=>array('Voucher.dossier_id' =>$id),
     'order'=>'Voucher.id ASC'    ));
          
          //ULTIMO VOUCHER
          $VU=array();
          $VU[0]=end($ultimovoucher);
          $this->set('UltimoV',$VU);
         
		if (!$this->Dossier->exists($id)) {
			throw new NotFoundException(__('Invalid dossier'));
		}
		$options = array('conditions' => array('Dossier.' . $this->Dossier->primaryKey => $id));
		$this->set('dossier', $this->Dossier->find('first', $options));
                
                //TRAEMOS LOS GALONES DE GASOLINA GASTADOS
                  $this->loadModel('Voucher');
      // $ngalones= $this->Voucher->field('sum(Voucher.galones) AS total', array('Voucher.dossier_id'=>$id));
         
                  
                   $vouchersusados= $this->Voucher->find('list',array(
                       'fields'=>array('Voucher.id','Voucher.fuelvoucher_id'),
                       'conditions'=>array('Voucher.dossier_id' =>$id)));
                   
                   $i=0;
                   $ngalones=0;
                   $monto=0;
                   $this->loadModel('Fuelvoucher');
                   while($i<count($vouchersusados))
                   {
                       $n=$this->Fuelvoucher->field('Fuelvoucher.galones', array('Fuelvoucher.id'=>key($vouchersusados)));
                       $m=$this->Fuelvoucher->field('Fuelvoucher.monto', array('Fuelvoucher.id'=>key($vouchersusados)));
                       $ngalones= $ngalones+$n;
                       $monto=$monto+$m;
                       next($vouchersusados);
                       $i=$i+1;
                   }
                  
       $kilometraje=$this->Dossier->field('Dossier.kilometraje', array('Dossier.id'=>$id));
       $galoneskm=array();
       $galoneskm[0]=$ngalones;
       $galoneskm[1]=$kilometraje;
       $galoneskm[2]=$monto;
       
       $this->set('datos',$galoneskm);
            
       
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
        
        public function Trip($id=null) {
         $this->loadModel('Trip'); 
		 //$this->redirect('Trips/details/',$id);
        
	}
        
          
}

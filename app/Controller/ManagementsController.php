<?php
class ManagementsController extends AppController {
  public $helpers = array('Html', 'Form'); // helper para hacer formularios
  public $components = array('Session');
  
  public function index() {
    /*$this->loadModel('Unit'); //cargamos el modelo Unidad
    $this->set('Unidades',$this->Unit->find('list', array('fields' => array('Unit.id', 'Unit.unidad'))));*/
    $this->set('Gerencias', $this->Management->find('all'));
  }
  //Funcion Agregar
  public function add() {
    $this->loadModel('Unit'); //cargamos el modelo Unidad
    $this->set('Unidades', $this->Unit->find('list', array(
      'fields' => array(
        'Unit.id',
        'Unit.unidad'
      )
    )));
    
    
    if ($this->request->is('post')): // si la consulta es de tipo post
      
    // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
      if ($this->Management->Save($this->request->data)):
      //Bitacora
        $logbook = new Logbook();
        $logbook->add("Gerencia Agregada", serialize($this->request->data));
        
        $this->Session->setFlash('Gerencia Guardada', 'flash_notification');
        $this->redirect(array(
          'action' => 'index'
        )); // nos regresa a la funcion index
      endif;
    endif;
    
  }
  
  
  public function edit($id = null) {
    if ($id == null) {
      $this->redirect(array(
        'action' => 'index'
      ));
      return;
    }
    $this->loadModel('Unit'); //cargamos el modelo Unidad
    
    $this->set('Unidades', $this->Unit->find('list', array(
      'fields' => array(
        'Unit.id',
        'Unit.unidad'
      )
    )));
    
    
    $this->Management->id = $id;
    if ($this->request->is('get')):
      $this->request->data = $this->Management->read();
    else: //si la peteicion no es get
      $data = $this->Management->findById($id);
      if ($this->Management->save($this->request->data)):
      //Bitacora
        $logbook = new Logbook();
        $logbook->add("Gerencia Modificada", serialize($data));
        
        $this->Session->setFlash('Gerencia Modificada', 'flash_notification');
        $this->redirect(array(
          'action' => 'index'
        ));
      else:
        $this->Session->setFlash('No se pudo Modificar la Gerencia', 'flash_notification');
      endif;
    endif;
    
  }
  
  
  public function delete($id) {
    if ($this->request->is('get')):
      $this->redirect(array(
        'action' => 'index'
      ));
    //throw new MethodNotAllowedException();//para que en la url no le agreguen un dato para borrar por get
    else:
      $data = $this->Management->findById($id);
      if ($this->Management->delete($id)):
      //Bitacora
        $logbook = new Logbook();
        $logbook->add("Gerencia Eliminada", serialize($data));
        
        $this->Session->setFlash("Gerencia  Eliminada", 'flash_notification');
        $this->redirect(array(
          'action' => 'index'
        ));
      endif;
    endif;
    
  }
}

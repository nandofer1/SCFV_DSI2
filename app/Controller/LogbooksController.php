<?php
App::uses('AppController', 'Controller');

class LogbooksController extends AppController {
  public $components = array('Paginator');

  public function index() {
    $this->Paginator->settings = array(
      'fields' => array('Logbook.id', 'Logbook.user_id', 'Logbook.created', 'Logbook.action', 'Logbook.data', 'User.username'), 
      'limit' => 10, 'order' => array('Logbook.id' => 'desc'),
    );
    $data = $this->Paginator->paginate('Logbook');
    $this->set('logbooks', $data);
  }

  public function ver($id = null) {
    if($id != null){
      $this->Logbook->id = $id;
      if (!$this->Logbook->exists()) {
        throw new NotFoundException(__('Bitacora invalida'));
      }
      $data = $this->Logbook->findById($id);
      $this->set('logbook', $data);
    }
    else{ //No se ha proporcionado un id

    }
  }  

}
?>

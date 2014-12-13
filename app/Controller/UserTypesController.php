<?php
App::uses('AppController', 'Controller');

class UserTypesController extends AppController {
  public $components = array('Paginator');

  /*
  public function isAuthorized($user) {
    $tipo = $this->Session->read("tipo_usuario");
    if (in_array($this->action, array('index', 'ver', 'buscar', 'agregar', 'eliminar', 'editar'))) {
      if($tipo == 1){//Cambiar por el id del tipo de usuario que puede realizar estas acciones ↑
        return true;
      }
    }
     //Si no se autorizo, ahora se niega. (i.e. no somos Administrador del Sistema)
    $this->Session->setFlash("Ud. no tiene autorizacion para realizar esta accion.", 'flash_notification');
    return $this->redirect("/");
    return false;
  }
  */


  public function logout() {
    return $this->redirect($this->Auth->logout());
  }

  public function index() {
    $this->Paginator->settings = array(
      'fields' => array('UserType.id', 'UserType.tipo_usuario'), 'limit' => 5, 'order' => array('UserType.id' => 'desc')
    );
    $data = $this->Paginator->paginate('UserType');
    $this->set('tipo_usuarios', $data);
  }
  
  public function ver($id = null) {
    if($id != null){
      $this->UserType->id = $id;
      if (!$this->UserType->exists()) {
        throw new NotFoundException(__('Tipo de Usuario invalido'));
      }
      $data = $this->UserType->findById($id);
      $this->set('tipo_usuario', $data);      
    }
    else{ //No se ha proporcionado un id

    }
  }  

  public function buscar(){
    $this->Paginator->settings = array(
      'fields' => array('UserType.id', 'UserType.tipo_usuario'), 'limit' => 5, 'order' => array('User.id' => 'desc')
    );
    $field = "{$this->request->data['UserType']['campo']} LIKE ";
    $data = $this->Paginator->paginate('UserType', array("{$field}" => "%{$this->request->data['UserType']['query']}%"));
    $this->set('tipo_usuarios', $data);
    $this->set('query', $this->request->data['UserType']['query']);
    $this->set('campo', $this->request->data['UserType']['campo']);
    $this->render('index');
  }

  public function agregar() {
    if ($this->request->is('post')) {
      $this->UserType->create();
      if ($this->UserType->save($this->request->data)) {
        //Bitacora
        $logbook = new Logbook();
        $logbook->add("Tipo de Usuario Agregado", serialize($this->request->data));

        $this->Session->setFlash("El tipo de usuario se ha agregado al sistema.", 'flash_notification');
        $this->redirect('/UserTypes/index');
        return;
      }
      $this->Session->setFlash(__('El tipo de usuario no ha podido ser guardado por favor intente de nuevo.'), 'flash_notification');
    }
  }

  public function editar($id = null) {
    if($id != null){
      $this->UserType->id = $id;
      if (!$this->UserType->exists()) {
        throw new NotFoundException(__('Tipo de Usuario invalido'));
      }
      if ($this->request->is('post') || $this->request->is('put')) {
        $data = $this->UserType->findById($id);
        if ($this->UserType->save($this->request->data)) {
          //Bitacora
          $logbook = new Logbook();
          $logbook->add("Tipo de Usuario Modificado", serialize($data));

          $this->Session->setFlash(__('El Tipo de Usuario ha sido guardado'), 'flash_notification');
          return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El Tipo de Usuario no pudo ser guardado. Por favor intente de nuevo.'), 'flash_notification');
      }
      else{
        $this->request->data = $this->UserType->read(null, $id);
        unset($this->request->data['UserType']['password']);
      }
    }
    else{ //No se ha proporcionado un id
      $this->index();
      $this->render('index');
    }
  }

  public function eliminar($id = null) {
    $this->UserType->id = $id;
    if($id){
      if (!$this->UserType->exists()) {
        throw new NotFoundException(__('Tipo de Usuario invalido'));
      }
      $data = $this->UserType->findById($id);
      if ($this->UserType->delete()) {
        //Bitacora
        $logbook = new Logbook();
        $logbook->add("Tipo de Usuario Eliminado", serialize($data));

        $this->Session->setFlash(__('Tipo de Usuario borrado'), 'flash_notification');
        $this->redirect(array('action' => 'index'));
        return ;
      }
      $this->Session->setFlash(__('Tipo de Usuario no fue borrado'), 'flash_notification');
      return $this->redirect(array('action' => 'index'));
    }
    else{ //No se ha proporcionado un id
      $this->index();
      $this->render('index');
    }
  }
}
?>

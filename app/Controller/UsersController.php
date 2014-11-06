<?php
App::uses('AppController', 'Controller');
App::uses('UserType', 'Model');

class UsersController extends AppController {
  public $components = array('Paginator');

  public function beforeFilter() {
    parent::beforeFilter();

    $this->Auth->allow('logout'); // Allow Usuarios to logout.
  }

  public function login() {
    $this->layout = false;
    if ($this->request->is('post')) {
      if ($this->Auth->login()) {
        $this->Session->write('username', $this->request->data['User']['username']);
        return $this->redirect($this->Auth->redirect());
      }
      $this->Session->setFlash(__('Usuario o Password invalido por favor intente de nuevo'), 'flash_notification');
    }
  }

  public function logout() {
    $this->Auth->logout();
    return $this->redirect("/users/login");
  }

  public function index() {
    $this->Paginator->settings = array(
      'fields' => array('User.id', 'User.username', 'User.tipo_usuario', 'User.correo'), 'limit' => 5, 'order' => array('User.id' => 'desc'),
      'User' => array(), 'UserType'=>array()
    );
    $data = $this->Paginator->paginate('User');
    $this->set('usuarios', $data);
  }
  
  public function ver($id = null) {
    if($id != null){
      $this->User->id = $id;
      if (!$this->User->exists()) {
        throw new NotFoundException(__('Usuario invalido'));
      }
      $data = $this->User->findById($id);
      $this->set('usuario', $data);      
    }
    else{ //No se ha proporcionado un id

    }
  }  

  public function buscar(){
    $this->Paginator->settings = array(
      'fields' => array('User.id', 'User.username', 'User.tipo_usuario', 'User.correo'), 'limit' => 5, 'order' => array('User.id' => 'desc'),
      'User' => array(), 'TypeUser'=>array()
    );
    $field = "{$this->request->data['User']['campo']} LIKE ";
    $data = $this->Paginator->paginate('User', array("{$field}" => "%{$this->request->data['User']['query']}%"));
    $this->set('usuarios', $data);
    $this->set('query', $this->request->data['User']['query']);
    $this->set('campo', $this->request->data['User']['campo']);
    $this->render('index');    
  }

  public function agregar() {
    $TipoUsuario = new UserType();
    $tipo_usuario = $TipoUsuario->find('list', array('fields' => array('UserType.id', 'UserType.tipo_usuario')));
    $this->set(compact('tipo_usuario'));

    if ($this->request->is('post')) {
      $this->User->create();
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash("El usuario se ha agregado al sistema.", 'flash_notification');
        $this->redirect('/users/index');
        return;
      }
      $this->Session->setFlash(__('El usuario no ha podido ser guardado por favor intente de nuevo.'), 'flash_notification');
    }
  }

  public function editar($id = null) {
    $TipoUsuario = new UserType();
    $tipo_usuario = $TipoUsuario->find('list', array('fields' => array('UserType.id', 'UserType.tipo_usuario')));
    $this->set(compact('tipo_usuario'));
    
    if($id != null){
      $this->User->id = $id;
      if (!$this->User->exists()) {
        throw new NotFoundException(__('Usuario invalido'));
      }
      if ($this->request->is('post') || $this->request->is('put')) {
        if ($this->User->save($this->request->data)) {
          $this->Session->setFlash(__('El Usuario ha sido guardado'), 'flash_notification');
          return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('El Usuario no pudo ser guardado. Por favor intente de nuevo.'), 'flash_notification');
      }
      else{
        $this->request->data = $this->User->read(null, $id);
        unset($this->request->data['User']['password']);
      }
    }
    else{ //No se ha proporcionado un id
      $this->index();
      $this->render('index');
    }
  }

  public function eliminar($id = null) {
    $this->User->id = $id;
    if($id){
      if (!$this->User->exists()) {
        throw new NotFoundException(__('Usuario invalido'));
      }
      if ($this->User->delete()) {
        $this->Session->setFlash(__('Usuario borrado'), 'flash_notification');
        $this->redirect(array('action' => 'index'));
        return ;
      }
      $this->Session->setFlash(__('Usuario no fue borrado'), 'flash_notification');
      return $this->redirect(array('action' => 'index'));
    }
    else{ //No se ha proporcionado un id
      $this->index();
      $this->render('index');
    }
  }
}
?>

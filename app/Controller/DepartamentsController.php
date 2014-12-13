<?php
class DepartamentsController extends AppController {
  public $helpers = array('Html', 'Form'); // helper para hacer formularios
  public $components = array('Session');
  
    /*
  public function isAuthorized($user) {
    $tipo = $this->Session->read("tipo_usuario");
    if (in_array($this->action, array('index', 'add', 'edit', 'delete'))) {
      if($tipo == 1){//Cambiar por el id del tipo de usuario que puede realizar estas acciones ↑
        return true;
      }
    }
     //Si no se autorizo, ahora se niega. (i.e. no somos Administrador del Sistema)
    $this->Session->setFlash("Ud. no tiene autorizacion para realizar esta accion.", 'flash_notification');
    return $this->redirect("/");
    return false;
  }*/
  
  public function index() {
    //para mostrar los estudiantes en el index
    // ORM query explicito
    $this->set('Departamentos', $this->Departament->find('all'));
  }
  //Funcion Agregar
  public function add() {
    $this->loadModel('Management'); //cargamos el modelo Gerencia
    $this->set('Gerencias', $this->Management->find('list', array(
      'fields' => array(
        'Management.id',
        'Management.gerencia'
      )
    )));
    if ($this->request->is('post')): // si la consulta es de tipo post
      
    // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
      if ($this->Departament->Save($this->request->data)):
      //Bitacora
        $logbook = new Logbook();
        $logbook->add("Departamento Agregado", serialize($this->request->data));

        $this->Session->setFlash('Departamento Guardado', 'flash_notification');
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
    $this->loadModel('Management'); //cargamos el modelo Gerencia
    $this->set('Gerencias', $this->Management->find('list', array(
      'fields' => array(
        'Management.id',
        'Management.gerencia'
      )
    )));
    $this->Departament->id = $id;
    if ($this->request->is('get')):
      $this->request->data = $this->Departament->read();
    else: //si la peteicion no es get
      $data = $this->Departament->findById($id);
      if ($this->Departament->save($this->request->data)):
      //Bitacora
        $logbook = new Logbook();
        $logbook->add("Departamento Modificado", serialize($data));

        $this->Session->setFlash('Departamento Modificado', 'flash_notification');
        $this->redirect(array(
          'action' => 'index'
        ));
      else:
        $this->Session->setFlash('No se pudo Modificar el Departamento', 'flash_notification');
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
      $data = $this->Departament->findById($id);
      if ($this->Departament->delete($id)):
      //Bitacora
        $logbook = new Logbook();
        $logbook->add("Departamento Eliminado", serialize($data));

        $this->Session->setFlash("Departamento  Eliminado", 'flash_notification');
        $this->redirect(array(
          'action' => 'index'
        ));
      endif;
    endif;
  }
}

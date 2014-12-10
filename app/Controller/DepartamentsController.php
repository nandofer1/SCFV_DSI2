<?php
class DepartamentsController extends AppController {
  public $helpers = array('Html', 'Form'); // helper para hacer formularios
  public $components = array('Session');
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

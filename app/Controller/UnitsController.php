<?php
class UnitsController extends AppController
{
public $helpers=array('Html','Form'); // helper para hacer formularios
public $components = array('Paginator');

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
  }
  */
  

public function index()
{
    $this->Paginator->settings = array(
      'fields' => array('Unit.id', 'Unit.unidad', 'Unit.descripcion'), 'limit' => 5, 'order' => array('Unit.id' => 'desc')
    );
    $data = $this->Paginator->paginate('Unit');
    $this->set('Unidad', $data);
}

public function add()
{
    if($this->request->is('post')): // si la consulta es de tipo post
        // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
        if($this->Unit->Save($this->request->data)):
            //Bitacora
            $logbook = new Logbook();
            $logbook->add("Unidad Agregada", serialize($this->request->data));

            $this->Session->setFlash('Unidad Guardada', 'flash_notification');
            $this->redirect(array('action'=>'index')); // nos regresa a la funcion index
        endif;
    endif;
}


public function edit($id=null)
{
    if($id==null){
        $this->redirect(array('action'=>'index'));
        return;
    }
    $this->Unit->id=$id;
    if($this->request->is('get')):
        $this->request->data=$this->Unit->read();
    else: //si la peteicion no es get
        $data = $this->Unit->findById($id);
        if($this->Unit->save($this->request->data)):
            //Bitacora
            $logbook = new Logbook();
            $logbook->add("Unidad Modificada", serialize($data));

            $this->Session->setFlash('Unidad Modificada', 'flash_notification');
            $this->redirect(array('action'=>'index'));
            else:
                $this->Session->setFlash('No se pudo Modificar la Unidad', 'flash_notification');
        endif;
    endif;
}

public function delete($id){
    if($this->request->is('get')):
        $this->redirect(array('action'=>'index'));
        //throw new MethodNotAllowedException();//para que en la url no le agreguen un dato para borrar por get
    else:
        $data = $this->Unit->findById($id);
        if($this->Unit->delete($id)):
            //Bitacora
            $logbook = new Logbook();
            $logbook->add("Unidad Eliminada", serialize($data));

            $this->Session->setFlash("Unidad  Eliminada", 'flash_notification');
        $this->redirect(array('action'=>'index'));
        endif;


    endif;
    
        }
}

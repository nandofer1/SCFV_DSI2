<?php
class UnitsController extends AppController
{
public $helpers=array('Html','Form'); // helper para hacer formularios
public $components = array('Paginator');

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
        if($this->Unit->save($this->request->data)):
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
        if($this->Unit->delete($id)):
            $this->Session->setFlash("Unidad  Eliminada", 'flash_notification');
        $this->redirect(array('action'=>'index'));
        endif;


    endif;
    
        }
}

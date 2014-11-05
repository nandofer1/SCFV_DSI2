<?php
class UnitsController extends AppController
{
public $helpers=array('Html','Form'); // helper para hacer formularios
public $components=array('Session');

public function index()
{
    //para mostrar los estudiantes en el index
    // ORM query explicito
   
$this->set('Unidades',$this->Unit->find('all'));

}
//Funcion Agregar
public function add()
{
if($this->request->is('post')): // si la consulta es de tipo post
    // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
    
    if($this->Unit->Save($this->request->data)): 
        $this->Session->setFlash('Unidad Guardada');
        $this->redirect(array('action'=>'index')); // nos regresa a la funcion index
        
    endif;
  
endif;

}


public function edit($id=null)
{
    
    
    $this->Unit->id=$id;
    if($this->request->is('get')):
        
        $this->request->data=$this->Unit->read();
    
    else: //si la peteicion no es get
        
        if($this->Unit->save($this->request->data)):
            $this->Session->setFlash('Unidad Modificada');
            $this->redirect(array('action'=>'index'));
            else:
                $this->Session->setFlash('No se pudo Modificar la Unidad');
            
        endif;
        
    endif;
    
}

public function delete($id)
        {
    if($this->request->is('get')):
        throw new MethodNotAllowedException();//para que en la url no le agreguen un dato para borrar por get
    else:
        if($this->Unit->delete($id)):
            $this->Session->setFlash("Unidad  Eliminada");
        $this->redirect(array('action'=>'index'));
        endif;


    endif;
    
        }
}
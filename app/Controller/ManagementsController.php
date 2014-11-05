<?php
class ManagementsController extends AppController
{
public $helpers=array('Html','Form'); // helper para hacer formularios
public $components=array('Session');

public function index()
{
   
    // ORM query explicito
   
$this->set('Gerencias',$this->Management->find('all'));

}
//Funcion Agregar
public function add()
{
$this->loadModel('Unit'); //cargamos el modelo Unidad

$this->set('Unidades',$this->Unit->find('list', array(       
                  'fields' => array('Unit.id', 'Unit.unidad')
            )));


if($this->request->is('post')): // si la consulta es de tipo post
    // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
    
    if($this->Management->Save($this->request->data)): 
        $this->Session->setFlash('Gerencia Guardada');
        $this->redirect(array('action'=>'index')); // nos regresa a la funcion index
        
    endif;
  
endif;

}


public function edit($id=null)
{
    $this->loadModel('Unit'); //cargamos el modelo Unidad

$this->set('Unidades',$this->Unit->find('list', array(       
                  'fields' => array('Unit.id', 'Unit.unidad')
            )));
    
    
    $this->Management->id=$id;
    if($this->request->is('get')):
        
        $this->request->data=$this->Management->read();
    
    else: //si la peteicion no es get
        
        if($this->Management->save($this->request->data)):
            $this->Session->setFlash('Departamento Modificado');
            $this->redirect(array('action'=>'index'));
            else:
                $this->Session->setFlash('No se pudo Modificar el Departamento');
            
        endif;
        
    endif;
    
}


public function delete($id)
        {
    if($this->request->is('get')):
        throw new MethodNotAllowedException();//para que en la url no le agreguen un dato para borrar por get
    else:
        if($this->Management->delete($id)):
            $this->Session->setFlash("Gerencia  Eliminada");
        $this->redirect(array('action'=>'index'));
        endif;


    endif;
    
        }
}
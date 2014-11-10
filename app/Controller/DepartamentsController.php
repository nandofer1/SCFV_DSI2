<?php
class DepartamentsController extends AppController
{
public $helpers=array('Html','Form'); // helper para hacer formularios
public $components=array('Session');

public function index()
{
    //para mostrar los estudiantes en el index
    // ORM query explicito
   
$this->set('Departamentos',$this->Departament->find('all'));

}
//Funcion Agregar
public function add()
{
$this->loadModel('Management'); //cargamos el modelo Gerencia

$this->set('Gerencias',$this->Management->find('list', array(       
                  'fields' => array('Management.id', 'Management.gerencia')
            )));


if($this->request->is('post')): // si la consulta es de tipo post
    // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
    
    if($this->Departament->Save($this->request->data)): 
        $this->Session->setFlash('Departamento Guardado');
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
    $this->loadModel('Management'); //cargamos el modelo Gerencia

$this->set('Gerencias',$this->Management->find('list', array(       
                  'fields' => array('Management.id', 'Management.gerencia')
            )));
    
    
    $this->Departament->id=$id;
    if($this->request->is('get')):
        
        $this->request->data=$this->Departament->read();
    
    else: //si la peteicion no es get
        
        if($this->Departament->save($this->request->data)):
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
        $this->redirect(array('action'=>'index'));
        //throw new MethodNotAllowedException();//para que en la url no le agreguen un dato para borrar por get
    else:
        if($this->Departament->delete($id)):
            $this->Session->setFlash("Departamento  Eliminado");
        $this->redirect(array('action'=>'index'));
        endif;


    endif;
    
        }
}

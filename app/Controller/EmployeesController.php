<?php
class EmployeesController extends AppController
{
public $helpers=array('Html','Form'); // helper para hacer formularios
public $components=array('Session');
public $paginate=array(
    'limit'=>5,
    'order'=>array('Employee.id'=>'asc')
);

public function index()
{
    //para mostrar los estudiantes en el index
    // ORM query explicito
   
//$this->set('Empleados',$this->Employee->find('all'));
$this->Employee->recursive=0;
    $this->set('Empleados',$this->paginate());
}
//Funcion Agregar
public function add()
{
$this->loadModel('Departament'); //cargamos el modelo Departamento

$this->set('Departamentos',$this->Departament->find('list', array(       
                  'fields' => array('Departament.id', 'Departament.departamento')
            )));


if($this->request->is('post')): // si la consulta es de tipo post
    // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
    
    if($this->Employee->Save($this->request->data)): 
        $this->Session->setFlash('Empleado Guardado');
        $this->redirect(array('action'=>'index')); // nos regresa a la funcion index
        
    endif;
  
endif;

}


public function edit($id=null)
{
    $this->loadModel('Departament'); //cargamos el modelo Departamento

$this->set('Departamentos',$this->Departament->find('list', array(       
                  'fields' => array('Departament.id', 'Departament.departamento')
            )));
    
    
    $this->Employee->id=$id;
    if($this->request->is('get')):
        
        $this->request->data=$this->Employee->read();
    
    else: //si la peteicion no es get
        
        if($this->Employee->save($this->request->data)):
            $this->Session->setFlash('Empleado Modificado');
            $this->redirect(array('action'=>'index'));
            else:
                $this->Session->setFlash('No se pudo Modificar el Empleado');
            
        endif;
        
    endif;
    
}

public function delete($id)
        {
    if($this->request->is('get')):
        throw new MethodNotAllowedException();//para que en la url no le agreguen un dato para borrar por get
    else:
        if($this->Employee->delete($id)):
            $this->Session->setFlash("Empleado Eliminado");
        $this->redirect(array('action'=>'index'));
        endif;


    endif;
    
        }
}
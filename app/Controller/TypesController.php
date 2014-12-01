<?php
class TypesController extends AppController
{
public $helpers=array('Html','Form'); // helper para hacer formularios
public $components=array('Session');

public function index()
{
    //para mostrar los estudiantes en el index
    // ORM query explicito
    //Estudiantes el arreglo que se envia y lo recorremos desde el index
$this->set('Tipos',$this->Type->find('all'));
}
//Funcion Agregar
public function add()
{
if($this->request->is('post')): // si la consulta es de tipo post
    // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
    if($this->Type->Save($this->request->data)): 
        $this->Session->setFlash('Tipo de Vehículo Guardado');
    $this->redirect(array('action'=>'index')); // nos regresa a la funcion index
        
    endif;
   
endif;

}

public function edit($id=null)
{
    
    
    $this->Type->id=$id;
    if($this->request->is('get')):
        
        $this->request->data=$this->Type->read();
    
    else: //si la peteicion no es get
        
        if($this->Type->save($this->request->data)):
            $this->Session->setFlash('Tipo de Vehículo Modificado');
            $this->redirect(array('action'=>'index'));
            else:
                $this->Session->setFlash('No se pudo Modificar el tipo de Vehículo');
            
        endif;
        
    endif;
    
}

public function delete($id)
        {
    if($this->request->is('get')):
        throw new MethodNotAllowedException();//para que en la url no le agreguen un dato para borrar por get
    else:
        if($this->Type->delete($id)):
            $this->Session->setFlash("Tipo de vehículo   Eliminado");
        $this->redirect(array('action'=>'index'));
        endif;


    endif;
    
        }
}
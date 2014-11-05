<?php
class BrandsController extends AppController
{
public $helpers=array('Html','Form'); // helper para hacer formularios
public $components=array('Session');

public function index()
{
    //para mostrar los estudiantes en el index
    // ORM query explicito
    //Estudiantes el arreglo que se envia y lo recorremos desde el index
$this->set('Marcas',$this->Brand->find('all'));
}
//Funcion Agregar
public function add()
{
if($this->request->is('post')): // si la consulta es de tipo post
    // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
    if($this->Brand->Save($this->request->data)): 
       $this->Session->setFlash('Marca  Guardada');
   
        
    $this->redirect(array('action'=>'index')); // nos regresa a la funcion index
        
    endif;
   
endif;

}

public function edit($id=null)
{
    
    
    
    $this->Brand->id=$id;
    if($this->request->is('get')):

        $this->request->data=$this->Brand->read();
       
    else: //si la peteicion no es get
         
        if($this->Brand->save($this->request->data)):
            $this->Session->setFlash('Marca Modificada');
            $this->redirect(array('action'=>'index'));
            else:
                $this->Session->setFlash('No se pudo Modificar la marca');
            
        endif;
        
    endif;
    
}

public function delete($id)
        {
    if($this->request->is('get')):
        throw new MethodNotAllowedException();//para que en la url no le agreguen un dato para borrar por get
    else:
        if($this->Brand->delete($id)):
            $this->Session->setFlash("Marca de Vehículo Eliminada");
        $this->redirect(array('action'=>'index'));
        endif;


    endif;
    
        }
}
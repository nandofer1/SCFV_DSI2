<?php
class ModellsController extends AppController
{
public $helpers=array('Html','Form'); // helper para hacer formularios
public $components=array('Session');

public function index()
{
    //para mostrar los estudiantes en el index
    // ORM query explicito
    //Estudiantes el arreglo que se envia y lo recorremos desde el index
$this->set('Modelos',$this->Modell->find('all'));


}
//Funcion Agregar
public function add()
{
    
    //llenar el combobox de las marcas
$this->loadModel('Brand'); //cargamos el modelo

  $this->set('Marcas',$this->Brand->find('list', array(       
                  'fields' => array('Brand.id', 'Brand.marca')
            )));
if($this->request->is('post')): // si la consulta es de tipo post
    // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
    
    if($this->Modell->Save($this->request->data)): 
        $this->Session->setFlash('Modelo de Vehículo  Guardado');
    
    $this->redirect(array('action'=>'index')); // nos regresa a la funcion index
        
    endif;
   
endif;

}


public function edit($id=null)
{
    $this->loadModel('Brand'); //cargamos el modelo Unidad

$this->set('Marcas',$this->Brand->find('list', array(       
                  'fields' => array('Brand.id', 'Brand.marca')
            )));
    
    
    $this->Modell->id=$id;
    if($this->request->is('get')):
        
        $this->request->data=$this->Modell->read();
    
    else: //si la peteicion no es get
        
        if($this->Modell->save($this->request->data)):
            $this->Session->setFlash('Modelo de Vehículo Modificado');
            $this->redirect(array('action'=>'index'));
            else:
                $this->Session->setFlash('No se pudo Modificar el modelo de Vehículo');
            
        endif;
        
    endif;
    
}

public function delete($id)
        {
    if($this->request->is('get')):
        throw new MethodNotAllowedException();//para que en la url no le agreguen un dato para borrar por get
    else:
        if($this->Modell->delete($id)):
            $this->Session->setFlash("Modelo de Vehículo Eliminado");
        $this->redirect(array('action'=>'index'));
        endif;


    endif;
    
        }
}
<?php
class ToolsController extends AppController
{
public $helpers=array('Html','Form'); // helper para hacer formularios
public $components=array('Session');
public $paginate=array(
    'limit'=>5,
    'order'=>array('Tool.id'=>'asc')
);
public function index()
{
    //para mostrar las Herramientas en el index
    // ORM query explicito
$this->Tool->recursive=-1;
$this->set('Herramientas',$this->paginate());
}
//Funcion Agregar
public function add()
{
if($this->request->is('post')): // si la consulta es de tipo post
    // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
    if($this->Tool->Save($this->request->data)): 
        $this->Session->setFlash('Herramienta  Guardada', 'flash_notification');
    $this->redirect(array('action'=>'index')); // nos regresa a la funcion index
        
    endif;
   
endif;
}
public function edit($id=null)
{
    
    
    $this->Tool->id=$id;
    if($this->request->is('get')):
        
        $this->request->data=$this->Tool->read();
    
    else: //si la peteicion no es get
        
        if($this->Tool->save($this->request->data)):
            $this->Session->setFlash('Herramienta Modificada', 'flash_notification');
            $this->redirect(array('action'=>'index'));
            else:
                $this->Session->setFlash('No se pudo Modificar la herramienta', 'flash_notification');
            
        endif;
        
    endif;
    
}
public function delete($id)
        {
    if($this->request->is('get')):
        throw new MethodNotAllowedException();//para que en la url no le agreguen un dato para borrar por get
    else:
        if($this->Tool->delete($id)):
            $this->Session->setFlash("Herramienta  Eliminada", 'flash_notification');
        $this->redirect(array('action'=>'index'));
        endif;
    endif;
    
        }
}

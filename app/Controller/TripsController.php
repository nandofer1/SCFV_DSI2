<?php
class TripsController extends AppController
{
public $helpers=array('Html','Form'); // helper para hacer formularios
public $components=array('Session');

public function index()
{
    //para mostrar los estudiantes en el index
    // ORM query explicito
    //Estudiantes el arreglo que se envia y lo recorremos desde el index
$this->set('Viajes',$this->Trip->find('all'));



}
//Funcion Agregar
public function add()
{
$this->loadModel('Dossier'); //cargamos el modelo Expediente

$this->set('Expedientes',$this->Dossier->find('list', array(       
                  'fields' => array('Dossier.id', 'Dossier.vehicle_id')
            )));

$this->loadModel('Employee'); //cargamos el modelo Expediente

$this->set('Empleados',$this->Employee->find('list', array(       
                  'fields' => array('Employee.id', 'Employee.apellidos','Employee.nombre')
            )));

if($this->request->is('post')): // si la consulta es de tipo post
    // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
    
    if($this->Trip->Save($this->request->data)): 
        
        

   


    
        $this->Session->setFlash('Salida de Vehículo Registrado');
    $this->redirect(array('action'=>'index')); // nos regresa a la funcion index
        
    endif;
 
endif;

}

public function edit($id=null)
{
    $this->loadModel('Dossier'); //cargamos el modelo Expediente

$this->set('Expedientes',$this->Dossier->find('list', array(       
                  'fields' => array('Dossier.id', 'Dossier.vehicle_id')
            )));

$this->loadModel('Employee'); //cargamos el modelo Expediente

$this->set('Empleados',$this->Employee->find('list', array(       
                  'fields' => array('Employee.id', 'Employee.apellidos','Employee.nombre')
            )));
    
    
    $this->Trip->id=$id;
    if($this->request->is('get')):
        
        $this->request->data=$this->Trip->read();
    
    else: //si la peteicion no es get
        
        if($this->Trip->save($this->request->data)):
            $this->Session->setFlash('Regreso de Camión Registrado ');
            $this->redirect(array('action'=>'index'));
            else:
                $this->Session->setFlash('No se pudo Registrar la entrada del viaje');
            
        endif;
        
    endif;
    
}

public function delete($id)
        {
    if($this->request->is('get')):
        throw new MethodNotAllowedException();//para que en la url no le agreguen un dato para borrar por get
    else:
        if($this->Trip->delete($id)):
            $this->Session->setFlash("Viaje Eliminado");
        $this->redirect(array('action'=>'index'));
        endif;


    endif;
    
        }
        
        

public function mod($id=null)
{
    $this->loadModel('Dossier'); //cargamos el modelo Expediente

$this->set('Expedientes',$this->Dossier->find('list', array(       
                  'fields' => array('Dossier.id', 'Dossier.vehicle_id')
            )));

$this->loadModel('Employee'); //cargamos el modelo Expediente

$this->set('Empleados',$this->Employee->find('list', array(       
                  'fields' => array('Employee.id', 'Employee.apellidos','Employee.nombre')
            )));
    
    
    $this->Trip->id=$id;
    if($this->request->is('get')):
        
        $this->request->data=$this->Trip->read();
    
    else: //si la peteicion no es get
        
        if($this->Trip->save($this->request->data)):
            $this->Session->setFlash('Modificación de viaje Realizado ');
            $this->redirect(array('action'=>'index'));
            else:
                $this->Session->setFlash('No se pudo Modificar los datos  del viaje');
            
        endif;
        
    endif;
    
}     

    public function find(){
     $this->set('Viajes',$this->paginate());
     
    $field = "{$this->request->data['Trip']['campo']} LIKE ";
    $data = $this->Paginator->paginate('Trip', array("{$field}" => "%{$this->request->data['Trip']['query']}%"));
    $this->set('Viajes', $data);
    $this->set('query', $this->request->data['Trip']['query']);
    $this->set('campo', $this->request->data['Trip']['campo']);
    $this->render('index');    
  }
}
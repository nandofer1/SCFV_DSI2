<?php
class VehiclesController extends AppController
{
public $helpers=array('Html','Form'); // helper para hacer formularios
public $components=array('Session','Paginator');
public $paginate=array(
    'limit'=>'5',
    'order'=>array('Vehicule.id'=>'asc')
);
public function index()
{
    //PAGINADO
    $this->Vehicle->recursive=0;
    $this->set('Vehiculos',$this->paginate());
    //para mostrar los estudiantes en el index
    // ORM query explicito
  



}
//Funcion Agregar
public function add()
{
$this->loadModel('Modell'); //cargamos el modelo Modelos
$this->loadModel('Type'); //cargamos el modelo
$this->set('Modelos',$this->Modell->find('list', array(       
                  'fields' => array('Modell.id', 'Modell.modelo')
            )));
$this->set('Tipos',$this->Type->find('list', array(       
                  'fields' => array('Type.id', 'Type.tipo')
            )));

if($this->request->is('post')): // si la consulta es de tipo post
    // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
    
    if($this->Vehicle->Save($this->request->data)): 
        
        //CREAMOS UN ARREGLO CON LO QUE SE HARA APERTURA DE EXPEDIENTE
$EXPEDIENTE=array('Dossier'=>array(
    
    'vehicle_id'=>$this->request->data['Vehicle']['id'],
    'fecha_ingreso'=>date('Y-m-d'),
    'kilometraje_actual'=>0,
    'kilometraje'=>0,
    'numero_viajes'=>0,
    'numero_mantenimientos'=>0,
    'numero_vales'=>0,
    'fecha_ult_mant'=>0,
    'prestable'=>FALSE,
    'observaciones'=>$this->request->data['Vehicle']['observacion']
    
    
    )); 
    //carmos el modelo de expediente y luego creamos el registro inicial para 
    //el expediente de el nuevo vehiculo
    $this->loadModel('Dossier');
    $this->Dossier->Save($EXPEDIENTE);


    
        $this->Session->setFlash('Vehículo Guardado');
    $this->redirect(array('action'=>'index')); // nos regresa a la funcion index
        
    endif;
  // pr($EXPEDIENTE);
endif;

}

public function edit($id=null)
{
    $this->loadModel('Modell'); //cargamos el modelo Modelos
$this->loadModel('Type'); //cargamos el modelo
$this->set('Modelos',$this->Modell->find('list', array(       
                  'fields' => array('Modell.id', 'Modell.modelo')
            )));
$this->set('Tipos',$this->Type->find('list', array(       
                  'fields' => array('Type.id', 'Type.tipo')
            )));
    
    
    $this->Vehicle->id=$id;
    if($this->request->is('get')):
        
        $this->request->data=$this->Vehicle->read();
    
    else: //si la peteicion no es get
        
        if($this->Vehicle->save($this->request->data)):
            $this->Session->setFlash('Vehículo Modificado');
            $this->redirect(array('action'=>'index'));
            else:
                $this->Session->setFlash('No se pudo Modificar el Vehículo');
            
        endif;
        
    endif;
    
}

public function delete($id)
        {
    if($this->request->is('get')):
        throw new MethodNotAllowedException();//para que en la url no le agreguen un dato para borrar por get
    else:
        if($this->Vehicle->delete($id)):
            $this->Session->setFlash("Vehículo  Eliminado");
        $this->redirect(array('action'=>'index'));
        endif;


    endif;
    
        }
        
        public function find(){
     $this->set('Vehiculos',$this->paginate());
     
    $field = "{$this->request->data['Vehicle']['campo']} LIKE ";
    $data = $this->Paginator->paginate('Vehicle', array("{$field}" => "%{$this->request->data['Vehicle']['query']}%"));
    $this->set('Vehiculos', $data);
    $this->set('query', $this->request->data['Vehicle']['query']);
    $this->set('campo', $this->request->data['Vehicle']['campo']);
    $this->render('index');    
  }
}
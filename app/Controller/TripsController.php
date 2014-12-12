<?php
class TripsController extends AppController
{
public $helpers=array('Html','Form'); // helper para hacer formularios
public $components=array('Session');

public $paginate=array(
    'limit' => 5,
    'order'=>array('Trip.id'=>'desc')
);

public function index()
{
   
    //para mostrar los estudiantes en el index
    // ORM query explicito
  
//PAGINADO
    $this->Trip->recursive=0;
    $this->set('Viajes',$this->paginate());



}
//Funcion Agregar
public function add()
{
$this->loadModel('Dossier'); //cargamos el modelo Expediente
$this->loadModel('Vehicle');
/*$this->set('Expedientes',$this->Dossier->find('list', array(       
                  'fields' => array('Dossier.id', 'Dossier.vehicle_id')
                 
    
            )));*/
  // AQUI EVITAMOS QUE CUANDO UN VEHICULO HA SALIDO NO SE PUEDA PODER SELECCIONAR HASTA QUE SE REGISTRE ENTRADA DE SU VIAJE
$exp=$this->Dossier->find('list', array(       
                  'fields' => array('Dossier.id', 'Dossier.vehicle_id'),
                  'conditions'=>array('Dossier.activo'=>1),
                  'order'=>'Dossier.vehicle_id'
    
    ));
$Veh=$this->Vehicle->find('list', array(       
                  'fields' => array('Vehicle.id', 'Vehicle.management_id'),
                  'order'=>'Vehicle.id'));
//AQUI CREAMOS UN ARREGLO CON EL ID DE EXPEDIENTE Y LAS PLACAS DE LOS VEHICULOS QUE SOLO PERTENECEN A LA  GERENCIA DE SERVICIOS
$j=0;
$Exp=array();
while ($j<count($Veh))
    {
    if($Veh[$exp[key($exp)]]==5):
        
           $Exp[key($exp)]=key($Veh);
           
    endif;
    next($Veh);
    next($exp);
    $j=$j+1;
    }
//$this->set('Prueba',$Exp);

$i=0;
while($i<count($Exp)){
   $viajes= $this->Trip->find('all',array('conditions'=>array('Trip.dossier_id' =>key($Exp),'Trip.fuera' =>1)));
   
  
   
            if((empty($viajes))==true):
               
                else:
                 unset($Exp[key($Exp)]);
            
            endif;
    next($Exp);
    $i=$i+1;
    
}
         // se asigna el arreglo ya depurado sin los vehiculos que ya estan en viaje
$this->set('Expedientes',$Exp);


$this->loadModel('Employee'); //cargamos el modelo Empleado
/*
$this->set('Empleados',$this->Employee->find('list', array(       
                  'fields' => array('Employee.id', 'Employee.apellidos','Employee.nombre')
            )));
 * 
 */

//VALIDAMOS PARA QUE CUANDO UN EMPLEADO SE ENCUENTRE EN VIAJE NO APAREZCA PARA SELECCIONAR MIENTRAS EL VIAJE DONDE SE ENCUENTRE NO FINALICE
$this->loadModel('Crew'); 
$viajes= $this->Trip->find('list',array(
    
    'fields'=>array('Trip.id','Trip.fuera'),
    'conditions'=>array('Trip.fuera' =>1)));

$Emp=$this->Employee->find('list', array(       
                  'fields' => array('Employee.id', 'Employee.apellidos')
            ));
$i=0;
$j=0;
while($i<count($viajes)){
   $tripulacion= $this->Crew->find('list',array(
       'fields'=>array('Crew.employee_id','Crew.trip_id'),
       'conditions'=>array('Crew.trip_id' =>key($viajes))));
    while ($j<count($tripulacion))
        {
       $empleado= key($tripulacion);
        unset($Emp[$empleado]);
         next($tripulacion);
          $j=$j+1;
        }
        $j=0;
   
    next($viajes);
    $i=$i+1;
    
}
         // se asigna el arreglo ya depurado sin los vehiculos que ya estan en viaje
$this->set('Empleados',$Emp);
$this->loadModel('Tool'); //cargamos el modelo Herramienta
$this->Tool->recursive=-1;
$this->set('Herramientas',$this->Tool->find('all'));

if($this->request->is('post')): // si la consulta es de tipo post
    // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
    
    if($this->Trip->Save($this->request->data)): 
    
        
        //Ingresamos Motorista con el viaje
        $motorista=$this->request->data['Trip']['motorista'];
    //Ultimo Viaje que se ingreso
     $idviaje=$this->Trip->id;
    
    $sql = "INSERT INTO crews VALUES('','".$idviaje."','".$motorista."',1);"; 
    $this->loadModel('Crew');
    $this->Crew->query($sql);
    
    //Ingresamos los empleados que van con el viaje
    for($i=0;$i<5;$i++)
    {
      $id="Dui";
      $id.=$i+1;
        
        $idempleado=$this->request->data['Trip'][$id];
        if($idempleado!=''):
             $sql = "INSERT INTO crews VALUES('','".$idviaje."','".$idempleado."',0);"; 
             $this->Crew->query($sql);
        endif;
    }
   
    //Ingresamos las Heramientas que se llevaron en el viaje
     for($j=0;$j<$this->request->data['Trip']['num_h'];$j++)
    {
    
        
        $idherramienta=$this->request->data['Trip'][$j];
        if($idherramienta!=0):
             $sql = "INSERT INTO cleaningtoolsuseds VALUES('','".$idviaje."','".$idherramienta."');"; 
             $this->loadModel('Cleaningtoolsused');
             $this->Cleaningtoolsused->query($sql);
        endif;
    }


    
        $this->Session->setFlash('Salida de Vehículo Registrado', 'flash_notification');
    $this->redirect(array('action'=>'index')); // nos regresa a la funcion index
        
    endif;
 
endif;

}

public function edit($id=null)
{
   $this->loadModel('Dossier'); //cargamos el modelo Expediente
$this->loadModel('Vehicle');
/*$this->set('Expedientes',$this->Dossier->find('list', array(       
                  'fields' => array('Dossier.id', 'Dossier.vehicle_id')
                 
    
            )));*/
  // AQUI EVITAMOS QUE CUANDO UN VEHICULO HA SALIDO NO SE PUEDA PODER SELECCIONAR HASTA QUE SE REGISTRE ENTRADA DE SU VIAJE
$exp=$this->Dossier->find('list', array(       
                  'fields' => array('Dossier.id', 'Dossier.vehicle_id'),
                  'conditions'=>array('Dossier.activo'=>1),
                  'order'=>'Dossier.vehicle_id'
    
    ));
$Veh=$this->Vehicle->find('list', array(       
                  'fields' => array('Vehicle.id', 'Vehicle.management_id'),
                  'order'=>'Vehicle.id'));
//AQUI CREAMOS UN ARREGLO CON EL ID DE EXPEDIENTE Y LAS PLACAS DE LOS VEHICULOS QUE SOLO PERTENECEN A LA  GERENCIA DE SERVICIOS
$j=0;
$Exp=array();
while ($j<count($Veh))
    {
    if($Veh[$exp[key($exp)]]==5):
        
           $Exp[key($exp)]=key($Veh);
           
    endif;
    next($Veh);
    next($exp);
    $j=$j+1;
    }
//$this->set('Prueba',$Exp);

$i=0;
while($i<count($Exp)){
   $viajes= $this->Trip->find('all',array('conditions'=>array('Trip.dossier_id' =>key($Exp),'Trip.fuera' =>1)));
   
  
   
            if((empty($viajes))==true):
               
                else:
                 unset($Exp[key($Exp)]);
            
            endif;
    next($Exp);
    $i=$i+1;
    
}
         // se asigna el arreglo ya depurado sin los vehiculos que ya estan en viaje
$this->set('Expedientes',$Exp);


$this->loadModel('Employee'); //cargamos el modelo Empleado
/*
$this->set('Empleados',$this->Employee->find('list', array(       
                  'fields' => array('Employee.id', 'Employee.apellidos','Employee.nombre')
            )));
 * 
 */

//VALIDAMOS PARA QUE CUANDO UN EMPLEADO SE ENCUENTRE EN VIAJE NO APAREZCA PARA SELECCIONAR MIENTRAS EL VIAJE DONDE SE ENCUENTRE NO FINALICE
$this->loadModel('Crew'); 
$viajes= $this->Trip->find('list',array(
    
    'fields'=>array('Trip.id','Trip.fuera'),
    'conditions'=>array('Trip.fuera' =>1)));

$Emp=$this->Employee->find('list', array(       
                  'fields' => array('Employee.id', 'Employee.apellidos')
            ));
$i=0;
$j=0;
while($i<count($viajes)){
   $tripulacion= $this->Crew->find('list',array(
       'fields'=>array('Crew.employee_id','Crew.trip_id'),
       'conditions'=>array('Crew.trip_id' =>key($viajes))));
    while ($j<count($tripulacion))
        {
       $empleado= key($tripulacion);
        unset($Emp[$empleado]);
         next($tripulacion);
          $j=$j+1;
        }
        $j=0;
   
    next($viajes);
    $i=$i+1;
    
}
         // se asigna el arreglo ya depurado sin los vehiculos que ya estan en viaje
$this->set('Empleados',$Emp);
$this->loadModel('Tool'); //cargamos el modelo Herramienta
$this->Tool->recursive=-1;
$this->set('Herramientas',$this->Tool->find('all'));
    
    $this->Trip->id=$id;
    if($this->request->is('get')):
        
        $this->request->data=$this->Trip->read();
    //DATOS QUE IRAN AL EXPDIENTE
   /* $kmi= $this->request->data['Trip']['kilometraje_inicial'];
    $kmf= $this->request->data['Trip']['kilometraje_final'];
    $kmr=$kmf-$kmi; //Km recorrido en el viaje
    $this->Dossier->id=$this->request->data['Trip']['dossier_id'];
  $this->data= $this->Dossier->read();
  $kilometraje=$this->Dossier['Dossier']['kilometraje'];
  $this->data['Dossier']['kilometraje']=$kilometraje + $kmr;
  $this->Dossier->save($this->data);
   */
    
    else: //si la peteicion no es get
        
        if($this->Trip->save($this->request->data)):
            
             //DATOS QUE IRAN AL EXPDIENTE
    $kmi= $this->request->data['Trip']['kilometraje_inicial'];
    $kmf= $this->request->data['Trip']['kilometraje_final'];
    $kmr=$kmf-$kmi; //Km recorrido en el viaje
    $this->Dossier->id=$this->request->data['Trip']['dossier_id'];
  $this->request->data= $this->Dossier->read();
  $kilometraje=$this->request->data['Dossier']['kilometraje'];
    $nviajes=$this->request->data['Dossier']['numer_viajes'];
  $this->request->data['Dossier']['kilometraje']=$kilometraje + $kmr;
  $this->request->data['Dossier']['numero_viajes']=$nviajes+1;
  $this->Dossier->save($this->request->data);
            
            $this->Session->setFlash('Regreso de Camión Registrado ', 'flash_notification');
            $this->redirect(array('action'=>'index'));
            else:
                $this->Session->setFlash('No se pudo Registrar la entrada del viaje', 'flash_notification');
            
        endif;
        
    endif;
    
}

public function delete($id)
        {
    if($this->request->is('get')):
        throw new MethodNotAllowedException();//para que en la url no le agreguen un dato para borrar por get
    else:
        if($this->Trip->delete($id)):
            $this->Session->setFlash("Viaje Eliminado", 'flash_notification');
        $this->redirect(array('action'=>'index'));
        endif;


    endif;
    
        }
        
        
         public function details($id = null) {
    if($id != null){
      $this->Trip->id = $id;
      if (!$this->Trip->exists()) {
        throw new NotFoundException(__('viaje invalido'));
      }
      $data = $this->Trip->findById($id);
      $this->set('Viaje', $data);      
    }
    else{ //No se ha proporcionado un id

    }
      
   $this->set('Herramientas',$this->Trip->Tool->find('all',array('conditions'=>'Cleaningtoolsused.trip_id ='.$id))) ;
   
  
    $this->loadModel('Crew');
   $this->set('Tripulantes',$this->Crew->find('all',array('conditions'=>'Crew.trip_id ='.$id))) ;

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
            $this->Session->setFlash('Modificación de viaje Realizado ', 'flash_notification');
            $this->redirect(array('action'=>'index'));
            else:
                $this->Session->setFlash('No se pudo Modificar los datos  del viaje', 'flash_notification');
            
        endif;
        
    endif;
    
}     

    public function find(){
 
     
    $field = "{$this->request->data['Trip']['campo']} LIKE ";
    $data = $this->paginate('Trip', array("{$field}" => "%{$this->request->data['Trip']['query']}%"));
    $this->set('Viajes', $data);
    $this->set('query', $this->request->data['Trip']['query']);
    $this->set('campo', $this->request->data['Trip']['campo']);
    $this->render('index');    
  }
  
  function pdf($id = null)
    {
        
        if (!$id){
            $this->Session->setFlash('Id invalido para obtener pdf', 'flash_notification');
            $this->redirect(array('action'=>'index'), null, true);
        }

        Configure::write('debug',0);

        $id = intval($id);
		  
        $property = $this->Trip->read(null, $id);
		  $this->set('property',$property);
                  
         $this->set('Herramientas',$this->Trip->Tool->find('all',array('conditions'=>'Cleaningtoolsused.trip_id ='.$id))) ;
   
  
    $this->loadModel('Crew');
   $this->set('Tripulantes',$this->Crew->find('all',array('conditions'=>'Crew.trip_id ='.$id))) ;          
        if (empty($property))
        {
            $this->Session->setFlash('Sorry, there is no property with the submitted ID.', 'flash_notification');
            $this->redirect(array('action'=>'index'), null, true);
        }
        $this->layout = 'pdf';
        $this->render();
   
    }
}

<?php
App::uses('Logbook', 'Model');
class VehiclesController extends AppController
{
  public $helpers=array('Html','Form'); // helper para hacer formularios
  public $components=array('Paginator');

  public function index()
  {
    $this->Paginator->settings = array(
      'fields' => array('Vehicle.id', 'Modell.modelo', 'Type.tipo', 'Brand.marca', 'Vehicle.anio', 'Vehicle.color', 'Modell.tipo_combustible', 'Vehicle.tarjeta_circulacion'), 
      'limit' => 10, 
      'order' => array('Vehicle.id' => 'desc'),
      'recursive' => 0,
      'joins' => array(
        array(
          'table' => 'types',
          'alias' => 'Type',                
          'conditions'=> array('Modell.type_id = Type.id')
        ),array(
          'table' => 'brands',
          'alias' => 'Brand',
          'conditions'=> array('Modell.brand_id = Brand.id')
        )
      )
    );
    $data = $this->Paginator->paginate('Vehicle');
    $this->set('Vehiculos', $data);
  }

  public function ver($id=null){
    $this->Paginator->settings = array(
      'fields' => array('Vehicle.id', 'Modell.modelo', 'Type.tipo', 'Type.capacidad', 'Brand.marca', 'Vehicle.tarjeta_circulacion', 'Vehicle.anio', 'Vehicle.fecha_tarjeta', 'Vehicle.motor', 'Vehicle.chasisgrabado', 'Vehicle.chasisvin', 'Vehicle.color', 'Vehicle.costo', 'Modell.tipo_combustible', 'Modell.tipo_combustible'), 
      'limit' => 1, 
      'order' => array('Vehicle.id' => 'desc'),
      'conditions' => array("Vehicle.id" => $id),
      'recursive' => 0,
      'joins' => array(
            array(
                'table' => 'types',
                'alias' => 'Type',                
                'conditions'=> array('Modell.type_id = Type.id')
            ),array(
                'table' => 'brands',
                'alias' => 'Brand',
                'conditions'=> array('Modell.brand_id = Brand.id')
      )
    ));
    $data = $this->Paginator->paginate('Vehicle');
    $this->set('Vehiculo', $data[0]);
  }

  public function add()
  {
    $this->loadModel('Modell'); //cargamos el modelo Modelos
    $this->set('Modelos', $this->Modell->find('all', array('recursive' => 1, 'fields' => array('Modell.id', 'Modell.modelo', 'Type.tipo', 'Brand.marca'))));
    if($this->request->is('post')): // si la consulta es de tipo post
      // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
      if($this->Vehicle->Save($this->request->data)):
        //Bitacora
        $logbook = new Logbook();
        $logbook->add("Vehiculo Agregado", serialize($this->request->data));
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
        //carmos el modelo de expediente y luego creamos el registro inicial para el expediente de el nuevo vehiculo
        $this->loadModel('Dossier');
        $this->Dossier->Save($EXPEDIENTE);
        //Bitacora
        $logbook = new Logbook();
        $logbook->add("Expediente de Vehiculo Creado", serialize($EXPEDIENTE));
        $this->Session->setFlash('Vehículo Guardado', 'flash_notification');
        $this->redirect(array('action'=>'index')); // nos regresa a la funcion index
      endif;
      // pr($EXPEDIENTE);
    endif;
  }

    public function edit($id=null)
    {

      $this->loadModel('Modell'); //cargamos el modelo Modelos
      //$this->set('Modelos',$this->Modell->find('list', array(
      $this->set('Modelos', $this->Modell->find('all', array(
        'fields' => array('Modell.id', 'Modell.modelo', 'Type.tipo', 'Brand.marca'), 
        'order' => array('Type.tipo' => 'asc'),
        'recursive' => 0,
        'joins' => array(
          array(
            'table' => 'types',
            'alias' => 'TypeA',                
            'conditions'=> array('Modell.type_id = TypeA.id')
          ),array(
            'table' => 'brands',
            'alias' => 'BrandA',
            'conditions'=> array('Modell.brand_id = BrandA.id')
          )
        )
      )));
      $this->Vehicle->id=$id;
      $this->set('Modelo_id', $this->Vehicle->find('first', array('recursive'=> -1, 'conditions' => array('Vehicle.id' => $id))));
      if($this->request->is('get')):
        $this->request->data=$this->Vehicle->read();
      else: //si la peteicion no es get
        $data = $this->Vehicle->findById($id);
        if($this->Vehicle->save($this->request->data)):
          //Bitacora
          $logbook = new Logbook();
          $logbook->add("Vehiculo Modificado", serialize($data));

          $this->Session->setFlash('Vehículo Modificado', 'flash_notification');
          $this->redirect(array('action'=>'index'));
        else:
          $this->Session->setFlash('No se pudo Modificar el Vehículo', 'flash_notification');
        endif;    
      endif;
    }

    public function delete($id){
      $this->loadModel('Devehicle'); //cargamos el modelo Modelos
      if($this->request->is('get')):
        throw new MethodNotAllowedException();//para que en la url no le agreguen un dato para borrar por get
      else:
        $this->Vehicle->recursive=-1;
        $data = $this->Vehicle->findById($id);
        $data['Devehicle'] = $data['Vehicle'];
        unset($data['Vehicle']);
        if($this->Vehicle->delete($id)):
          //Bitacora
          $logbook = new Logbook();
          
          //Se agrega a los devehicles.
          $this->Devehicle->create();
          $this->Devehicle->Save($data);

          $logbook->add("Vehiculo Eliminado", serialize($data));
          $this->Session->setFlash("Vehículo  Eliminado", 'flash_notification');
          //$this->redirect(array('action'=>'index'));
          $this->redirect("/devehicles/index");
        endif;
      endif;
    }
            
      
  public function find(){
    $field = "{$this->request->data['Vehicle']['campo']} LIKE ";
    $this->Paginator->settings = array(
      'fields' => array('Vehicle.id', 'Modell.modelo', 'Type.tipo', 'Brand.marca', 'Vehicle.anio', 'Vehicle.color', 'Modell.tipo_combustible', 'Vehicle.tarjeta_circulacion'), 
      'limit' => 10, 
      'order' => array('Vehicle.id' => 'desc'),
      'conditions' => array("{$field}" => "%{$this->request->data['Vehicle']['query']}%"),
      'recursive' => 0,
      'joins' => array(
        array(
          'table' => 'types',
          'alias' => 'Type',                
          'conditions'=> array('Modell.type_id = Type.id')
        ),array(
          'table' => 'brands',
          'alias' => 'Brand',
          'conditions'=> array('Modell.brand_id = Brand.id')
        )
      )
    );
    $data = $this->Paginator->paginate('Vehicle');
    $this->set('Vehiculos', $data);
    $this->set('query', $this->request->data['Vehicle']['query']);
    $this->set('campo', $this->request->data['Vehicle']['campo']);    
    $this->render('index');
  }


  function pdf(){
    /*if (!$id){
      $this->Session->setFlash('Id invÃ¡lido para obtener pdf', 'flash_notification');
      $this->redirect(array('action'=>'index'), null, true);
    }*/
    Configure::write('debug',0);
    // $id = intval($id);
    /*$property = $this->Trip->read(null, $id);
    $this->set('property',$property);*/
    $property=$this->Vehicle->find('all');       
    $this->set('Vehiculos',$property) ;
    /* $this->loadModel('Crew');
    $this->set('Tripulantes',$this->Crew->find('all',array('conditions'=>'Crew.trip_id ='.$id))) ;     */     
    if (empty($property)){
      $this->Session->setFlash('Sorry, there is no property with the submitted ID.', 'flash_notification');
      $this->redirect(array('action'=>'index'), null, true);
    }
    $this->layout = 'pdf';
    $this->render();
  } 

}

<?php
App::uses('Logbook', 'Model');
class DevehiclesController extends AppController
{
  public $helpers=array('Html','Form'); // helper para hacer formularios
  public $components=array('Paginator');

  public function index()
  {
    $this->Paginator->settings = array(
      'fields' => array('Devehicle.id', 'Modell.modelo', 'Type.tipo', 'Brand.marca', 'Devehicle.anio', 'Devehicle.color', 'Modell.tipo_combustible', 'Devehicle.tarjeta_circulacion'), 
      'limit' => 5, 
      'order' => array('Devehicle.id' => 'asc'),
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
    $data = $this->Paginator->paginate('Devehicle');
    $this->set('Vehiculos', $data);
  }

  public function ver($id=null){
    $this->Paginator->settings = array(
      'fields' => array('Devehicle.id', 'Modell.modelo', 'Type.tipo', 'Type.capacidad', 'Brand.marca', 'Devehicle.tarjeta_circulacion', 'Devehicle.anio', 'Devehicle.fecha_tarjeta', 'Devehicle.motor', 'Devehicle.chasisgrabado', 'Devehicle.chasisvin', 'Devehicle.color', 'Devehicle.costo', 'Modell.tipo_combustible', 'Modell.tipo_combustible'), 
      'limit' => 1, 
      'order' => array('Devehicle.id' => 'desc'),
      'conditions' => array("Devehicle.id" => $id),
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
    $data = $this->Paginator->paginate('Devehicle');
    $this->set('Vehiculo', $data[0]);
  }

      
  public function find(){
    $field = "{$this->request->data['Devehicle']['campo']} LIKE ";
    $this->Paginator->settings = array(
      'fields' => array('Devehicle.id', 'Modell.modelo', 'Type.tipo', 'Brand.marca', 'Devehicle.anio', 'Devehicle.color', 'Modell.tipo_combustible', 'Devehicle.tarjeta_circulacion'), 
      'limit' => 10, 
      'order' => array('Devehicle.id' => 'desc'),
      'conditions' => array("{$field}" => "%{$this->request->data['Devehicle']['query']}%"),
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
    $data = $this->Paginator->paginate('Devehicle');
    $this->set('Vehiculos', $data);
    $this->set('query', $this->request->data['Devehicle']['query']);
    $this->set('campo', $this->request->data['Devehicle']['campo']);    
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
    $property=$this->Devehicle->find('all');       
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

<?php
App::uses('Brand', 'Model');
App::uses('Type', 'Model');
App::uses('Logbook', 'Model');

class ModellsController extends AppController
{
public $helpers=array('Html','Form'); // helper para hacer formularios
public $components=array('Paginator');

  public function index()
  {
    $this->Paginator->settings = array(
      'fields' => array('Modell.id', 'Modell.modelo', 'Modell.type_id', 'Modell.tipo_combustible', 'Brand.marca', 'Type.tipo'), 
      'limit' => 10, 
      'order' => array('Modell.id' => 'desc'),
    );
    $data = $this->Paginator->paginate('Modell');
    $this->set('Modelos', $data);
  }

  public function add()
  {
    $this->loadModel('Brand'); //cargamos el modelo Marca
    $this->set('Marcas',$this->Brand->find('list', array('fields' => array('Brand.id', 'Brand.marca'))));
    $this->loadModel('Type'); //cargamos el modelo Tipo
    $this->set('Tipos',$this->Type->find('list', array('fields' => array('Type.id', 'Type.tipo'))));

    if($this->request->is('post')): // si la consulta es de tipo post
    // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
      if($this->Modell->Save($this->request->data)):
        //Bitacora
        $logbook = new Logbook();
        $logbook->add("Modelo de Vehiculo Agregado", serialize($this->request->data));

        $this->Session->setFlash('Modelo de Vehículo  Guardado');
        $this->redirect(array('action'=>'index')); // nos regresa a la funcion index
      endif;
    endif;
  }


public function edit($id=null)
{
  $this->loadModel('Brand'); //cargamos el modelo Marca
  $this->set('Marcas',$this->Brand->find('list', array('fields' => array('Brand.id', 'Brand.marca'))));
  $this->loadModel('Type'); //cargamos el modelo Tipo
  $this->set('Tipos',$this->Type->find('list', array('fields' => array('Type.id', 'Type.tipo'))));
  
  $this->Modell->id=$id;
  if($this->request->is('get')):
    $this->request->data=$this->Modell->read();
  else: //si la peticion no es get
    $data = $this->Modell->findById($id);
    if($this->Modell->save($this->request->data)):
      //Bitacora
      $logbook = new Logbook();
      $logbook->add("Modelo de Vehiculo Modificado", serialize($data));

      $this->Session->setFlash('Modelo de Vehículo Modificado');
      $this->redirect(array('action'=>'index'));
    else:
      $this->Session->setFlash('No se pudo Modificar el modelo de Vehículo');
    endif;
  endif;
}

public function delete($id){
  if($this->request->is('get')):
    throw new MethodNotAllowedException();//para que en la url no le agreguen un dato para borrar por get
  else:
    $data = $this->Modell->findById($id);
    if($this->Modell->delete($id)):
      //Bitacora
      $logbook = new Logbook();
      $logbook->add("Modelo de Vehiculo Eliminado", serialize($data));

      $this->Session->setFlash("Modelo de Vehículo Eliminado");
      $this->redirect(array('action'=>'index'));
    endif;
  endif;
}


  public function buscar(){
    $this->Paginator->settings = array(
      'limit' => 100, 'order' => array('Modell.id' => 'desc')
    );
    $field = "{$this->request->data['Modell']['campo']} LIKE ";
    $data = $this->Paginator->paginate('Modell', array("{$field}" => "%{$this->request->data['Modell']['query']}%"));
    $this->set('Modelos', $data);
    $this->set('query', $this->request->data['Modell']['query']);
    $this->set('campo', $this->request->data['Modell']['campo']);
    $this->render('index');    
  }
}

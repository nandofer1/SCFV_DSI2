<?php
class TypesController extends AppController
{
  public $helpers=array('Html','Form'); // helper para hacer formularios
  public $components=array('Paginator');

  public function index()
  {
      $this->Paginator->settings = array(
        'limit' => 10, 'order' => array('Type.id' => 'desc')
      );
      $data = $this->Paginator->paginate('Type');
      $this->set('Tipos', $data);
  }

  public function add()
  {
      if($this->request->is('post')): // si la consulta es de tipo post
          // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
          if($this->Type->Save($this->request->data)): 
            //Bitacora
            $logbook = new Logbook();
            $logbook->add("Tipo de Vehiculo Agregado", serialize($this->request->data));

              $this->Session->setFlash('Tipo de Vehículo Guardado', 'flash_notification');
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
          $data = $this->Type->findById($id);
          if($this->Type->save($this->request->data)):
              //Bitacora
              $logbook = new Logbook();
              $logbook->add("Tipo de Vehiculo Modificado", serialize($data));

              $this->Session->setFlash('Tipo de Vehículo Modificado', 'flash_notification');
              $this->redirect(array('action'=>'index'));
          else:
              $this->Session->setFlash('No se pudo Modificar el tipo de Vehículo', 'flash_notification');
          endif;
      endif;
  }

  public function delete($id){
      if($this->request->is('get')):
          throw new MethodNotAllowedException();//para que en la url no le agreguen un dato para borrar por get
      else:
          $data = $this->Type->findById($id);
          if($this->Type->delete($id)):
              //Bitacora
              $logbook = new Logbook();
              $logbook->add("Tipo de Vehiculo Eliminado", serialize($data));

              $this->Session->setFlash("Tipo de vehículo   Eliminado", 'flash_notification');
              $this->redirect(array('action'=>'index'));
          endif;
      endif;
  }

  public function buscar(){
    $this->Paginator->settings = array(
      'limit' => 100, 'order' => array('Type.id' => 'desc')
    );
    $field = "{$this->request->data['Type']['campo']} LIKE ";
    $data = $this->Paginator->paginate('Type', array("{$field}" => "%{$this->request->data['Type']['query']}%"));
    $this->set('Tipos', $data);
    $this->set('query', $this->request->data['Type']['query']);
    $this->set('campo', $this->request->data['Type']['campo']);
    $this->render('index');    
  }
}

<?php
App::uses('AppController', 'Controller');
App::uses('Logbook', 'Model');
class BrandsController extends AppController
{
  public $helpers=array('Html','Form'); // helper para hacer formularios
  public $components=array('Paginator');

  public function index()
  {
    $this->Paginator->settings = array(
      'limit' => 10, 'order' => array('Brand.id' => 'desc')
    );
    $data = $this->Paginator->paginate('Brand');
    $this->set('Marcas', $data);
  }

  public function add()
  {
    if($this->request->is('post')): // si la consulta es de tipo post
      // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
      if($this->Brand->Save($this->request->data)): 
        //Bitacora
        $logbook = new Logbook();
        $logbook->add("Marca Agregada", serialize($this->request->data));

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
    else: //si la peticion no es get
      $data = $this->Brand->findById($id);
      if($this->Brand->save($this->request->data)):

        //Bitacora
        $logbook = new Logbook();
        $logbook->add("Marca Modificada", serialize($data));

        $this->Session->setFlash('Marca Modificada');
        $this->redirect(array('action'=>'index'));
      else:
        $this->Session->setFlash('No se pudo Modificar la marca');
      endif;
    endif;
  }

  public function delete($id){
    if($this->request->is('get')):
      throw new MethodNotAllowedException();//para que en la url no le agreguen un dato para borrar por get
    else:
      $data = $this->Brand->findById($id);
      if($this->Brand->delete($id)):
        //Bitacora
        $logbook = new Logbook();
        $logbook->add("Marca Eliminada", serialize($data));

        $this->Session->setFlash("Marca de Vehículo Eliminada");
        $this->redirect(array('action'=>'index'));
      endif;
    endif;
  }

  public function buscar(){
    $this->Paginator->settings = array(
      'limit' => 20, 'order' => array('Brand.id' => 'desc')
    );
    $field = "{$this->request->data['Brand']['campo']} LIKE ";
    $data = $this->Paginator->paginate('Brand', array("{$field}" => "%{$this->request->data['Brand']['query']}%"));
    $this->set('Marcas', $data);
    $this->set('query', $this->request->data['Brand']['query']);
    $this->set('campo', $this->request->data['Brand']['campo']);
    $this->render('index');    
  }

}

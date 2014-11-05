<?php
class DossiersController extends AppController
{
public $helpers=array('Html','Form'); // helper para hacer formularios
public $components=array('Session');

public function index()
{
    
 
}
//Funcion donde se mostrara el expediente solicitado
public function find()
{
if($this->request->is('post')): // si la consulta es de tipo post
    // si se pueden guardar los datos que vienen en el request , y el QUERY ESTA IMPLICITO
    if($this->Dossier->find('all')): 
        $this->Session->setFlash('Expediente Encontrado');
    $this->redirect(array('action'=>'index')); // nos regresa a la funcion index
        
    endif;
   
endif;
 
}
}
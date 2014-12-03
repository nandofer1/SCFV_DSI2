<?php
App::uses('AppModel', 'Model');
App::uses('CakeSession', 'Model/Datasource');

class Logbook extends AppModel {
public $belongsTo = array('User' => array('foreignKey'=>'user_id')); //belongsTo: the current model contains the foreign key.
  public function add($action, $data) {
    /*
    $this->Logbook->create();
    $arrData = array('Logbook' => array('user_id' => $this->Session->read("id"), 'action'=> $action, 'data'=>$data));
    print_r($arrData);
    $this->Logbook->save($arrData);
    */
    $this->create();
    $arrData = array('Logbook' => array('user_id' => $user_id = CakeSession::read('id'), 'action'=> $action, 'data'=>$data));
    print_r($arrData);
    $this->save($arrData);
  }
}
?>

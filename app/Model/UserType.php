<?php

App::uses('AppModel', 'Model');

class UserType extends AppModel {
    public $validate = array(
        'tipo_usuario' => array(
            'required' => array(
              'rule' => 'notEmpty',
              'message' => 'Este campo no debe quedar vacio.'
            ), 
            'unique' => array(
              'rule' => 'isUnique',
              'required' => true,
              'message' => 'Este campo debe ser unico.'
            ),
            'alphaNumeric' => array(
              'rule' => array('custom','^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$^'), 
              'required' => true,
              'message' => 'Este campo solo debe contener letras.'
            )
        )
    );
}
?>

<?php

App::uses('AppModel', 'Model');

class UserType extends AppModel {
    public $validate = array(
        'tipo_usuario' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Este campo no debe quedar vacio.'
            ), 
            'unique' => array(
              'rule' => 'isUnique',
              'required' => 'create',
              'message' => 'Este campo debe ser unico.'
            )
        )
    );
}
?>
<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    public $belongsTo = array('UserType' => array('foreignKey'=>'tipo_usuario')); //belongsTo: the current model contains the foreign key.
    public $useTable = 'users';
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'El nombre de usuario es requerido.'
            ), 
            'unique' => array(
              'rule' => 'isUnique',
              'required' => 'create',
              'message' => 'El nombre de usuario ya esta tomado.'
            )

        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'El password es requerido'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
        }
    return true;
    }
}

?>
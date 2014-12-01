<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    //Presentar nombre de usuario en vez del id
    var $displayField = 'username';
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
        'password1' => array(
          'required'=>'notEmpty',
          'match'=>array(
            'rule' => 'validatePasswdConfirm',
            'message' => 'Los passwords no coinciden'
          )
        ),
        'correo' => array(
            'rule1' => array(
                'rule' => array('email'),
                'message' => 'Debe ingresar un correo valido'
            )
        ),
        'dui' => array(
            'rule1' => array(
                'rule' => array('minLength', '10'),
                'message' => 'Debe tener 10 caracteres minimo'
            ),
            'rule2' => array(
                'rule' => array('maxLength', '10'),
                'message' => 'Debe tener 10 caracteres maximo'
            ),
            'rule3' => array(
                'rule' => '/^[0-9]{8}[-]{1}[0-9]{1}$/i',
                'message' => 'Debe seguir el formato ########-#'
            )
        ),
        'telefono' => array(
            'rule1' => array(
                'rule' => array('minLength', '9'),
                'message' => 'Debe tener 9 caracteres minimo'
            ),
            'rule2' => array(
                'rule' => array('maxLength', '9'),
                'message' => 'Debe tener 9 caracteres maximo'
            ),
            'rule3' => array(
                'rule' => '/^[0-9]{4}[-]{1}[0-9]{4}$/i',
                'message' => 'Debe seguir el formato ####-####'
            )
        ),

    );

    function validatePasswdConfirm($data)
    {
      if ($this->data['User']['password'] !== $data['password1'])
      {
        return false;
      }
      return true;
    }

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
        }
    return true;
    }
}

?>

<?php
class Type extends AppModel
{
     public $hasMany=array('Vehicle');
     public $validate=array( //INICIO VALIDACION
       /* 
        'tipo' => array(
        'valid' => array('rule' => array('custom','^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$^'), 
                       'message' => 'Ingrese un tipo de vehículo válido'),
        'required' => array('rule' => array('minLength', '10'),
                    'message' => 'Ingrese un tipo de vehículo válido')),
         
      'capacidad' => array(
        'valid' => array('rule' => array('custom','/^[0-9]{1,}$/i'), // ->> solo numeros minímo un caracter
                       'message' => 'Solo se permiten números'),
        'required' => array('rule' => array('minLength', '1'),
                            'message' => 'Capacidad obligatoria')),
         
         'descripcion' => array(
        'valid' => array('rule' => array('custom','/^[A-Za-z0-9áéíóúÁÉÍÓÚÑñ\s]{10,}$/i'), // ->> solo letras y numeros minímo 10 caracteres MAYUSCULA Y MINUSCULA
                       'message' => 'Ingrese una descripción válida'),
        'required' => array('rule' => array('minLength', '1'),
                            'message' => 'Ingrese una descripción válida'))
        */
        
    ); //FIN VALIDACION
}
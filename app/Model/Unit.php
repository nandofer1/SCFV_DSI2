<?php
class Unit extends AppModel
{
     public $validate=array( //INICIO VALIDACION
         
          'unidad' => array(
        'valid' => array('rule' => array('custom','^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$^'), 
                       'message' => 'Ingrese un nombre de unidad válido'),
        'required' => array('rule' => array('minLength', '6'),
                    'message' => 'Ingrese un Nombre de unidad válido')),
         
          'descripcion' => array(
        'valid' => array('rule' => array('custom','/^[A-Za-z0-9áéíóúÁÉÍÓÚÑñ\s]{10,}$/i'), // ->> solo letras y numeros minímo 10 caracteres MAYUSCULA Y MINUSCULA
                       'message' => 'Ingrese una descripción válida'),
        'required' => array('rule' => array('minLength', '1'),
                            'message' => 'Ingrese una descripción válida'))
         
         
         );//FIN DE LA VALIDACION 
}
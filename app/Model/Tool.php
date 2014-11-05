<?php
class Tool extends AppModel
{
    
     public $validate=array( //INICIO VALIDACION
        
        'herramienta' => array(
      'valid' => array('rule' => array('alphaNumeric'),
                       'message' => ' Nombre debe ser alfanumérico'),
      'required' => array('rule' => array('minLength', '4'),
                            'message' => 'Nombre de Herramienta minímo 4 caracteres')),
         
          'existencia' => array(
      'valid' => array('rule' => array('custom','/^[0-9]{1,}$/i'),
                       'message' => ' Existencia solo debe contener numeros enteros'),
      'required' => array('rule' => array('maxLength', '4'),
                            'message' => 'Existencia Máximo 4 caracteres')),
         
         'descripcion' => array(
        'valid' => array('rule' => array('custom','/^[A-Za-z0-9áéíóúÁÉÍÓÚÑñ\s]{10,}$/i'), // ->> solo letras y numeros minímo 10 caracteres MAYUSCULA Y MINUSCULA
                       'message' => 'Ingrese una descripción válida'),
        'required' => array('rule' => array('minLength', '1'),
                            'message' => 'Ingrese una descripción válida')),
         
         'valor' => array(
      'valid' => array('rule' => array('decimal','2'),
                       'message' => 'Ingrese una cantidad monetaria válida Ej:2.00'),
      'required' => array('rule' => array('minLength', '1'),
                            'message' => 'Debe Escribir una cantidad'))
        
        
    ); //FIN VALIDACION
}
<?php
class Management extends AppModel
{
     public $validate=array( //INICIO VALIDACION
          
         'unit_id'=>array(
            'rule'=>'notEmpty',
            'message' => 'Debe Seleccionar una departamento'),
         
         'gerencia' => array(
        'valid' => array('rule' => array('custom','^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$^'), 
                       'message' => 'Ingrese un nombre de gerencia válido'),
        'required' => array('rule' => array('minLength', '6'),
                    'message' => 'Ingrese un Nombre de gerencia válido')),
         
         
         
         );//FIN VALIDACION
}
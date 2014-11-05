<?php
class Departament extends AppModel
{
     public $validate=array( //INICIO VALIDACION
        
         'management_id'=>array(
            'rule'=>'notEmpty',
            'message' => 'Debe Seleccionar una gerencia'),
         
         
        'departamento' => array(
        'valid' => array('rule' => array('custom','^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$^'), 
                       'message' => 'Ingrese un nombre de departamento válido'),
        'required' => array('rule' => array('minLength', '10'),
                    'message' => 'Ingrese un Nombre de departamento válido')),
         
         'descripcion' => array(
        'valid' => array('rule' => array('custom','^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$^'),
                       'message' => 'Ingrese una Descripción  válida'),
        'required' => array('rule' => array('minLength', '10'),
                    'message' => 'Ingrese una Descripción  válida'))
         
        
         
   
        
        
    ); //FIN VALIDACION
}
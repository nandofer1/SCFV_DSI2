<?php
class Employee extends AppModel
{
    public $displayField='nombre';
    public $hasOne=array('Crew');
    public $belongsTo=array('Departament');
    
    
    
     public $validate=array(
    'id' => array(
        
        'unique' => array(
              'rule' => 'isUnique',
              'required' => 'create',
              'message' => 'La DUI ya esta en uso.'
            )
   )
      /*  ),
         'departament_id'=>array(
            'rule'=>'notEmpty',
            'message' => 'Debe Seleccionar una departamento'),
         
         'nombre' => array(
        'valid' => array('rule' => array('custom','^([a-zA-ZáéíóúÁÉÍÓÚü\s])+([a-zA-ZáéíóúÁÉÍÓÚü])+$^'), 
                       'message' => 'Ingrese un nombre completo'),
        'required' => array('rule' => array('minLength', '6'),
                            'message' => 'Ingrese un nombre Válido')),
         'apellido' => array(
        'valid' => array('rule' => array('custom','^([a-zA-ZáéíóúÁÉÍÓÚü\s])+([a-zA-ZáéíóúÁÉÍÓÚü])+$^'), 
                       'message' => 'Ingrese sus apellidos de forma correcta'),
        'required' => array('rule' => array('minLength', '6'),
                            'message' => 'Ingrese sus apellidos completos')),
         
          'direccion' => array(
        'valid' => array('rule' => array('custom','^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$^'),
                       'message' => 'Ingrese una Dirección  válida'),
        'required' => array('rule' => array('minLength', '10'),
                    'message' => 'Ingrese una Dirección  válida')),
         
         'correo' => array(
        'rule' => array('email', true), //el true para ver que el host sea valido tambien
        'required'=>'true',    
        'message' => 'Por favor indique una dirección de correo electrónico válida.'),
         
        
         'telefono' => array(
        'valid' => array('rule' => array('custom','^\d{4}-{1}\d{4}$^'),
                       'message' => 'Ingrese un Nº de Telefono válido Ej: 2xxx-xxxx, 7xxx-xxxx 8 dígitos'),
        'required' => array('rule' => array('minLength', '8'),
                    'message' => 'Ingrese un telefono válido , 8 dígitos')),
         
         */
         );
        
}
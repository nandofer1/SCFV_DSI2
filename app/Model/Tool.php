<?php
class Tool extends AppModel
{  
 
       public $displayField='herramienta';
       public $hasOne=array('Cleaningtoolsused');
    public $hasAndBelongsToMany = array(
		'Trip' => array(
			'className' => 'Trip',
			'joinTable' => 'cleaningtoolsuseds',
			'foreignKey' => 'tool_id',
			'associationForeignKey' => 'trip_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
 
     public $validate=array( //INICIO VALIDACION
        
       'herramienta' => array(
      'unique' => array(
              'rule' => 'isUnique',
              'required' => 'create',
              'message' => 'La Herramienta ya esta registrada.'
            )),

          'existencia' => array(
      'between' => array('rule' => array('between', 1, 99999),
                            'message' => 'Debe ser un numero positivo'),
      'valid' => array('rule' => array('custom','/^[0-9]{1,}$/i'),
                       'message' => ' Existencia solo debe contener numeros enteros')),


         /*
         'descripcion' => array(
        'valid' => array('rule' => array('custom','/^[A-Za-z0-9áéíóúÁÉÍÓÚÑñ\s]{0,}$/i'), // ->> solo letras y numeros minímo 10 caracteres MAYUSCULA Y MINUSCULA
                       'message' => 'Ingrese una descripción válida'),
        'required' => array('rule' => array('minLength', '1'),
                            'message' => 'Ingrese una descripción válida')),
         */
         'valor' => array(
      'valid' => array('rule' => array('money'),
                       'message' => 'Ingrese una cantidad monetaria válida Ej:2.00'),
      'required' => array('rule' => array('minLength', '1'),
                            'message' => 'Debe Escribir una cantidad'))
        
        
    ); //FIN VALIDACION
}

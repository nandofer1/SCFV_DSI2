<?php
class Vehicle extends AppModel
{//VALIDACION DE LOS CAMPOS
   // public $belongsTo=array('Modell');
public $belongsTo=array('Type','Modell');
    public $validate=array(
    
       /* 'id'=>array(
             'rule' => array('custom', '/^[a-z0-9]{3,}$/i'),
            'required'=>'true',
            'message' => 'Fomato Inválido o Cmpo Vacío'),*/
           
        'modell_id'=>array('rule'=>'notEmpty',
                    'message' => 'Debe Seleccionar un modelo de Vehículo'),
        
        'type_id'=>array('rule'=>'notEmpty',
                    'message' => 'Debe Seleccionar un tipo de Vehículo'),
        
      /*  'tarjeta_circulacion'=>array(
             'rule' => array('custom', '/^[a-z0-9]{3,}$/i'),
            'required'=>'true',
            'message' => 'El Número de placa no puede quedar vacío'),*/
           
        
        
       'fecha_tarjeta' => array(
        'valid' => array('rule' => array('date'), // ->> solo letras y numeros minímo 4 caracteres MAYUSCULA Y MINUSCULA
                       'message' => 'Ingrese una fecha válida AAAA-MM-DD'),
        'required' => array('rule' => array('mixLength', '30'),
                            'message' => 'ingrese una fecha valida')),
        
        'anio' => array(
        'valid' => array('rule' => array('custom','^([1-2]{1}[0-9]{3})$^'), 
                       'message' => 'Ingrese un año  válido Ej: 1999 , 2006'),
        'required' => array('rule' => array('minLength', '4'),
                    'message' => 'Ingrese un año válido')),
        
       
        
        'color' => array(
            'rule'=>'alphaNumeric',
            'required'=>'true'),
        
         'motor' => array(
            'rule'=>'alphaNumeric',
            'required'=>'true'),
        
         'chasisgrabado' => array(
            'rule'=>'alphaNumeric',
            'required'=>'true'),
        
         'chasisvin' => array(
            'rule'=>'alphaNumeric',
            'required'=>'true'),
        
        'tipo_gasolina'=>array(
            'rule'=>'notEmpty',
            'message' => 'Debe Seleccionar un tipo de Gasolina'),
        
        
            'costo' => array(
             'rule' => array('decimal', 2),
        'message' => 'Por favor ingrere una cantidad monetaria válida.',
            'required'=>'true')
       
        
        
        
    ); //validamos campo por campo 
}
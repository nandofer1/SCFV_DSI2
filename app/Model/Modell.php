<?php
class Modell extends AppModel
{
    public $hasMany=array('Vehicle');
    public $belongsTo=array('Brand');
     public $validate=array( //INICIO VALIDACION
        
         'brand_id'=>array(
            'rule'=>'notEmpty',
            'message' => 'Debe Seleccionar un tipo de Gasolina'),
         
       'modelo' => array(
        'valid' => array('rule' => array('custom','/^[A-Za-z0-9áéíóúÁÉÍÓÚÑñ\s]{4,}$/i'), // ->> solo letras y numeros minímo 4 caracteres MAYUSCULA Y MINUSCULA
                       'message' => 'Ingrese un Modelo de vahículo valido'),
        'required' => array('rule' => array('mixLength', '30'),
                            'message' => 'Ingrese un Modelo de vahículo valido max 30 caracteres'))
        
        
    ); //FIN VALIDACION
}
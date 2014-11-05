<?php
class Brand extends AppModel
{
    public $validate=array( //INICIO VALIDACION
        
        'marca' => array(
      'valid' => array('rule' => array('alphaNumeric'),
                       'message' => 'Marca Debe Ser Alfanúmerico'),
      'required' => array('rule' => array('minLength', '1'),
                            'message' => 'Nombre de Marca obligatoria')),
        
        
    ); //FIN VALIDACION
}
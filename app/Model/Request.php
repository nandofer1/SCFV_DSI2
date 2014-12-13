<?php
App::uses('AppModel', 'Model');
/**
 * Request Model
 *
 * @property Dossier $Dossier
 * @property User $User
 * @property Driver $Driver
 * @property Requestvoucher $Requestvoucher
 */
class Request extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Dossier' => array(
			'className' => 'Dossier',
			'foreignKey' => 'dossier_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Unit' => array(
			'className' => 'Unit',
			'foreignKey' => 'unit_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Employee' => array(
			'className' => 'Employee',
			'foreignKey' => 'employee_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Requestvoucher' => array(
			'className' => 'Requestvoucher',
			'foreignKey' => 'request_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
    
    public $validate = array(
        'telefono' => array(
            'rule1' => array(
                'rule' => array('minLength', '9'),
                'message' => 'Debe tener 9 caracteres minimo'
            ),
            'rule2' => array(
                'rule' => array('maxLength', '9'),
                'message' => 'Debe tener 9 caracteres maximo'
            ),
            'rule3' => array(
                'rule' => '/^[0-9]{4}[-]{1}[0-9]{4}$/i',
                'message' => 'Debe seguir el formato ####-####'
            )
        ),

    );
}

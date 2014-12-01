<?php
App::uses('AppModel', 'Model');
/**
 * Dossier Model
 *
 * @property Allocation $Allocation
 * @property Vehicle $Vehicle
 * @property Maintenance $Maintenance
 * @property Request $Request
 * @property Trip $Trip
 */
class Dossier extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'vehicle_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'Kilometraje_actual' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Allocation' => array(
			'className' => 'Allocation',
			'foreignKey' => 'dossier_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Vehicle' => array(
			'className' => 'Vehicle',
			'foreignKey' => 'vehicle_id',
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
		'Maintenance' => array(
			'className' => 'Maintenance',
			'foreignKey' => 'dossier_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Request' => array(
			'className' => 'Request',
			'foreignKey' => 'dossier_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Trip' => array(
			'className' => 'Trip',
			'foreignKey' => 'dossier_id',
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

}

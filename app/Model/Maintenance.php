<?php
App::uses('AppModel', 'Model');
/**
 * Maintenance Model
 *
 * @property User $User
 * @property Dossier $Dossier
 * @property Maintenancetoolsused $Maintenancetoolsused
 * @property Partsused $Partsused
 */
class Maintenance extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'fecha_mantenimiento';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Maintenancetype' => array(
          'className' => 'Maintenancetype',
			'foreignKey' => 'maintenancetype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
        ),
		'Dossier' => array(
			'className' => 'Dossier',
			'foreignKey' => 'dossier_id',
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
		'Maintenancetoolsused' => array(
			'className' => 'Maintenancetoolsused',
			'foreignKey' => 'maintenance_id',
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
		'Partsused' => array(
			'className' => 'Partsused',
			'foreignKey' => 'maintenance_id',
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

<?php
App::uses('AppModel', 'Model');
/**
 * Fuelvoucher Model
 *
 * @property Requestvoucher $Requestvoucher
 * @property Voucher $Voucher
 */
class Fuelvoucher extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'factura';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'monto' => array(
			'money' => array(
				'rule' => array('money'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'galones' => array(
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
		'Requestvoucher' => array(
			'className' => 'Requestvoucher',
			'foreignKey' => 'fuelvoucher_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Voucher' => array(
			'className' => 'Voucher',
			'foreignKey' => 'fuelvoucher_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

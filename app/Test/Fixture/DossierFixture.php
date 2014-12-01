<?php
/**
 * DossierFixture
 *
 */
class DossierFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'vehicle_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'fecha_ingreso' => array('type' => 'date', 'null' => false, 'default' => null),
		'Kilometraje_actual' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'kilometraje' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'numero_viajes' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'numero_mantenimientos' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'numero_vales' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'fecha_ult_mant' => array('type' => 'date', 'null' => false, 'default' => null),
		'prestable' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'observaciones' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'placa' => array('column' => 'vehicle_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'vehicle_id' => 'Lorem ',
			'fecha_ingreso' => '2014-12-01',
			'Kilometraje_actual' => 1,
			'kilometraje' => 1,
			'numero_viajes' => 1,
			'numero_mantenimientos' => 1,
			'numero_vales' => 1,
			'fecha_ult_mant' => '2014-12-01',
			'prestable' => 1,
			'observaciones' => 'Lorem ipsum dolor sit amet'
		),
	);

}

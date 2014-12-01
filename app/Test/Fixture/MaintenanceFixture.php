<?php
/**
 * MaintenanceFixture
 *
 */
class MaintenanceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'dossier_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'upkeeptype_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'descripcion' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'fecha_mantenimiento' => array('type' => 'date', 'null' => false, 'default' => null),
		'fecha_solicitud' => array('type' => 'date', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'user_id' => 1,
			'dossier_id' => 1,
			'upkeeptype_id' => 1,
			'descripcion' => 1,
			'fecha_mantenimiento' => '2014-12-01',
			'fecha_solicitud' => '2014-12-01'
		),
	);

}

<?php
App::uses('Maintenance', 'Model');

/**
 * Maintenance Test Case
 *
 */
class MaintenanceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.maintenance',
		'app.user',
		'app.user_type',
		'app.dossier',
		'app.vehicle',
		'app.type',
		'app.modell',
		'app.brand',
		'app.allocation',
		'app.request',
		'app.employee',
		'app.departament',
		'app.management',
		'app.unit',
		'app.crew',
		'app.requestvoucher',
		'app.trip',
		'app.tool',
		'app.cleaningtoolsused',
		'app.maintenancetoolsused',
		'app.partsused'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Maintenance = ClassRegistry::init('Maintenance');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Maintenance);

		parent::tearDown();
	}

}

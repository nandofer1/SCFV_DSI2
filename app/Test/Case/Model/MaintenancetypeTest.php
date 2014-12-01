<?php
App::uses('Maintenancetype', 'Model');

/**
 * Maintenancetype Test Case
 *
 */
class MaintenancetypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.maintenancetype'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Maintenancetype = ClassRegistry::init('Maintenancetype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Maintenancetype);

		parent::tearDown();
	}

}

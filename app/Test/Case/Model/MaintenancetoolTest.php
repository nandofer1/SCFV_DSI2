<?php
App::uses('Maintenancetool', 'Model');

/**
 * Maintenancetool Test Case
 *
 */
class MaintenancetoolTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.maintenancetool'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Maintenancetool = ClassRegistry::init('Maintenancetool');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Maintenancetool);

		parent::tearDown();
	}

}

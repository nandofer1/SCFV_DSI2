<?php
App::uses('Dossier', 'Model');

/**
 * Dossier Test Case
 *
 */
class DossierTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.dossier',
		'app.vehicle',
		'app.type',
		'app.modell',
		'app.brand',
		'app.allocation',
		'app.maintenance',
		'app.request',
		'app.user',
		'app.user_type',
		'app.employee',
		'app.departament',
		'app.management',
		'app.unit',
		'app.crew',
		'app.requestvoucher',
		'app.trip',
		'app.tool',
		'app.cleaningtoolsused'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Dossier = ClassRegistry::init('Dossier');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dossier);

		parent::tearDown();
	}

}

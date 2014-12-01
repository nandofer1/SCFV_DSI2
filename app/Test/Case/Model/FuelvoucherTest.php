<?php
App::uses('Fuelvoucher', 'Model');

/**
 * Fuelvoucher Test Case
 *
 */
class FuelvoucherTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.fuelvoucher',
		'app.requestvoucher',
		'app.voucher'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Fuelvoucher = ClassRegistry::init('Fuelvoucher');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Fuelvoucher);

		parent::tearDown();
	}

}

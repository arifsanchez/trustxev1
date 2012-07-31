<?php
App::uses('EcurrType', 'Model');

/**
 * EcurrType Test Case
 *
 */
class EcurrTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ecurr_type',
		'app.user_ecurr',
		'app.user',
		'app.order',
		'app.order_type',
		'app.product',
		'app.payment_method',
		'app.order_status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EcurrType = ClassRegistry::init('EcurrType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EcurrType);

		parent::tearDown();
	}

}

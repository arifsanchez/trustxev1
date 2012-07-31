<?php
App::uses('PaymentMethod', 'Model');

/**
 * PaymentMethod Test Case
 *
 */
class PaymentMethodTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.payment_method',
		'app.order',
		'app.order_type',
		'app.user',
		'app.user_ecurr',
		'app.product',
		'app.order_status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PaymentMethod = ClassRegistry::init('PaymentMethod');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PaymentMethod);

		parent::tearDown();
	}

}

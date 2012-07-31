<?php
App::uses('UserEcurr', 'Model');

/**
 * UserEcurr Test Case
 *
 */
class UserEcurrTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_ecurr',
		'app.user',
		'app.ecurr_type',
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
		$this->UserEcurr = ClassRegistry::init('UserEcurr');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserEcurr);

		parent::tearDown();
	}

}

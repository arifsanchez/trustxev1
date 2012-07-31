<?php
App::uses('OrderType', 'Model');

/**
 * OrderType Test Case
 *
 */
class OrderTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_type',
		'app.order'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrderType = ClassRegistry::init('OrderType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderType);

		parent::tearDown();
	}

}

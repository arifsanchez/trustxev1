<?php
App::uses('UserLrAcc', 'Model');

/**
 * UserLrAcc Test Case
 *
 */
class UserLrAccTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_lr_acc',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserLrAcc = ClassRegistry::init('UserLrAcc');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserLrAcc);

		parent::tearDown();
	}

}

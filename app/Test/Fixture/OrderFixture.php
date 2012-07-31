<?php
/**
 * OrderFixture
 *
 */
class OrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'order_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'user_ecurr_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'quantity' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'price' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => 20),
		'payment_method_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'order_status_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'order_type_id' => 1,
			'user_id' => 1,
			'user_ecurr_id' => 1,
			'product_id' => 1,
			'quantity' => 1,
			'price' => 1,
			'payment_method_id' => 1,
			'order_status_id' => 1,
			'created' => '2012-07-28 05:53:55',
			'modified' => '2012-07-28 05:53:55'
		),
	);

}

<?php
/**
 * Tests for the settings page.
 *
 * @package Nexcess\LimitOrders
 */

namespace Tests;

use WC_Checkout;
use WC_Helper_Product;
use WP_UnitTestCase;

/**
 * @covers Nexcess\LimitOrders\Settings
 * @group Admin
 * @group Settings
 */
abstract class TestCase extends WP_UnitTestCase {

	/**
	 * Create a new order by emulating the checkout process.
	 */
	protected function generate_order() {
		$product = WC_Helper_Product::create_simple_product( true );

		WC()->cart->add_to_cart( $product->get_id(), 1 );

		return WC_Checkout::instance()->create_order( [
			'billing_email'  => 'test_customer@example.com',
			'payment_method' => 'dummy_payment_gateway',
		] );
	}
}
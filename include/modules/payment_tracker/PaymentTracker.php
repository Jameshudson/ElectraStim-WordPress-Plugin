<?php

/**
* 
*/

namespace modules\payment_tracker{

	use modules\payment_tracker\display\AdminDisplay;
	use modules\payment_tracker\order\OrderHandler;

	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    class PaymentTracker{

		const DEVICE_TYPE = 'device_type';
		const DEVICE = 'device';

		function __construct(){

			$setting = new Setting();
			add_action("admin_init", array($setting, "init"));

			//settings for the plugin.
			$setting->setName("Payment Tracker");
			$setting->setId("PAYMENT-TRACKER");

			//adding actions.
			$display = new Display($this);
			add_action("woocommerce_admin_order_data_after_order_details", array($display, "OrderViewDatails"));
			add_action("admin_menu", array($this, "addMenuItem"));

			//tracks what browser was used.
			$orderHandler = new OrderHandler();
			add_action("woocommerce_checkout_update_order_meta", array($orderHandler, "tracker"));
		}
	}

	new PaymentTracker();
}
?>
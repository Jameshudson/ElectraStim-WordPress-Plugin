<?php

namespace modules\payment_tracker{

	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

	use modules\library\wrappers\menu\AdminSubMenu as AdminSubMenu;

    class PaymentTracker{

		const DEVICE_TYPE = 'device_type';
		const DEVICE = 'device';

		private $display = null;

		function __construct($menu){

			$setting = new Setting();

			//adding actions.
			$this->display = new display\AdminDisplay();
			add_action("woocommerce_admin_order_data_after_order_details", array($this->display, "OrderViewDatails"));

			//tracks what browser was used.
			$orderHandler = new order\OrderHandler();
			add_action("woocommerce_checkout_update_order_meta", array($orderHandler, "tracker"));

			//adding Payment Tracker to the Menu.
			$paymentMenu = new AdminSubMenu();

			$paymentMenu->setPageTitle("Payment Tracker");
			$paymentMenu->setMenuTitle("Payment Tracker");
			$paymentMenu->setCapability("manage_options");
			$paymentMenu->setMenuSlug("payment_tracker");
			$paymentMenu->setCallBack(array($this->display, "displayCharts"));

			$menu->addSubMenu($paymentMenu);
		}
	}
}
?>
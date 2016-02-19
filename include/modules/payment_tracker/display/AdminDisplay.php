<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 12/02/2016
 * Time: 12:57
 */

namespace modules\payment_tracker\display;


use modules\payment_tracker\util\Util;

class Display{

    private $plugin;

    public function __construct($plugin) {

        $this->plugin = $plugin;
    }

    public function addMenuItem(){


    }

    public function OrderViewDatails($order){

		$this->plugin->getUserAgent = get_post_meta( $order->id, PaymentTracker::DEVICE, true );

        $util = new Util();

		?>

			<p class="form-field form-field-wide">

				<p>Device type: <?php echo get_post_meta( $order->id, PaymentTracker::DEVICE_TYPE, true ); ?> </p>
				<p>Device: <?php echo $util->getOS($this->plugin->getOS()) ?> </p>
				<p>Browser: <?php echo $util->getBrowser($this->plugin->getBrowser()) ?></p>
			</p>
		<?php
	}

	private function displayCharts($os=array()){

	    foreach($os as $key => $value){

	        echo $key . " - " . ($value + 1) . "<br />";
	    }
	}
}
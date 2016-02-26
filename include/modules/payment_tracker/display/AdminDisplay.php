<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 12/02/2016
 * Time: 12:57
 */

namespace modules\payment_tracker\display;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class AdminDisplay{

	private $order;

    public function OrderViewDatails(){

    	$order = $this->getOrder();

		$device = get_post_meta( $order->id, \modules\payment_tracker\PaymentTracker::DEVICE, true );
        $util = new \modules\payment_tracker\util\Util();
		?>
			<p class="form-field form-field-wide">

				<p>Device type: <?php echo $device ?> </p>
				<p>Device: <?php echo $util->getOS($device) ?> </p>
				<p>Browser: <?php echo $util->getBrowser($device) ?></p>
			</p>
		<?php
	}

	public function displayCharts($os=array()){

	    
	}

	private function getOrder(){

		if(isset($_GET['post'])){

            $this->order = new \WC_Order(( 'shop_order' === get_post_type( $_GET['post'] ) ) ? wc_get_order( $_GET['post'] ) : null);
        }

        return $this->order;
	}
}
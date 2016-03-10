<?php  

namespace modules\worldpay;

/**
* 
*/
class WorldPay{
	
	function __construct(){
		
		add_filter( 'woocommerce_worldpay_args', array($this, 'worldpay'), 10, 2 );
	}

	public function worldpay($worldpay_args, $order){

		
	}
}

?>
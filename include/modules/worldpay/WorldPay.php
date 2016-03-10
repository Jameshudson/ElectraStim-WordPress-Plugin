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

		$currentMap = new \modules\util\CurrencyMapping();

		if(in_array(get_post_meta($order->id,'_billing_country',true), $currentMap->getGBPCountries())){

			$worldpay_args['currency'] = "GBP";
		}else{

			$worldpay_args['currency'] = "USD";
		}

		var_dump($worldpay_args);
		return $worldpay_args;
	}
}

?>